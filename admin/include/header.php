<?php
session_start();

/* if ($_SESSION['valid'] != true) {
    header("Location: /login.php");
} */

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

include 'user.php';

$db = connectDB();

if ($db == null) {
    echo "UH OH!";
    die();
}

date_default_timezone_set('America/Los_Angeles');
?>


<!DOCTYPE html>
<html>
    <head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-101959104-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $analytics;?>');
</script>

<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
    max_width: 300
  });
  </script>

        <title>
            <?php echo ucwords($coName); ?>
        </title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/front.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
         <script type="text/javascript">
        function resize() {
            var frame = document.getElementById("main");
            var windowheight = window.innerHeight;
            document.body.style.height = windowheight + "px";
            frame.style.height = windowheight - 180 + "px";
        }
     </script>
    </head>
    <body onload="resize()" onresize="resize()">

        <header>
            <h2>
            <?php echo strtolower($coName); ?>
        </h2>
        <?php

        if (empty($_SESSION['name'])) {

        ?>
        <h3>
            Please <a href="login.php">Login</a>
        </h3>
        <?php

        } else {

        ?>
        <h3>
                Logged in as <?php echo $_SESSION['name']; ?>
                |
                <a href="logout.php">Logout</a>
            </h3>


        <?php
        }
        ?>
        </header>
        <div id="container">
        <aside>
            <h3>
                DASHBOARD
            </h3>
         <?php
         if (!empty($_SESSION['name'])) {
         ?>
                <ul>
                    <li><a href="index.php">Home</a></li><Br>
                    <li><a href="pages.php">Pages</a></li><Br>
                    <li><a href="media.php">Media</a></li><Br>
                    <li><a href="plugin.php">Plugin</a></li><Br>
                    <li><a href="customize.php">Customize</a></li>
                    <br><hr><br>
                    <li><a href="http://www.jessallen.me/rider/admin" target="_blank">View Site</a></li>
                </ul>
        <?php

         } else {
                echo "<h4>";
                echo "Please <a href=\"login.php\">Login</a>";
                echo "</h4>";
            } ?>


        </aside>

        <main>
             <div class="date">
                <?php
                echo "<h1><em>";
                echo date("l");
                echo "</em></h1>";
                echo "&nbsp;&nbsp;&nbsp;<h3>";
                echo date("M j, Y");
                echo "</h3>";
                ?>
       </div>
       <hr>
