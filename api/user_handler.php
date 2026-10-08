<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée']);
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone = trim($_POST['phone'] ?? '');

if (empty($fullname) || empty($phone)) {
    echo json_encode(['status' => 'error', 'message' => 'Veuillez renseigner votre nom et numéro de téléphone.']);
    exit;
}

$lead_uid = uniqid('lead_');
$timestamp = date('Y-m-d H:i:s');

// 1. Insert into MySQL database `ebola` (table `leads`)
$db = get_db_connection();
if ($db) {
    try {
        $stmt = $db->prepare("INSERT INTO leads (lead_uid, fullname, phone, created_at) VALUES (:uid, :fullname, :phone, :created_at)");
        $stmt->execute([
            ':uid' => $lead_uid,
            ':fullname' => $fullname,
            ':phone' => $phone,
            ':created_at' => $timestamp
        ]);
    } catch (Exception $e) {
        error_log("DB Insert error: " . $e->getMessage());
    }
}

// 2. Also save to JSON backup file
$lead = [
    'id' => $lead_uid,
    'timestamp' => $timestamp,
    'fullname' => htmlspecialchars($fullname),
    'phone' => htmlspecialchars($phone)
];

$file = __DIR__ . '/../data/leads.json';
$existing = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
if (!is_array($existing)) $existing = [];
$existing[] = $lead;

@file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));

echo json_encode([
    'status' => 'success',
    'message' => 'Bienvenue ! Vous pouvez maintenant accéder à tout le contenu.'
]);
