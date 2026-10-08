<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Require admin authentication
if (empty($_SESSION['admin_logged_in'])) {
    echo json_encode(['status' => 'error', 'message' => 'Non autorisé. Veuillez vous connecter.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.']);
    exit;
}

$action = trim($_POST['action'] ?? '');
$lead_id = trim($_POST['id'] ?? '');

$db = get_db_connection();
$json_file = __DIR__ . '/../data/leads.json';

if ($action === 'delete_single') {
    if (empty($lead_id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID manquant.']);
        exit;
    }

    // 1. Delete from MySQL
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM leads WHERE lead_uid = :id OR id = :id_int");
            $stmt->execute([':id' => $lead_id, ':id_int' => (int)$lead_id]);
        } catch (Exception $e) {
            error_log("DB Delete error: " . $e->getMessage());
        }
    }

    // 2. Delete from JSON backup
    if (file_exists($json_file)) {
        $existing = json_decode(file_get_contents($json_file), true);
        if (is_array($existing)) {
            $filtered = array_values(array_filter($existing, function($item) use ($lead_id) {
                return ($item['id'] ?? '') !== $lead_id && (string)($item['id'] ?? '') !== (string)$lead_id;
            }));
            file_put_contents($json_file, json_encode($filtered, JSON_PRETTY_PRINT));
        }
    }

    echo json_encode(['status' => 'success', 'message' => 'Lecteur supprimé avec succès.']);
    exit;
}

if ($action === 'clear_all') {
    // 1. Clear MySQL table
    if ($db) {
        try {
            $db->exec("TRUNCATE TABLE leads");
        } catch (Exception $e) {
            try {
                $db->exec("DELETE FROM leads");
            } catch (Exception $ex) {
                error_log("DB Clear error: " . $ex->getMessage());
            }
        }
    }

    // 2. Clear JSON backup file
    file_put_contents($json_file, json_encode([], JSON_PRETTY_PRINT));

    echo json_encode(['status' => 'success', 'message' => 'Toutes les données ont été effacées.']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Action inconnue.']);
