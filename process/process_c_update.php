<?php 
    require_once("../lib/content.php");
    $n = $_POST['c_idx'];
    $array = Array(
        "comment" => $_POST['comment']
    );
    $sql="update namu_comment set comment='{$array['comment']}' where idx={$n}";
    $result = mysqli_query($connect,$sql);
    if($result==false){
        echo '오류가 생겼습니다.';
        error_log(mysql_error($connect));
    }else{
        echo '<a href="../index.php">돌아가기</a>';
    }
?>