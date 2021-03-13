<?php
require_once 'config.inc.php';
require_once 'index.php';

// Get
$id = $_GET['id'];

if ($id === "" OR $id === false OR $id === null) {
    header('location: list_owners.php');
    exit();
}
?>

<html>
    <head>
        <title>Stock Database Program</title>
    </head>
    <body>
        <div>
            <h2>List Stocks Owned by Owner (Testing Query)</h2>
            <?php
            // Initializing SQL connection
            $conn = new mysqli($servername, $username, $password, $database, $port);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL Query
            $sql = "SELECT "
            . "O.ownerid, O.firstName, O.lastName, O.email, O.phoneNumber, A.accountNum, A.accountCreationDate, "
            . "S.stockId, S.numberOwned, S.currentprice, C.tickerSymbol, C.companyName FROM Owner O "
            . "INNER JOIN ("
                . "OwnerAccount OA INNER JOIN ("
                    . "Account A INNER JOIN ("
                    . "Stock S INNER JOIN Company C USING (companyId)"
                    . ") USING (stockID)"
                . ") USING (accountNum)"
            . ") USING (ownerid) "
            . "WHERE O.ownerid = ?";
            
            
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                echo "failed to prepare";
            } else {
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $stmt->bind_result($ownerid, $firstName, $lastName, $email, $phoneNumber, $accountNum, $accountCreationDate, $stockid, $numOwn,
                                    $currentprice, $tickersymbol, $companyname);
                echo "<div>";
                while ($stmt->fetch()) {
                    echo $ownerid . ', ' . $firstName . ', ' . $lastName . ', ' . $email . ', ' . $phoneNumber
                    . $accountNum . ', ' . $accountCreationDate . ', ' . $stockid . ', ' . $numOwn . ', ' . 
                    $currentprice . ', ' . $tickersymbol . ', ' . $companyname . '<br>'; 
                }
                echo "</div>";
            }

            // Closing SQL connection
            $conn->close();
            ?>
        </div>
    </body>
</html>