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
            <select>
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
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
                <option value=""> </option>
            </select>

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