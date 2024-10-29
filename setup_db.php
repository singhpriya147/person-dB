<?php
include "db_connection.php";

// SQL to modify the id column
$sql = "ALTER TABLE `crud` MODIFY COLUMN `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY";

if (mysqli_query($conn, $sql)) {
    echo "Table modified successfully.";
} else {
    echo "Error modifying table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
