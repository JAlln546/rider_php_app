<?php include 'include/header.php'; ?>


            <h1>
                Admin Login
            </h1>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query2 = $db->prepare(
                            'SELECT * FROM users '.
                            'WHERE username = :username'
                        );
                    $query2->execute([
                        'username' => $username
                        ]);

                        $result = $query2->fetch(PDO::FETCH_ASSOC);
                        if (isset($result['password'])) {
                            if (password_verify($password, $result['password'])) {
                                $_SESSION['valid'] = true;
                                $_SESSION['name'] = $result['name'];
                                $_SESSION['MemberID'] = $result['MemberID'];
                                header('Location: index.php');
                            }
                        }
                        echo "<h3><strong>Sorry, credentials do not match.</strong></h3>";
                } else {
                    echo "<h3><strong>Must enter a username and password.</strong></h3>";
                }
            }
        ?>
            <div class="forms">
            <form class="login" method="post" action="">
                <h3>
                    UserName:<br>
                    <input type="text" name="username" />
                </h3>
                <h3>
                    Password:<br>
                    <input type="password" name="password" />
                </h3>
                <input type="submit" name="submit" value="Submit"/>
            </form><br>
     </div>

     <!-- <div class="createUser">
       <p>Don't have an account? &nbsp;<a href="adduser.php">Register</a></p>
     </div>
   -->
        <!--
            <form class="register" method="post" action="">
                <h2>Register</h2>
                <h3>
                    Your Name:<br>
                    <input type="text" name="name" />
                </h3>
                <h3>
                    Your UserName:<br>
                    <input type="text" name="setusername" />
                </h3>
                <h3>
                    Your Password:<br>
                    <input type="password" name="setpassword" />
                </h3>

                <input type="submit" name="regsubmit" value="Submit"/>
            </form>
        -->




<?php include 'include/footer.php'; ?>
