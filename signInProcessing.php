<?php
    include 'session.php';
    include 'connection.php';

    $email = $_POST['userEmail'];
    $pw = $_POST['userPassWord'];

    //유효하지않은 데이터입력시 실행되는 함수
    function goSignInPage($alert){
        echo $alert.'<br>';
        echo "<a href='signInForm.php'>로그인창으로 이동</a>";
        return;
    }

    //유효성 검사
    //이메일 검사
    if(!filter_Var($email, FILTER_VALIDATE_EMAIL)){
        goSignUpPage('올바른 이메일이 아닙니다.');
        exit;
    }

    //비밀번호 검사
    if($pw == null || $pw == ''){
        goSignUpPage('비밀번호를 입력해 주세요.');
        exit;
    }

    //비밀번호 암호화
    $pw = sha1('random'.$pw);

   //입력값이 db의 데이터와 일치하는지 검사
    $sql = "SELECT email, nickName, memberID FROM member ";
    $sql .= "WHERE email = '{$email}' AND pw = '{$pw}'";
    $result = $dbConnect->query($sql);

    if($result){
        if($result->num_rows == 0){
            goSignInPage('로그인 정보가 일치하지 않습니다.');
            exit;
        } else {
              $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
              $_SESSION['memberID'] = $memberInfo['memberID'];
              $_SESSION['nickName'] = $memberInfo['nickname'];
              Header("Location:main.php");
        }
    }

 ?>
