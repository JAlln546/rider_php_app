<?php include 'include/header.php'; ?>

   <!-- <h3><?php echo $coName; ?> Dashboard</h3> -->
   <nav>
   <ul>
        <?php
        $menu = array(
            'dash' => 'Dashboard',
            'users' => 'Users',
            'dbitems' => 'Database Items'
        );
        foreach($menu as $m => $v){

        echo "<li><a href=\"customize_$m.php\">$v</a></li>";

        }
        ?>
    </ul>
    </nav>

<?php


       ?>
       <h3 class="dbitems">Wines  |  <a href="addwine.php">Edit</a></h3>
       <table>
           <tr>
               <th>Color</th>
               <th>Cellar</th>
               <th>Name</th>
               <th>Category</th>
               <th>Type</th>
               <th>Vintage</th>
               <th>Price</th>
           </tr>
           <?php
           $wineQuery = $db->prepare(
            "SELECT w_color, w_cellar, w_name, w_category, w_type, w_vintage, w_price FROM wine LIMIT 0, 5"
            );
            $wineQuery->execute();
            $wine = $wineQuery->fetchAll(PDO::FETCH_ASSOC);

           foreach($wine as $w){
               echo "<tr>";
               echo "<td>" . ucwords($w['w_color']) . "</td>";
               echo "<td>" . ucwords($w['w_cellar']) . "</td>";
               echo "<td>" . ucwords($w['w_name']) . "</td>";
               echo "<td>" . ucwords($w['w_category']) . "</td>";
               echo "<td>" . ucwords($w['w_type']) . "</td>";
               echo "<td>" . $w['w_vintage'] . "</td>";
               echo "<td>" . $w['w_price'] . "</td>";
               echo "</tr>";
           }
           ?>
       </table>

       <h3 class="dbitems">Beers  |  <a href="beer.php">Edit</a></h3>
       <table>
           <tr>
               <th>Ale / Lager</th>
               <th>Brewery</th>
               <th>Name</th>
               <th>Type</th>
               <th>ABV</th>
               <th>IBU</th>
               <th>Price</th>
           </tr>
           <?php
           $beerQuery = $db->prepare(
            "SELECT b_ferment, b_brewery, b_name, b_type, b_abv, b_ibu, b_price FROM beer LIMIT 0, 5"
            );
            $beerQuery->execute();
            $beer = $beerQuery->fetchAll(PDO::FETCH_ASSOC);

           foreach($beer as $b){
               echo "<tr>";
               echo "<td>" . $b['b_ferment'] . "</td>";
               echo "<td>" . $b['b_brewery'] . "</td>";
               echo "<td>" . $b['b_name'] . "</td>";
               echo "<td>" . $b['b_type'] . "</td>";
               echo "<td>" . $b['b_abv'] . "</td>";
               echo "<td>" . $b['b_ibu'] . "</td>";
               echo "<td>" . $b['b_price'] . "</td>";
               echo "</tr>";
           }
           ?>
       </table>

       <h3 class="dbitems">Liquors  |  <a href="liquor.php">Edit</a></h3>
       <table>
           <tr>
               <th>Type</th>
               <th>Distillery</th>
               <th>Name</th>
               <th>Type</th>
               <th>Price</th>
           </tr>
           <?php
           $liqQuery = $db->prepare(
            "SELECT l_type, l_distillery, l_name, l_type, l_price FROM liquor LIMIT 0, 5"
            );
            $liqQuery->execute();
            $liq = $liqQuery->fetchAll(PDO::FETCH_ASSOC);

           foreach($liq as $l){
               echo "<tr>";
               echo "<td>" . $l['l_type'] . "</td>";
               echo "<td>" . $l['l_distillery'] . "</td>";
               echo "<td>" . $l['l_name'] . "</td>";
               echo "<td>" . $l['l_type'] . "</td>";
               echo "<td>" . $l['l_price'] . "</td>";
               echo "</tr>";
           }
           ?>
       </table>

       <h3 class="dbitems">Cocktails  |  <a href="cocktails.php">Edit</a></h3>
       <table>
           <tr>
               <th>Name</th>
               <th>Ingredients</th>
               <th>Price</th>
           </tr>
           <?php
           $cQuery = $db->prepare(
            "SELECT c_name, c_ingredients, c_price FROM cocktails LIMIT 0, 5"
            );
            $cQuery->execute();
            $cocktail = $cQuery->fetchAll(PDO::FETCH_ASSOC);

           foreach($cocktail as $c){
               echo "<tr>";
               echo "<td>" . ucwords($c['c_name']) . "</td>";
               echo "<td>" . ucwords($c['c_ingredients']) . "</td>";
               echo "<td>" . $c['c_price'] . "</td>";
               echo "</tr>";
           }
           ?>
       </table>

       <h3 class="dbitems">Food  |  <a href="food.php">Edit</a></h3>
       <table>
           <tr>
               <th>Title</th>
               <th>Menu</th>
               <th>Price</th>
           </tr>
           <?php
           $foodQuery = $db->prepare(
            "SELECT f_title, f_menu, f_price FROM food LIMIT 0, 5"
            );
            $foodQuery->execute();
            $food = $foodQuery->fetchAll(PDO::FETCH_ASSOC);

           foreach($food as $f){
               echo "<tr>";
               echo "<td>" . ucwords($f['f_title']) . "</td>";
               echo "<td>" . ucwords($f['f_menu']) . "</td>";
               echo "<td>" . $f['f_price'] . "</td>";
               echo "</tr>";
           }

           ?>
       </table>

       <h3 class="dbitems">Terms  |  <a href="terms.php">Edit</a></h3>
       <table>
           <tr>
               <th>Category</th>
               <th>Sub Category</th>
               <th>Title</th>
               <th>Definition</th>
           </tr>
           <?php
           $termQuery = $db->prepare(
            "SELECT t_name, t_category, t_subcat, t_def FROM terms LIMIT 0, 5"
            );
            $termQuery->execute();
            $term = $termQuery->fetchAll(PDO::FETCH_ASSOC);

           foreach($term as $t){
               echo "<tr>";
               echo "<td>" . ucwords($t['t_category']) . "</td>";
               echo "<td>" . ucwords($t['t_subcat']) . "</td>";
               echo "<td>" . ucwords($t['t_name']) . "</td>";
               echo "<td>" . ucfirst($t['t_def']) . "</td>";
               echo "</tr>";
           }
           ?>
       </table>
       <?php


 ?>
 <!-- <a href="adduser.php">Add New User</a> -->

<?php include 'include/footer.php'; ?>
