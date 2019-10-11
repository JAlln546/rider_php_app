<?php
include 'include/header.php';
include 'include/process.php';
?>
        <h3>
            Add New Wine:<br>
        </h3>
    <?php
        if(!isset($_POST['submit'])) {
    ?>
    <form name="form1" method="post" action="#" enctype="multipart/form-data">
      <div class="left_form">
        <p><label>Wine Color</label>&nbsp;
          <select name="color">
              <option value="select" disabled selected>[ Type ]</option>
              <option value="red">Red</option>
              <option value="white">White</option>
              <option value="rose">Rose</option>
              <option value="sparkling">Sparkling</option>
              <option value="dessert">Dessert</option>
          </select></p>
        <p><label>
            Wine Cellar:</label>&nbsp;
            <input type="text" name="cellar"/>
        </p>
        <p><label for="">
            Wine Name:</label>&nbsp;
            <input type="text" name="name"/>
        </p>

        <p><label>&nbsp;
            Wine Category:</label>
            <input type="text" name="Category"/>
        </p>
        <p><label>&nbsp;
            Wine Type:</label>
            <input type="text" name="type"/>
        </p>
        <p><label>&nbsp;
            Vintage:</label>
            <input type="text" name="vintage"/>
        </p>
        <p><label>&nbsp;
            Region:</label>
            <input type="text" name="region"></p>
            <p><label>&nbsp;
                Price:</label>
                <input type="text" name="price"/>
            </p>
            <p><label>&nbsp;Full Bottle Image:
            <input type="file" name="fb_imgs[]"><br>
            <em>(.jpg, .jpeg, .png, .gif)</em>
          </p>
            <p><label>&nbsp;Label Image:
            <input type="file" name="label_imgs[]"><br>
            <em>(.jpg, .jpeg, .png, .gif)</em>
        </p>
      </div>

      <div class="right_form">

        <p><label>&nbsp;
            Description:</label>
            <textarea name="description" rows="7" cols="70"></textarea>
        </p>
        <p><label>&nbsp;
            Holding Temperature:</label>
            <input type="text" name="temp"/>
        </p>
        <p><label>&nbsp;
            Pairing:</label>
            <input type="text" name="pairing"/>
        </p>
        <p><label>&nbsp;
            Notes:</label>
            <textarea name="notes" rows="7" cols="70"></textarea>
        </p>
        <p><label>&nbsp;
            Varietals:</label>
            <input type="text" name="varietals"/>
        </p>
        <p><label>&nbsp;
            Website Address:</label>
            <input type="text" name="link"/>
        </p>
        <p><label>&nbsp;
            Short Hand:</label>
            <input type="text" name="class"/>
        </p>
        <br>
      </div>

      <div class="submit_form">
        <input type="submit" name="submit" value="Submit"/>
      </div>
        <!--
        <p>
            <label for="">Upload Profile Photo:</label><br>
            <input type="file" name="profile"/>
        </p>
        -->

    </form>
	<script src="include/upload.js"></script>

<?php
} else {

$color = $_POST['color'];
$cellar = $_POST['cellar'];
$name = $_POST['name'];
$category = $_POST['category'];
$type = $_POST['type'];
$vintage = $_POST['vintage'];
$region = $_POST['region'];
$price = $_POST['price'];
$fbImg = $_POST['fb_imgs'];
$labelImg = $_POST['label_imgs'];
$description = $_POST['description'];
$temp = $_POST['temp'];
$pairing = $_POST['pairing'];
$notes = $_POST['notes'];
$varietals = $_POST['varietals'];
$link = $_POST['link'];
$class = $_POST['class'];
$queryWine->execute();

// prepare and bind
$queryWine = $db->prepare(
    'INSERT INTO wine (w_color, w_cellar, w_name, w_category, w_type, w_vintage, w_region, w_image, W_label, W_price, w_description, w_temp, w_pairing, w_notes, w_varietals, w_webLink, w_class) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

$queryWine->bind_param("sssssssibbsssssss", $color, $cellar, $name, $category, $type, $vintage, $region, $price, $fbImg, $labelImg, $description, $temp, $pairing, $notes, $varietals, $link, $class);

$success = $queryWine->execute([
    'w_color' => $color,
    'w_cellar' => $cellar,
    'w_name' => $name,
    'w_category' => $category,
    'w_type' => $type,
    'w_vintage' => $vintage,
    'w_region' => $region,
    'w_image' => $fbImg,
    'w_label' => $labelImg,
    'w_description' => $description,
    'w_temp' => $temp,
    'w_pairing' => $pairing,
    'w_notes' => $notes,
    'w_varietals' => $varietals,
    'w_webLink' => $link,
    'w_class' => $class
    ]);

    echo "This shit whack.";

if ($success) {
    echo "<h3>Success!</h3>";
    echo ucwords($name) . " has been added to the wine list!\n";
} else {
    echo "Failed to add wine.\n\n";
}
}


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

?>
<br>
<!--
<div class="createUser">
  <p>Head to <a href="index.php">Login</a></p>
</div>
-->

<?php include 'include/footer.php'; ?>
