<?php include 'include/header.php';
        if (!empty($_SESSION['name'])) {
            ?>
           <h3><?php echo $coName; ?> Dashboard</h3>
           <?php } ?>

<?php include 'include/footer.php'; ?>
