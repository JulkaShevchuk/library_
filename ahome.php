<?php
session_start();
include 'database.php';
function countRecord($sql,$db)
{
    $res = $db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION["id"])){
    header("alogin.php");

}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="container">
    <div id="header">
        <h1>E-library Management system</h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">Welcome Admin</h3>
        <div id="center">
            <ul class="record">
                <li>Total Students: <?php echo countRecord("SELECT * FROM student",$db);?></li>
                <li>Total books: <?php echo countRecord("SELECT * FROM book",$db);?></li>
                <li>Total request: <?php echo countRecord("SELECT * FROM request",$db);?></li>
                <li>Total comments: <?php echo countRecord("SELECT * FROM comment",$db);?></li>
            </ul>
        </div>
    </div>
    <div id="navi">
        <?php include 'admin.php';?>
    </div>
    <div id="footer" >
        <p>copyright &copy;Yuliia Shevchuk 2021</p>
    </div>
</div>

</body>
</html>
