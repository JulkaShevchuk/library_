<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["id"])){
    header("ulogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">Welcome <?php echo  $_SESSION["name"];?></h3>

    </div>
    <div id="navi">
        <?php include 'user.php';?>
    </div>
    <div id="footer" >
        <p>copyright &copy;Yuliia Shevchuk 2021</p>
    </div>
</div>

</body>
</html>
