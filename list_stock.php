<?php
require_once 'config.inc.php';
require_once 'index.php';
//Test
// Get
$id = $_GET['id'];

if ($id === "" OR $id === false OR $id === null) {
    header('location: list_owners.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stock Database Program</title>
        <link rel="stylesheet" type="text/css" href="base.css?v=<?php echo time(); ?>"/>
    </head>
    <body>
        <div>
            <h2>List Stocks Owned by Owner</h2>
            <p>Select the hyperlinks under <b>Quantity</b> to alter the number of stocks that person owns.</p>

            <?php
            // Initializing SQL connection
            $conn = new mysqli($servername, $username, $password, $database, $port);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL Query
            $sql = "SELECT O.ownerid, O.firstName, O.lastName, O.email, O.phoneNumber, A.accountNum, A.accountCreationDate, ASS.quantity, S.stockId,"
            . " S.currentprice, C.tickerSymbol, C.companyName FROM Owner O"
            . " INNER JOIN ("
                . " OwnerAccount OA INNER JOIN ("
                    . " Account A INNER JOIN ("
                        . " AccountStock ASS INNER JOIN ("
                            . " Stock S INNER JOIN ("
                                . " Company C"
                            . " ) ON S.companyId = C.companyId"
                        . " ) ON ASS.stockid = S.stockid"
                    . " ) ON A.accountNum = ASS.accountNum"
                . " ) ON OA.accountNum = A.accountNum"
            . " ) ON O.ownerID = OA.ownerID"
            . " WHERE O.ownerid = ?";
            
            
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                echo "failed to prepare";
            } else {
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $stmt->bind_result($ownerid, $firstName, $lastName, $email, $phoneNumber, $accountNum, $accountCreationDate, $quantity, $stockid,
                                    $currentprice, $tickersymbol, $companyname);
                echo "<div><table>";

                echo 
                '<tr>
                    <th>Owner ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Account Number</th>
                    <th>Account Creation Date</th>
                    <th>Quantity</th>
                    <th>Stock ID</th>
                    <th>Current Price</th>
                    <th>Stock Ticker Symbol</th>
                    <th>Company Name</th>
                </tr>';

                while ($stmt->fetch()) {
                    echo '<tr><td>' . $ownerid . '</td><td>' . $firstName . '</td><td>' . $lastName . '</td><td>' . $email 
                    . '</td><td>' . $phoneNumber . '</td><td>' . $accountNum . '</td><td>' . $accountCreationDate 
                    . '</td><td><a href="update_stock.php?id=' . $id . '&stockID=' . $stockid . '&accountNum=' . $accountNum . '">' 
                    . $quantity . '</a></td><td>' . $stockid . '</td><td>' . $currentprice . '</td><td>' . $tickersymbol . '</td><td>' 
                    . $companyname . '</td></tr>'; 
                }
                echo "<table></div>";
            }

            // Closing SQL connection
            $conn->close();
            ?>
        </div>
        <div>
            <br>
            <a href="list_owners.php"><-Return</a>
        </div>
    </body>
</html>