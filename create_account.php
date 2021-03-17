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