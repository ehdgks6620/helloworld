<?php 
require_once("lib/content.php");
$sql = "select * from namu_member where u_id='$user_id'";
$result = mysqli_query($connect,$sql);
$tag=" ";
if($row=mysqli_fetch_array($result)){
     $tag= $tag."
    <form action='process/process_create.php' method='post'>
    <input type='hidden' name='point' value='{$row['point']}'>
    <table>
    <tr>
    <th>제목</th>
    <td><input type='text' name='title' placeholder='제목'></td>
    </tr>
    <tr>
    <th>저자</th>
    <td><input type='hidden' name='author' value='{$row['u_nick']}'>
    <h5> {$row['u_nick']}</h5> 
    </td>
    </tr>
    <tr>
    <th>내용</th>
    <td><textarea name='description' placeholder='내용' size=50></textarea></td>
    </tr>
    </table>
    <br>
    <input type='submit' value='작성하기'>
    </form>"; 
    
} else{
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
    <h1><a>NAMU</a></h1>
    <p>개성있는 글을 작성해주세요</p>
</div>

<div class="main">
<br>  
<h3>게시글 작성</h3>
<?=  $tag ?>
</div>
<div class="bottom">
</div>   
</body>
</html>