<?php
global $DBH;
require 'dbConnect.php';

$sql = 'SELECT * FROM MediaItems;';

try {
    $STH = $DBH->query($sql);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $STH->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['media_id'] . '</td>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td><img alt="kuva" src="' . $row['filename'] . '"></td>';
        echo '<td>' . $row['filesize'] . '</td>';
        echo '<td>' . $row['media_type'] . '</td>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['created_at'] . '</td>';
        echo '</tr>';
    }
} catch (PDOException $e) {
    echo "Could not select data from the database.";
    file_put_contents('PDOErrors.txt', 'selectData.php - ' . $e->getMessage(), FILE_APPEND);
}