<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';
?>

<!doctype html>
<html>
    <link rel="stylesheet" href="list1.css">
        <head>
            <title>게시물 목록</title>
        </head>
            <body>
                <h2>memo/login service</h2>

                <div class="part">
                    <ul>
                        <li><a href="writeForm.php">글작성하기</a></li><br>
                        <li><a href="signOut.php">로그아웃</a></li>
                    </ul>

                <div id=part1>
                    <table>
                        <thead>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>게시일</th>
                        </thead>

                            <tbody>
                                <?php
                                    $sql = "SELECT b.boardID, b.title, m.nickname, b.regTime,b.memberID FROM board b ";
                                    $sql .= "JOIN member m ON (b.memberID =m.memberID)"; //로그인된 memberID와 board의 작성자 memberID가 일치할 경우인 데이터만 가져오기
                                    $result  = $dbConnect->query($sql);

                                    if($result) {
                                        $dataCount = $result->num_rows;

                                        if($dataCount > 0){
                                            for($i = 0; $i < $dataCount; $i++){
                                                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                                                if($_SESSION['memberID']==$memberInfo['memberID']){ //세션의 memberID와 $memberInfo의 memberID가 같은 경우 데이터 출력
                                                    echo "<tr>";
                                                    echo "<td><a href='view.php?boardID=";
                                                    echo "{$memberInfo['boardID']}'>";
                                                    echo $memberInfo['title'];
                                                    echo "</a></td>";
                                                    echo "<td> {$memberInfo['nickname']}</td>";
                                                    echo "<td>"."{$memberInfo['regTime']}"."</td>";
                                                    echo "</tr>";
                                                  }
                                              }
                                        } else {
                                              echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
                                        }
                                    }
                                ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </body>
      </html>
