<?php 
    require_once("../lib/content.php");
    $array = Array(
        "idx" => $_POST['u_idx'],
        "author" => $_POST['u_author'],
        "title" => $_POST['u_title'],
        "description" => $_POST['u_description']
    );
    $sql = "update namu_list set title = '{$array['title']}',
    description = '{$array['description']}' where idx={$array['idx']}
    ";
    $result = mysqli_query($connect,$sql);
    if($result==false){
        echo '오류가 생겼습니다.';
        error_log(mysql_error($connect));
    }else{
        echo '<a href="../index.php">돌아가기</a>';
    }

?>
