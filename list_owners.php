<?php

require_once 'config.inc.php';
require_once 'index.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Database Program</title>
    <link rel="stylesheet" type="text/css" href="base.css?v=<?php echo time(); ?>"/>
</head>

<body>
<div>
    <h2>Owners List</h2>

    <p>Press <b>Filter</b> without any input to get a full unfilitered list of the Owners. Click
    the hyperlinks to see what stocks each person owns.</p>

    <p>Format: <i>Lastname, Firstname, email, phone number</i></p>


    <?php 
    $conn = new mysqli($servername, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $InputFirstName = $_POST['firstnameInput'];
        $InputLastName = $_POST['lastnameInput'];

        if (($InputFirstName === null || $InputFirstName === false)
        && ($InputLastName === null || $InputLastName === false)) {
            echo "<div class=\"Alter\"><i>Specify a new name</i></div>";
        } else {
            $sql = "SELECT firstname, lastname, ownerid, email, phonenumber FROM Owner"
            . " WHERE firstname LIKE ? AND lastname LIKE ? ORDER BY lastname";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                echo "failed to prepare (INVALID SQL STATEMENT)";
            } else {
                $inputfirstformated = "%" . $InputFirstName . "%";
                $inputlastformated = "%" . $InputLastName . "%";


                $stmt->bind_param('ss', $inputfirstformated, $inputlastformated);
                $stmt->execute();
                $conn->commit();

                // Print
                /*echo "<ul>";
                $stmt->bind_result($firstName, $lastName, $ownerID, $email, $phonenumber);
                while ($stmt->fetch()) {
                    echo '<li><a href="list_stock.php?id=' .
                    $ownerID . '">' . $lastName . ', ' . $firstName . '</a>, ' . $email . ', ' . $phonenumber . '</li>';
                }*/
				
                echo "<div><table>";
					echo "<tr>
					<th>Last, First</th>
					<th>Email</th>
					<th>Phonenumber</th>
				</tr>";
				$stmt->bind_result($firstName, $lastName, $ownerID, $email, $phonenumber);
				while ($stmt->fetch()) {
					echo '<tr><td><a href="list_stock.php?id=' .
					$ownerID . '">' . $lastName . ', ' . $firstName . '</td><td>' . $email . '</td><td>' . $phonenumber . '</td></tr>'; 
				}
				echo "</table></div>";
            }

        }

    }

    $conn->close();

    ?>


    <h3>Filter By</h3>
    <form method="POST">
        First Name: <input type="text" name="firstnameInput">
        Last Name: <input type=:text" name="lastnameInput">
        <button type="submit">Search</button>
    </form>
    
    
    <?php

    // OLD CODE : Ben: I use this code as a jumping point to re-writing it to take in inputs.
    /*
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
    } else {
        // Execute the Statement
        $stmt->execute();
        // Loop Through Result
        $stmt->bind_result($firstName,$lastName,$ownerID);
        echo "<ul>";
        while ($stmt->fetch()) {
            echo '<li><a href="list_stock.php?id=' .
            $ownerID . '">' . $lastName . ', ' . $firstName . '</a></li>';
        }
        echo "</ul>";
    }
    
    // Close Connection
    $conn->close();
    */
    ?>
</div>
</body>
</html>