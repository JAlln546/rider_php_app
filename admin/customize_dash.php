<?php include 'include/header.php'; ?>

           <h3><?php echo $coName; ?> Dashboard</h3>
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

           if(!isset($_POST['customize'])){
            ?>

            <p>
                Customize Your Dashboard
            </p>
            <form action="" method="post">
                <h4>Display:</h4>
                <p>
                    Analytics<input type="checkbox" name="customize[]" value="analytics"/>
                </p>
                 <p>
                    New Comments<input type="checkbox" name="customize[]" value="comments"/>
                </p>
                 <p>
                    Database Updates<input type="checkbox" name="customize[]" value="db_updates"/>
                </p>
                 <p>
                    Link to Database Edits<input type="checkbox" name="customize[]" value="db_edits"/>
                </p>

                <input type="submit" name="customize[]" value="Customize"/>
            </form>

            <?php
           } else {
               $item = $_POST['customize'];

           foreach($item as $i) {
               echo "<section>";
                echo "";
               echo "</section>";
           }
           }
         ?>

<?php include 'include/footer.php'; ?>
