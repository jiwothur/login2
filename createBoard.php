<?php
    include 'connection.php';

    $sql = "CREATE TABLE board (";
    $sql .= "boardID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "title varchar(50) NOT NULL,";
    $sql .= "content longtext NOT NULL,";
    $sql .= "regTime varchar(40) NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)";
    $sql .= ") CHARSET=utf8";

    $result = $dbConnect->query($sql);

    if ($result) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }
?>
