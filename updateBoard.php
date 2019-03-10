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

    $title = $_POST['title'];
    $content = $_POST['content']; //입력한 제목과 내용을 각각의 변수에 대입
    $boardID = $_POST['boardID'];
    $memberID = $_SESSION['memberID'];

    $sql = "UPDATE board SET
    memberID = '{$memberID}',
    title = '{$title}',
    content = '{$content}',
    regTime = NOW()
    WHERE
    boardID = {$boardID}";

    $result = $dbConnect->query($sql);

    if($result){
        echo "저장 완료";
        echo "<a href='list.php'>게시글 목록으로 이동</a>";
        exit;
    } else {
        echo "저장 실패 - 관리자에게 문의";
        echo "<a href='list.php'>게시글 목록으로 이동</a>";
        exit;
    }
?>
</html>
