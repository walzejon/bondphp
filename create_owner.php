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
                <input type = "radio" name="citizenship" value="citizen" id = "citizen" checked = "checked" />Citizen 
                <input type = "radio" name="citizenship" value="noncitizen" id="noncitizen"/>Non-Citizen
                <input type = "radio" name="citizenship" value="permitted" id="permitted"/>Permitted Non-Citizen
            </p>

            <label for="statecode">State Code</label> 
            <select name="statecode">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
                <option value="DC">District of Columbia</option>
                <option value="AS">American Samoa</option>
                <option value="GU">Guam</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="PR">Puerto Rico</option>
                <option value="UM">United states Minor Outying Islands</option>
                <option value="VI">U.S. Virgin Islands</option>
            </select><br><br>

            <label for="street">Street Address (150 chars max)</label> 
            <input type="text" name="street" id="street"><br><br>

            <label for="city">City (150 chars max)</label> 
            <input type="text" name="city" id="city"><br><br>

            <label for="postal">Postal Code</label> 
            <input type="text" name="postal" id="postal"><br><br>

            <label for="marital">Marital Status</label> 
            <input type="text" name="marital" id="marital"><br><br>

            </fieldset>

            <fieldset>
            <legend>Contact Information</legend>

            <label for="email">Email</label> 
            <input type="email" name="email" id="email"><br><br>

            <label for="phone">Phone Number</label> 
            <input type="tel" name="phone" id="phone"><br>

            <p> 
                <label>Electronic Updates?</label> 
                <input type = "radio" name="eupdate" value="yes" id = "yes"/>Yes 
                <input type = "radio" name="eupdate" value="no" id="no" checked = "checked" />No
                <input type = "radio" name="eupdate" value="limited" id="limited"/>Maybe?
            </p>

            </fieldset>

            <fieldset>
            <legend>Additional Information</legend>

            <p> 
                <label>Stock Knowledge?</label> 
                <input type = "radio" name="knowledge" value="yes" id = "yes"/>Yes 
                <input type = "radio" name="knowledge" value="none" id="no" checked = "checked" />None
                <input type = "radio" name="knowledge" value="little" id="limited"/>stonks
            </p>

            </fieldset>
        </form>

        <?php
        $conn = new mysqli($servername, $username, $password, $database, $port);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ownerid = $_POST['ownerid'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $ssn = $_POST['ssn'];
            $citizenship = $_POST['citizenship'];
            $state = $_POST['statecode'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $postal = $_POST['postal'];
            $marital = $_POST['email'];
            $phone = $_POST['phone'];
            $eupdates = $_POST['eupdate'];
            $knowledge = $_POST['knowledge'];

            if ($ownerid === null || $ownerid === false || trim($ownerid) === ""
            || $firstname === null || $firstname === false || trim($firstname) === ""
            || $lastname === null || $lastname === false || trim($lastname) === ""
            || $ssn === null || $ssn === false || trim($ssn) === ""
            || $citizenship === null || $citizenship === false || trim($citizenship) === ""
            || $state === null || $state === false || trim($state) === ""
            || $street === null || $street === false || trim($street) === ""
            || $city === null || $ownerid === false || trim($ownerid) === ""
            || $ownerid === null || $ownerid === false || trim($ownerid) === ""
            || $ownerid === null || $ownerid === false || trim($ownerid) === ""
            || $ownerid === null || $ownerid === false || trim($ownerid) === ""
            || $ownerid === null || $ownerid === false || trim($ownerid) === ""
            || $ownerid === null || $ownerid === false || trim($ownerid) === "")

        }
        ?>

    </div>
</body>

</html>