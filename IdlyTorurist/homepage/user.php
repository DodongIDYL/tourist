<?php

    include '../php/connect.php';

    $id = 1;

    if(isset($_GET['logout'])){
        unset($id);
        session_destroy();
        header('location: ../loginForm/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>User</title>
</head>
<body>
        <div class="header-container">
            <div class="logo-container">
                <a href="#" class="logoLink"><h1>Portico</h1></a>
            </div>
            <div class="centerHeaderContent">
                <div class="searchForm">
                <form>
                        <div class="background">
                            <input type="text" name="" class="field" placeholder="search" style="width:525px">
                        </div>
                    </form>
                </div>
            </div>
            <div class="rightHeaderContent">
                <ul class="navItems">
                    <li class="navItem hideablenavItem">
                        <a href="#">
                            <button class="loginHeaderButton loginTrigger">
                                <span>Account</span>
                            </button>
                        </a>
                    </li>
                    <li class="navItem hideablenavItem">
                        <a  href="user.php?id="<?= $id?>>
                            <button class="signupHeaderButton signupTrigger">
                                <span>Logout</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>          
        </div> 
        <div class="grid">
            <?php
                $query = mysqli_query($conn, "SELECT * FROM `upload` ORDER BY date DESC");
                while($row = mysqli_fetch_assoc($query)){
            ?>
            <div class="gridWrapper">
                <img src="../uploads/<?=$row['image'];?>">
                <div class="overlay">
                    <div class="descrip">
                        <h4><?=$row['title'];?></h4>
                        <p><?=$row['description'];?></p>
                    </div>
                    <a href="info.php?id="<?=$row['id'];?>>Read More</a>
                </div>            
            </div>
            <?php } ?>
        </div>
        
</body>

</html>