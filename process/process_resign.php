<?php
require_once('../lib/content.php');
$array = Array(
    "id" => $_POST['u_id'],
    "nick" => $_POST['u_nick'],
    "intro" => $_POST['u_intro'],
    "pw" => $_POST['u_pw']
);
//$_SESSION['id']=$array['id'];
//$_SESSION['nick']=$array['nick'];
$sql_li = "update namu_list set author='{$array['nick']}' where author='{$user_nick}'";
$result_li = mysqli_query($connect,$sql_li);
$sql_co = "update namu_comment set author='{$array['nick']}' where author='{$user_nick}'";
$result = mysqli_query($connect,$sql_co);
$sql = "update namu_member set u_id='{$array['id']}', u_nick='{$array['nick']}', u_intro='{$array['intro']}' where u_pw='{$array['pw']}'";
$result = mysqli_query($connect,$sql);
$_SESSION['id']=$array['id'];
$_SESSION['nick']=$array['nick'];

if($result==false){
    echo '오류가 생겼습니다.';
    error_log(mysqli_error($connect));
}else{
    echo '<a href="../index.php">돌아가기</a>';
}

?>

