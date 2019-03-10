<?php
  include 'session.php';
  include 'checkSignSession.php';
  include 'connection.php';


    if(isset($_GET['boardID'])){
        $sql = "SELECT * FROM board WHERE boardID = {$_GET['boardID']}";
        $result = $dbConnect->query($sql);

        if( $result ) {
              $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
          }
      }
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="sign.css">
    </head>
        <body>
            <div class="part">
                <form method="post" action="updateBoard.php">
                    제목<br><br>
                    <input type="text" name="title" value = <?="{$contentInfo['title']}";?>>
                    <input type="hidden" name="boardID" value = <?="{$contentInfo['boardID']}";?>><br><br>
                    내용<br><br>
                    <textarea name="content" cols="80" rows="10"><?="{$contentInfo['content']}";?></textarea><br><br>
                    <input type="submit" value="저장">
                </form>
            </div>
        </body>
    </html>
