<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée']);
    exit;
}

$faq_id = intval($_POST['faq_id'] ?? 0);
$vote = $_POST['vote'] ?? 'yes';

if ($faq_id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'FAQ ID invalide']);
    exit;
}

$file = __DIR__ . '/../data/votes.json';
$votes = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
if (!is_array($votes)) $votes = [];

$current = $votes[$faq_id] ?? 120;
if ($vote === 'yes') {
    $current += 1;
}

$votes[$faq_id] = $current;
@file_put_contents($file, json_encode($votes, JSON_PRETTY_PRINT));

echo json_encode([
    'status' => 'success',
    'new_count' => $current
]);
