<?php
    $conn = mysqli_connect('localhost','root','','touristdb');
    session_start();
    $_SESSION['id'] = 1;
