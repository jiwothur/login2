<!DOCTYPE html>
<html>
    <style>
        html{
            background-image:url("memo1.jpg");
            background-size: auto ;
        }
    </style>

<?php
    include 'session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['nickName']);
    echo "로그아웃 되었습니다.";
    echo "<br>";
    echo "<a href='main.php'>"."메인으로 이동"."</a>";
?>

</html>
