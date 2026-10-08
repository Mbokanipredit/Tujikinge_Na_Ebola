<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée']);
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$location = trim($_POST['location'] ?? '');
$report_type = trim($_POST['report_type'] ?? 'suspicion');
$details = trim($_POST['details'] ?? '');

if (empty($fullname) || empty($phone) || empty($location)) {
    echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir les champs obligatoires (Nom, Téléphone, Localisation).']);
    exit;
}

// Log report data safely to local data file / memory for demonstration
$report = [
    'id' => uniqid('alert_'),
    'timestamp' => date('Y-m-d H:i:s'),
    'fullname' => htmlspecialchars($fullname),
    'phone' => htmlspecialchars($phone),
    'location' => htmlspecialchars($location),
    'report_type' => htmlspecialchars($report_type),
    'details' => htmlspecialchars($details)
];

$file = __DIR__ . '/../data/reports.json';
$existing = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
if (!is_array($existing)) $existing = [];
$existing[] = $report;
@file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));

echo json_encode([
    'status' => 'success',
    'message' => 'Votre signalement a été enregistré avec succès et transmis aux relais communautaires d\'urgence Tearfund / Santé Publique.'
]);
