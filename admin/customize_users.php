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
                   <h3>Admin List</h3>
                   <table>
                       <tr>
                           <th>Name</th>
                           <th>UserName</th>
                           <th>Role</th>
                           <th>Hire Date</th>
                           <th>Email</th>
                           <th>Phone #</th>
                           <th>Address</th>
                       </tr>
                       <?php
                       $peopleQuery = $db->prepare(
                        "SELECT name, username, role, hire, email, phone, address FROM users"
                        );
                        $peopleQuery->execute();
                        $siteUsers = $peopleQuery->fetchAll(PDO::FETCH_ASSOC);

                       foreach($siteUsers as $a){
                           echo "<tr>";
                           echo "<td>" . $a['name'] . "</td>";
                           echo "<td>" . $a['username'] . "</td>";
                           echo "<td>" . $a['role'] . "</td>";
                           echo "<td>" . $a['hire'] . "</td>";
                           echo "<td>" . $a['email'] . "</td>";
                           echo "<td>" . $a['phone'] . "</td>";
                           echo "<td>" . $a['address'] . "</td>";
                           echo "</tr>";
                       }
                       ?>
                   </table>
                   <?php





         ?>
         <a href="adduser.php">Add New User</a>

<?php include 'include/footer.php'; ?>
