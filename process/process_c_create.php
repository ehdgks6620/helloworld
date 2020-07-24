<?php 
    require_once("../lib/content.php");
    $array = Array(
        "comment" => $_POST['comment'],
        "author" => $_POST['nick'],
        "num" => $_POST['board_num']
    );
    $sql = "insert into namu_comment(comment,author,created,num) values('{$array['comment']}','{$array['author']}',NOW(),{$array['num']})";
    $result = mysqli_query($connect,$sql);
    if($result==false){
        echo '오류가 생겼습니다.';

    }else{
        echo '<a href="../index.php">돌아가기</a>';
    }
?>