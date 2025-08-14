<?php
include_once("connection.php");
include_once("header.php");


$host = 'localhost';         // MySQL host
$user = 'root';              // MySQL username
$pass = '';     // MySQL password
$dbName = 'happy_snax';   // MySQL database name
$backupFile = 'backup_' . $dbName . '_' . date('Y-m-d_H-i-s') . '.sql';

$conn = new mysqli($host, $user, $pass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$returnSql = "-- Database Backup for `$dbName` \n-- Generated: " . date('Y-m-d H:i:s') . "\n\n";
$tables = [];
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

foreach ($tables as $table) {
    // Get CREATE TABLE statement
    $result = $conn->query("SHOW CREATE TABLE `$table`");
    $row = $result->fetch_row();
    $returnSql .= "\n-- Structure for table `$table`\n";
    $returnSql .= "DROP TABLE IF EXISTS `$table`;\n";
    $returnSql .= $row[1] . ";\n";

    // Get data
    $result = $conn->query("SELECT * FROM `$table`");
    if ($result->num_rows > 0) {
        $returnSql .= "\n-- Data for table `$table`\n";
        while ($row = $result->fetch_assoc()) {
            $values = array_map(function($value) use ($conn) {
                return isset($value) ? "'" . $conn->real_escape_string($value) . "'" : "NULL";
            }, array_values($row));
            $returnSql .= "INSERT INTO `$table` VALUES(" . implode(", ", $values) . ");\n";
        }
    }
}

$conn->close();

// Save to file
$backupPath = __DIR__ . '/backup/' . $backupFile;
file_put_contents($backupPath, $returnSql);

echo "Database export completed. Saved to: $backupFile";



include_once('footer.php');
?>