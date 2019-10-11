<?php include 'header.php'; ?>
        <h3>
            Add New Wine:<br>
        </h3>
    <?php
        if(!isset($_POST['submit'])) {
    ?>
    <form name="form1" method="post" action="#" enctype="multipart/form-data">
        <p><label>Wine Category</label>&nbsp;
          <select name="category">
              <option value="select" disabled selected>[ Type ]</option>
              <option value="red">Red</option>
              <option value="white">White</option>
              <option value="rose">Rose</option>
              <option value="sparkling">Sparkling</option>
              <option value="dessert">Dessert</option>
          </select></p>
        

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

  $wineColor = $_POST['category'];
  ?>
  <form name="" action="index.html" method="post">
    <p>
    </p>
  </form>

  <?php

  if($wineColor == 'red') {

  }




$query = $db->prepare(
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


<?php include 'footer.php'; ?>
