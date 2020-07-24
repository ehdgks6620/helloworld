<?php 
require_once("../lib/content.php");
$point = $_POST['point'];
$point = $point+100;

$sql_p = "update namu_member set point={$point} where u_nick='{$_POST['author']}'";
$result_p = mysqli_query($connect,$sql_p);
$filtered = Array(
    "title" => mysqli_real_escape_string($connect,$_POST['title']),
    "author" => mysqli_real_escape_string($connect,$_POST['author']),
    "description"=> mysqli_real_escape_string($connect,$_POST['description'])
);
$sql = "insert into namu_list(title, author, description, created) values('{$filtered['title']}','{$filtered['author']}','{$filtered['description']}',NOW());";
$result=mysqli_query($connect,$sql);

if($result===false){
    echo '오류가 생겼습니다.';
    error_log(mysqli_error($connect));
}else{
    echo '성공 <a href="../index.php">돌아가기</a>';
}

?>