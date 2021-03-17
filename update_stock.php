<?php
require_once 'config.inc.php';
// Get stockID
$stockID = $_GET['stockID'];
if ($stockID === "") {
    header('location: list_stock.php');
    exit();
}
if ($stockID === false) {
    header('location: list_stock.php');
    exit();
}
if ($stockID === null) {
    header('location: list_stock.php');
    exit();
}
// Get accountNum
$accountNum = $_GET['accountNum'];
if ($accountNum === "") {
    header('location: list_stock.php');
    exit();
}
if ($accountNum === false) {
    header('location: list_stock.php');
    exit();
}
if ($accountNum === null) {
    header('location: list_stock.php');
    exit();
}
?>
<html>
<head>
    <title>Stock Update</title>
    <link rel="stylesheet" href="base.css">
</head>
<body>
<?php
require_once 'header.inc.php';
?>
<div>
    <h2>Update Stock Total</h2>
    <?php

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check the Request is an Update from User -- Submitted via Form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newTotal = $_POST['newTotal'];
        if ($newTotal === null)
            echo "<div><i>Specify new total</i></div>";
        else if ($newTotal === false)
            echo "<div><i>Specify new total</i></div>";
        else if (trim($newTotal) === "")
            echo "<div><i>Specify new total</i></div>";
        else {

            /* perform update using safe parameterized sql */
            $sql = "UPDATE AccountStock AS SET quantity = ? WHERE StockID = ? AND accountNum=?";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                echo "failed to prepare";
            } else {

                // Bind user input to statement
                $stmt->bind_param('ss', $newTotal,$stockID, $accountNum);

                // Execute statement and commit transaction
                $stmt->execute();
                $conn->commit();
            }
        }
    }

    /* Refresh the Data */
    $sql = "SELECT * FROM Account A " .
        "INNER JOIN AccountStocl USING accountNum WHERE AS.accountNum = ? AND AS.stockID=?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        echo "failed to prepare";
    }
    else {
        $stmt->bind_param('s',$accountNum, $stockID);
        $stmt->execute();
        $stmt->bind_result($accountNum, $stockID);
        ?>
        <form method="post">
            <input type="hidden" name="stockID" value="<?= $stockID ?>">
            <?php
            while ($stmt->fetch()) {
                echo '<a href="show_stock.php?stockID='  . $stockID . '">';
            }
            ?>
            <input type="hidden" name="accountNum" value="<?= $accountNum ?>">
            <?php
            while ($stmt->fetch()) {
                echo '<a href="show_stock.php?accountNum='  . $accountNum . '">';
            }
            ?><br><br>
            New Total: <input type="text" name="newTotal">
            <button type="submit">Update</button>
        </form>
        <?php
    }

    $conn->close();

    ?>
</>
</body>
</html>