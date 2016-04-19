<?php
    //session_start();
    require_once 'includes/accessrequired.html.php';
    //echo $_SESSION['currentUserID'];
    $currentUserID = $_SESSION['currentUserID'];
 
    
?>
<h1>Welcome To The Admin Site, <?php echo $_SESSION['currentUserEmail']; ?></h1>

<br><br>

<a href="./logout.html.php">Log Out</a>

<hr>