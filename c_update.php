<?php 
require_once('lib/content.php');
$n = $_POST['c_idx'];
$sql = "select * from namu_comment where idx={$n}";
$result = mysqli_query($connect,$sql);
$list=" ";
if($row=mysqli_fetch_array($result)){
    $list = $list."<form action='process/process_c_update.php' method='post'>
    <input type='hidden' value={$n} name='c_idx'> 
    <table>
    <tr>
    <th width='80'>댓글</th><td><input type='text' value='{$row['comment']}' name='comment'></td>
    </tr>
    <tr>
    <th>작성자</th><td>{$row['author']}</td>
    </tr>
    </table>
    <br>
    <input type='submit' value='수정완료'>
    </form>";
} else {
    header("Location:index.php");
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
    <h3>댓글</h3>
    <p>댓글을 수정하시면 됩니다!!</p>
    <?= $list?> 
</div>
</body>
</html>