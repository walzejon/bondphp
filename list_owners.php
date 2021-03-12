<?php

require_once 'config.inc.php';
require_once 'index.php';
?>
<html>

<div>
<h2>Owners List</h2>
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $database,
$port);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Prepare SQL Statement
$sql = "SELECT firstName,lastName,ownerID FROM Owner ORDER BY
lastName";
$stmt = $conn->stmt_init();
if (!$stmt->prepare($sql)) {
echo "failed to prepare";
}
else {
// Execute the Statement
$stmt->execute();
// Loop Through Result
$stmt->bind_result($firstName,$lastName,$ownerID);
echo "<ul>";
while ($stmt->fetch()) {
echo '<li><a href="list_stock.php?id=' .
$ownerID . '">'$lastName, . $firstName . '</a></li>';
}
echo "</ul>";
}
// Close Connection
$conn->close();
?>
</div>
</body>
</html>