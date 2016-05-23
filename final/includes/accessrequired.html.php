<?php if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true ) : ?>
<p><h1><a href="index.php" class="btn btn-primary">Login</a></h1></p>
<?php die('<h1>Access Denied</h1> '); endif;  ?>
