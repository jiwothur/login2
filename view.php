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
      include 'checkSignSession.php';
      include 'connection.php';

    if(isset($_GET['boardID'])){
        $boardID = $_GET['boardID'];
        $_SESSION['boardID']=$_GET['boardID'];
        $sql = "SELECT b.content FROM board b ";
        $sql .= "WHERE b.boardID = {$boardID}";
        $result = $dbConnect->query($sql);

      if($result) {
            $contentInfo = $result->fetch_array(MYSQLI_ASSOC);

            echo "<내용><br><br>";
            echo $contentInfo['content'].'<br><br>';
            echo "<a href='updateForm.php?boardID={$boardID}'>글수정하기 </a>";
            echo "<a href='writeDelete.php?boardID={$boardID}'>글삭제하기 </a>";
            echo "<a href='list.php'>목록으로 이동</a>";

        } else {
              echo "잘못된 접근입니다.";
              exit;
        }
    } else {
          echo "잘못된 접근입니다.";
          exit;
    }
?>
</html>
