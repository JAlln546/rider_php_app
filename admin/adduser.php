<?php include 'include/header.php'; ?>
        <h3>
            Add New Member:<br>
        </h3>
    <?php
        if(!isset($_POST['submit'])) {
    ?>
    <form method="post" action="#" enctype="multipart/form-data">
        <p><label>What is your name?</label>&nbsp;
        <input type="text" name="firstName" placeholder="First Name"/>
        <input type="text" name="lastName" placeholder="Last Name"/></p>
        <p><label>
            Enter your username:</label>&nbsp;
            <input type="text" name="username"/>
        </p>
        <p><label for="">
            Enter your password:</label>&nbsp;
            <input type="password" name="password"/>
        </p>
        <p><label>
            Access Level:</label>&nbsp;
            <select name="role">
                <option value="select" disabled selected>[ Role ]</option>
                <option value="base">Base</option>
                <option value="lead">Lead</option>
                <option value="super">Super</option>
            </select>
        </p>
        <p><label>&nbsp;
            Enter hire date:</label>
            <input type="text" name="hire"/>
        </p>
        <p><label>&nbsp;
            Enter your email:</label>
            <input type="text" name="email"/>
        </p>
        <p><label>&nbsp;
            Enter your phone:</label>
            <input type="text" name="phone"/>
        </p>
        <p><label>&nbsp;
            Enter your address:</label><br>
            <input type="text" name="street" placeholder="Street">&nbsp;
            <input type="text" name="city" placeholder="City"><br>
            <select name="state">
                <option value="select" disabled selected>[ State ]</option>
            	<option value="AL">Alabama</option>
            	<option value="AK">Alaska</option>
            	<option value="AZ">Arizona</option>
            	<option value="AR">Arkansas</option>
            	<option value="CA">California</option>
            	<option value="CO">Colorado</option>
            	<option value="CT">Connecticut</option>
            	<option value="DE">Delaware</option>
            	<option value="DC">District Of Columbia</option>
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
            </select>		&nbsp;
            <input type="text" name="zip" placeholder="Zip Code">
        </p>

        <!--
        <p>
            <label for="">Upload Profile Photo:</label><br>
            <input type="file" name="profile"/>
        </p>
        -->
        <input type="submit" name="submit" value="Submit"/>
    </form>


<?php
} else {


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$fullName = "$firstName $lastName";
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];
$hire = $_POST['hire'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$streetAd = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$address = "$streetAd, $city, $state &nbsp;$zip";

/*
//Profile Picture Code
$profPic = $_FILES['profile'];
$target_dir = "images/";
$target = $target . basename($_FILES['photo']['name']);

if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory";
}
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
*/
$query2 = $db->prepare(
    'INSERT INTO users (name, username, password, role, hire, email, phone, address)' .
    'VALUES ("'.$fullName.'", "'.$username.'", "'.$password.'", "'.$role.'", "'.$hire.'", "'.$email.'", "'.$phone.'", "'.$address.'")'
);

$success = $query2->execute([
    'name' => $fullName,
    'username' => $username,
    'password' => password_hash($password, PASSWORD_DEFAULT),
    'hire' => $hire,
    'role' => $role,
    'email' => $email,
    'phone' => $phone,
    'address' => $address
    ]);

if ($success) {
    echo "<h3>Success!</h3>";
    echo "$firstName has been added to the team!\n";
} else {
    echo "Failed to add user.\n\n";
}
}

?>
<br>
<div class="createUser">
  <p>Head to <a href="index.php">Login</a></p>
</div>


<?php include 'include/footer.php'; ?>
