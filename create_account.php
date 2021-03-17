<?php
/**
 * Author: Benjamin Lin
 * Purpose: The purpose of this page is to create a new owner into the database.
 */
require_once 'config.inc.php';
require_once 'index.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Database Program</title>
    <link rel="stylesheet" href="base.css?v=<?php echo time ?>"/>
</head>

<body>
    <div classs="FormHeader">
        <h2>Register New User</h2>
    </div>
    <?php
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check the Request is an Update from User -- Submitted via Form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerName = $_POST['customerName'];
        if ($customerName === null)
            echo "<div><i>Specify a new name</i></div>";
        else if ($customerName === false)
            echo "<div><i>Specify a new name</i></div>";
        else if (trim($customerName) === "")
            echo "<div><i>Specify a new name</i></div>";
        else {

            /* perform update using safe parameterized sql */
            $sql = "UPDATE Customer SET CustomerName = ? WHERE CustomerNumber = ?";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                echo "failed to prepare";
            } else {

                // Bind user input to statement
                $stmt->bind_param('ss', $customerName,$id);

                // Execute statement and commit transaction
                $stmt->execute();
                $conn->commit();
            }
        }
    }

    /* Refresh the Data */
    $sql = "SELECT CustomerNumber,CustomerName,StreetAddress,CityName,StateCode,PostalCode FROM Customer C " .
        "INNER JOIN Address A ON C.defaultAddressID = A.addressID WHERE CustomerNumber = ?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        echo "failed to prepare";
    }
    else {
    $stmt->bind_param('s',$id);
    $stmt->execute();
    $stmt->bind_result($customerNumber,$customerName,$streetName,$cityName,$stateCode,$postalCode);
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <?php
        while ($stmt->fetch()) {
            echo '<a href="show_customer.php?id='  . $customerNumber . '">' . $customerName . '</a><br>' .
                $streetName . ',' . $stateCode . '  ' . $postalCode;
        }
        ?>


    <div class="Form">
        <form method="POST">
            <fieldset>
            <legend>Account Information</legend>

            <label for="accountnum">Username (Numbers Only)</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="paym">Payment Method (45 chars)</label> 
            <input type="text" name="paym" id="paym"><br><br>

            <label for="statecode">State Code</label> 
            <select>
                <option value="AL">Single</option>
                <option value="AK">Joint</option>
                <option value="AZ">Other</option>
            </select>
            <br>

            <button type="submit">Submit</button>

            </fieldset>
        </form>

    </div>
</body>

</html>