<?php
// ============================================================================
// TUJIKINGE NA EBOLA — DATABASE CONFIGURATION FILE
// Online Production Credentials (cPanel / MySQL)
// ============================================================================

define('DB_HOST', 'localhost');
define('DB_NAME', 'beriuxga_ebola');
define('DB_USER', 'beriuxga_ebola_user');
define('DB_PASS', 'Ebola@1000$');

function get_db_connection() {
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    $host = DB_HOST;
    $dbname = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    $socket = '/opt/lampp/var/mysql/mysql.sock';

    // 1. Try online production credentials via standard host connection
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 3
        ]);
        return $pdo;
    } catch (Exception $e) {
        // Continue to local fallbacks
    }

    // 2. Try online credentials via LAMPP unix socket
    if (file_exists($socket)) {
        try {
            $pdo = new PDO("mysql:unix_socket=$socket;dbname=$dbname;charset=utf8mb4", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 3
            ]);
            return $pdo;
        } catch (Exception $e) {
            // Continue fallback
        }
    }

    // 3. Development local fallbacks (root with local database name)
    $local_dbs = ['beriuxga_ebola', 'ebola'];
    foreach ($local_dbs as $ldb) {
        if (file_exists($socket)) {
            try {
                $pdo = new PDO("mysql:unix_socket=$socket;dbname=$ldb;charset=utf8mb4", 'root', '', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_TIMEOUT => 3
                ]);
                return $pdo;
            } catch (Exception $ex) {}
        }

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$ldb;charset=utf8mb4", 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 3
            ]);
            return $pdo;
        } catch (Exception $ex) {}
    }

    return null;
}
