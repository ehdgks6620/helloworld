<?php 
require_once("lib/content.php");

$sql="select u_nick, rank() over (
    order by point desc
) idx,point from namu_member";

$result = mysqli_query($connect,$sql);

$li="<table border='1' width='200'>
<tr>
<th>순위</th>
<th>닉네임</th>
<th>포인트</th>
</tr>";

while($row=mysqli_fetch_array($result)){
    $li=$li."<tr><td>{$row['idx']}</td><td>{$row['u_nick']}</td><td>{$row['point']}</td>";
}
$li=$li."</table>";
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
    <h1><a href="index.php">NAMU</a></h1>
    <h3>사용자 랭킹</h3>
    <p><?="{$user_nick}님의 순위를 확인하세요!" ?></p>
</div>

<div class="main">
<p>글을 작성할때마다 100점을 얻습니다!</p>
<?=  $li ?>
</div>
<br>
<button><a href='index.php'>돌아가기</a></button>
<div class="bottom">
</div>   
</body>
</html>