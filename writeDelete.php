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

    $sql = "DELETE FROM board
    WHERE
    boardID = {$_SESSION['boardID']}";

    $result = $dbConnect->query($sql);

    if($result){
        echo "삭제 완료";
        echo "<a href='list.php'>게시글 목록으로 이동</a>";
        exit;
    } else {
          echo "삭제 실패";
          echo "<a href='list.php'>게시글 목록으로 이동</a>";
          exit;
    }
?>
</html>
