
<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["idstud"])){
    header("ulogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">Delete</h3>
        <div id ="center">
            <form action ="" method="post" >
                <label>Enter user ID</label>
                <input type="text" name="id">
                <button tupe="submit" name="delete">Delete</button>

            </form>


            <?php
            if (isset($_POST['delete'])){
                $sql="DELETE FROM student WHERE id={$_POST["id"]}";
                $db ->query($sql);
                   echo "<p class='success'>User has been deleted</p>";

            }else{
                 "<p class='error'>Error</p>";
            }


            ?>



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


