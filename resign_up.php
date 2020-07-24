<?php
require_once('lib/content.php');
$sql = "select * from namu_member where u_id ='{$user_id}'";
$result = mysqli_query($connect,$sql);
$list=" ";
if($row=mysqli_fetch_array($result)){
    $list = $list."
    <form action='process/process_resign.php' method='post'>
    <input type='hidden' name='u_pw' value='{$row['u_pw']}'>
    <table>
    <tr>
    <th width='80'>아이디</th><td><input type='text' name='u_id' value='{$row['u_id']}'></td>
    </tr>
    <tr>
    <th>닉네임</th><td><input type='text' name='u_nick' value='{$row['u_nick']}'></td>
    </tr>
    <tr>
    <th>자기소개</th><td>
    <textarea name='u_intro' size='500' >$row[u_intro]</textarea>
    </td>
    </tr>
    </table>
    <br>
    <input type='submit'>
    </form>
    <br>
    <button><a href='index.php'>돌아가기</a></button>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAMU</title>
</head>
<body>
<div class="top"> 
    <div class="namu"><a href='./index.php'>NAMU</a></div>
</div>

</div>
<div class="main">
    <h3>정보수정</h3>
    <p>내 정보를 수정하세요</p>
    <?= $list?> 
</body>
</html>