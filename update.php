<?php 
 require_once('lib/content.php');
 $u=$_POST['nick'];
 $n=$_POST['num'];
 $sql = "select * from namu_list where author='{$u}' and idx={$n} ";
 $result = mysqli_query($connect,$sql);
 $list=" ";
 if($row=mysqli_fetch_array($result)){
    $list = $list."<form action='process/process_update.php' method='post'>
    <input type='hidden' name='u_idx' value={$row['idx']}>
    <input type='hidden' name='u_author' value='{$row['author']}'>
    <table>
    <tr>
    <th width='80'>제목</th><td><input type='text' value='{$row['title']}' name='u_title'></td>
    </tr>
    <tr>
    <th>저자</th><td>{$row['author']}</td>
    </tr>
    <tr>
    <th>내용</th>
    <td>
    <textarea name='u_description' size='300' >{$row['description']}</textarea>
    </td>
    </tr>
    </table>
    <input type='submit' value='수정완료'>
    </form>";
 } else {
    header("Location: index.php");
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
    <h3>게시판</h3>
    <p>글을 수정하시면 됩니다!!</p>
    <?= $list?> 
    <br>
    <button><a href='index.php'>돌아가기</a></button>
</div>
</body>
</html>

