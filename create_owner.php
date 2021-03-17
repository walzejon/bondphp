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

            <label for="ownerid">Username (OwnerId) (10 chars max)</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="firstname">First Name (45 chars max)</label> 
            <input type="text" name="firstname" id="firstname"><br><br>

            <label for="lastname">Last Name (45 chars max)</label> 
            <input type="text" name="lastname" id="lastname"><br><br>

            </fieldset>

            <fieldset>
            <legend>Personal Information</legend>

            <label for="ssn">Social Security Number</label> 
            <input type="password" name="ssn" id="ssn"><br><br>

            <p> 
                <label>Citizen Status</label> 
                <input type = "radio" name="citizen" value="Citizen" id = "citizen" checked = "checked" />
                <input type = "radio" name="noncitizen" value="Not Citizen" id="noncitizen"/>
                <input type = "radio" name="permitted" value="Permitted Non Citizen" id="permitted"/>
            </p>

            <label for="statecode">State Code</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="ownerid">Street Address (150 chars max)</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="ownerid">City (150 chars max)</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="ownerid">Postal Code</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="ownerid">Marital Status</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            </fieldset>

            <fieldset>
            <legend>Contact Information</legend>

            <label for="email">Email</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="ownerid">Phone Number (Numbers only)</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            <label for="ownerid">Would you like electronic updates</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            </fieldset>

            <fieldset>
            <legend>Additional Information</legend>

            <label for="ownerid">Investment Knowledge</label> 
            <input type="text" name="ownerid" id="ownerid"><br><br>

            </fieldset>
        </form>
    </div>
</body>

</html>