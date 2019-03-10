<?php
    include 'session.php';
    include 'checkSignSession.php';
?>

<!doctype html>
<html>
    <link rel="stylesheet" href="sign.css">
        <body>
            <div class="part">
                <form action="saveBoard.php" method="post">
                    제목<br><input type="text" name="title"><br><br>
                    내용<br><textarea name="content" cols="80" rows="10"></textarea><br><br>
                    <input type="submit" value="저장">
                </form>
              </div>
        </body>
    </html>
