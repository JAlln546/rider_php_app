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




<?php include 'include/footer.php'; ?>
