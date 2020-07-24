<?php
require_once('../lib/content.php');
$array = Array(
    "name" => $_POST['u_name'],
    "id" => $_POST['u_id'],
    "pw" => $_POST['u_pw'],
    "nick" => $_POST['u_nick'],
    "intro" => $_POST['u_intro']
);
$sql = "
INSERT INTO namu_member(u_name,u_id,u_pw,u_nick,u_intro,created)
 VALUES('{$array['name']}',
 '{$array['id']}',
 '{$array['pw']}',
 '{$array['nick']}',
 '{$array['intro']}',
 NOW())";
 
$result = mysqli_query($connect,$sql);
if($result===false){
    echo "잘못입력하셨습니다.";
    echo $result.error($connect);
}else{
    echo "<script>alert('회원가입에 성공했습니다.')</script>
        <a href='/loopy/webpage/index.php'>다시 돌아가기</a>";
}

?>
