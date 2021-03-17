<?php
require_once 'config.inc.php';
// Get Owner ID (for returning back)
$id = $_GET['id'];
if ($id === "" || $id === false || $id === null) {
    header('location: list_owners.php');
    exit();
}
// Get stockID
$stockID = $_GET['stockID'];
if ($stockID === "") {
    header('location: list_stock.php?id=' . $id);
    exit();
}
if ($stockID === false) {
    header('location: list_stock.php?id=' . $id);
    exit();
}
if ($stockID === null) {
    header('location: list_stock.php?id=' . $id);
    exit();
}
// Get accountNum
$accountNum = $_GET['accountNum'];
if ($accountNum === "") {
    header('location: list_stock.php?id=' . $id);
    exit();
}
if ($accountNum === false) {
    header('location: list_stock.php?id=' . $id);
    exit();
}
if ($accountNum === null) {
    header('location: list_stock.php?id=' . $id);
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
        $newTotal = (int)$_POST['newTotal'];
        if ($newTotal === null)
            echo "<div><i>Specify new total</i></div>";
        else if ($newTotal === false)
            echo "<div><i>Specify new total</i></div>";
        else if (trim($newTotal) === "")
            echo "<div><i>Specify new total</i></div>";
        else {

        $accountNumConverted = (int)$accountNum;


        //echo $accountNumConverted . ', ' . $stockID . ', ' . $newTotal;

            /* perform update using safe parameterized sql */
            $sql = "UPDATE AccountStock ASS SET quantity = ? WHERE StockID = ? AND accountNum=?";

            //echo $sql;

            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                echo "failed to prepare";
            } else {

                // Bind user input to statement
                $stmt->bind_param('isi', $newTotal,$stockID, $accountNumConverted);

                // Execute statement and commit transaction
                $stmt->execute();
                $conn->commit();

                $sql = "SELECT accountNum, stockid, quantity FROM AccountStock ASS WHERE accountNum = ? AND stockID = ?";
                $stmt = $conn->stmt_init();
                if (!$stmt->prepare($sql)) {
                    echo "failed to prepare";
                } else {
                    $stmt->bind_param('is', $accountNumConverted, $stockID);
                    $stmt->execute();
                    $stmt->bind_result($accNum, $stckId, $outQuant);

                    $stmt->fetch();

                    //echo $accNum . ', ' . $stckId . ', ' . $outQuant;

                    echo "<div> New Total = " . $outQuant . "</div>";

                }

            }
        }
    }

    /* Refresh the Data */
    /*$sql = "SELECT * FROM Account A " .
        "INNER JOIN AccountStock ASS USING accountNum WHERE ASS.accountNum = ? AND ASS.stockID=?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        echo "failed to prepare";
    }
    else {
        $stmt->bind_param('ss',$accountNum, $stockID);
        $stmt->execute();
        $stmt->bind_result($accountNum, $stockID);
    */
        ?>
    
        <form method="post">
            <input type="hidden" name="stockID" value="<?= $stockID ?>">
            <input type="hidden" name="accountNum" value="<?= $accountNum ?>">
            New Total: <input type="text" name="newTotal">
            <button type="submit">Update</button>
        </form>
    
    <?php

    echo '<a href="list_stock.php?id=' . $id . '"/><-Return</a>';

    $conn->close();

    ?>
</>
</body>
</html>