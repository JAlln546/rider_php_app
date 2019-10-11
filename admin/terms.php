<?php include 'include/header.php'; ?>
        <h3>
            Add New Term:
        </h3>
    <?php
        if(!isset($_POST['submitCat'])) {
    ?>
    <form method="post" action="" enctype="multipart/form-data">
        <p><label>
            Pick a Category:</label>&nbsp;

            <select name="category">
                <option value="select" disabled selected>[ Select ]</option>
                <option value="wine">Wine</option>
                <option value="beer">Beer</option>
                <option value="liquor">Liquor</option>
                <option value="cocktails">Cocktails</option>
                <option value="food">Food</option>
            </select>&nbsp;
            <input type="submit" name="submitCat" value=">"></p>
            </form>
<?php
      } else {
        $termCategory = $_POST['category'];
        echo "<h3>Selected Category: ";
        echo ucfirst($termCategory);
        echo "</h3>";

        if(!isset($_POST['submit'])) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <p>Sub Category:
        <?php
          if($termCategory === 'wine') {
            echo "
            <select name=\"subcat\">
                <option value=\"select\" disabled selected>[ Type ]</option>
                <option value=\"red\">Red</option>
                <option value=\"white\">White</option>
                <option value=\"rose\">Rose</option>
                <option value=\"sparkling\">Sparkling</option>
                <option value=\"dessert\">Dessert</option>
            </select></p>";
          } elseif($termCategory === 'beer') {
            echo "
            <select name=\"subcat\">
                <option value=\"select\" disabled selected>[ Type ]</option>
                <option value=\"lager\">Lager</option>
                <option value=\"ale\">Ale</option>
            </select></p>";
          } elseif($termCategory === 'liquor') {
            echo "
            <select name=\"subcat\">
                <option value=\"select\" disabled selected>[ Select ]</option>
                <option value=\"vodka\">Vodka</option>
                <option value=\"tequila\">Tequila</option>
                <option value=\"gin\">Gin</option>
                <option value=\"rum\">Rum</option>
                <option value=\"whiskey\">Whiskey</option>
                <option value=\"amaros\">Amaros</option>
                <option value=\"liquors\">Liquors</option>
            </select></p>
            ";
          } elseif($termCategory === 'cocktails') {
            echo "
            <select name=\"subcat\">
                <option value=\"select\" disabled selected>[ Select ]</option>
                <option value=\"vodka\">Vodka</option>
                <option value=\"tequila\">Tequila</option>
                <option value=\"gin\">Gin</option>
                <option value=\"rum\">Rum</option>
                <option value=\"whiskey\">Whiskey</option>
                <option value=\"amaros\">Amaros</option>
                <option value=\"liquors\">Liquors</option>
            </select></p>
            ";
          } elseif($termCategory === 'food') {
            echo "

                <p>Breakfast<input type=\"checkbox\" name=\"subcat[]\" value=\"bfast\"></p>
                <p>Brunch<input type=\"checkbox\" name=\"subcat[]\" value=\"brunch\"></p>
                <p>Lunch<input type=\"checkbox\" name=\"subcat[]\" value=\"lunch\"></p>
                <p>Dinner<input type=\"checkbox\" name=\"subcat[]\" value=\"dinner\"></p>
                <p>Dessert<input type=\"checkbox\" name=\"subcat[]\" value=\"dessert\"></p>
                <p>Happy Hour<input type=\"checkbox\" name=\"subcat[]\" value=\"hh\"></p>
            ";
          }
         ?>
         <p><label>Name:</label>
         <input type="text" name="name">
       </p>
       <p><label>Definition:</label>
       <textarea name="definition" rows="8" cols="80"></textarea>
     </p>
      <input type="submit" name="submit" value="Submit Term">
    </form>

    <?php

  } else {
    $termSubcat = strtoupper($_POST['subcat']);
    $termName = ucwords($_POST['name']);
    $termDef = ucfirst($_POST['definition']);

    $query = $db->prepare(
        'INSERT INTO terms (t_category, t_subcat, t_name, t_def)' .
        'VALUES ("'.$termCategory.'", "'.$termSubcat.'", "'.$termName.'", "'.$termDef.'")'
    );

    $success = $query->execute([
        't_name' => $termName,
        't_def' => $termDef,
        't_category' => $termCategory,
        't_subcat' => $termSubcat
        ]);

    if ($success) {
        echo "<h3>Success!</h3>";
        echo "$termName has been added to $termCategory!\n";
    } else {
        echo "Failed to add term.\n\n";
    }
  }
    }
