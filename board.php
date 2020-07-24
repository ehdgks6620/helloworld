<?php 
require_once("lib/content.php");

$sql="select * from namu_list where idx={$_GET['idx']}";
$result=mysqli_query($connect,$sql);

$board=" ";
$update=" ";
$delete=" ";
$comment=" ";

if($row=mysqli_fetch_array($result)){
    $board=$board."
    <table width='250' border='1' >
    <tr><th>제목</th><td>{$row['title']}</td></tr>
    <tr><th>저자</th><td>{$row['author']}</td></tr>
    <tr><th>내용</th><td>{$row['description']}</td></tr>
    </table>";}

if($user_nick == $row['author']){
        $update = $update."<form action='update.php' method='post'>
        <input type='hidden' name='num' value={$_GET['idx']}>
        <input type='hidden' name='nick' value='{$user_nick}'>
        <input type='submit' value='수정'>
        </form>";
        $delete = $delete."<form action='process/process_delete.php' method='post'>
        <input type='hidden' name='num' value={$_GET['idx']}>
        <input type='hidden' name='nick' value='{$user_nick}'>
        <input type='submit' value='삭제'>
        </form>";
    }
if(isset($_SESSION['id'])){
    $comment = $comment."
    <form action='process/process_c_create.php' method='post'>
    <input type='hidden' name='nick' value='{$user_nick}'>
    <input type='hidden' name='board_num' value={$_GET['idx']}>
    <div>
        <input type='text' name='comment'>
        <input type='submit' value='작성'>
    </div>
    </form>
    ";
}
$c_list="<table border='1'><tr><th width='50'>작성자</th><th width='120'>댓글</th><th width='80'>수정하기</th><th width='80'>삭제하기</th></tr> ";    
$c_update=" ";
$c_delete=" ";
$sql_comment = "select * from namu_comment where num={$_GET['idx']}";
$result_comment = mysqli_query($connect,$sql_comment);
while($row=mysqli_fetch_array($result_comment)){
 $c_arr = Array(
    "comment" => $row['comment'],
    "author" => $row['author']
 );
 $c_update="";
 $c_delete="";
 if($c_arr['author']==$user_nick){
     $c_update=$c_update."<form action='c_update.php' method='post'>
     <input type='hidden' name='c_idx' value={$row['idx']}>
     <input type='hidden' name='nick' value='{$user_nick}'>
     <input type='submit' value='수정'>
     </form>";
     $c_delete=$c_delete."<form action='process/process_c_delete.php' method='post'>
     <input type='hidden' name='c_idx' value={$row['idx']}>
     <input type='hidden' name='nick' value='{$user_nick}'>
     <input type='submit' value='삭제'>
     </form>";
    }
     $c_list=$c_list."<tr><td>{$c_arr['author']}</td><td>{$c_arr['comment']}</td><td>{$c_update}</td><td>{$c_delete}</td></tr>";
}
$c_list = $c_list."</table>";
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
    <p>개성있는 글을 작성해주세요</p>
</div>

<div class="main">

    <div>
    <h3>게시글 확인</h3>
    <?php echo $board ?>
    </div>
    <br>
    <table>
    <tr>
    <?php echo $update?>
    </tr>
    <tr>
    <?php echo $delete?>
    </tr>
    </table>
</div>
<div class="bottom">
    <h3>댓글 달기</h3>
    <?php echo $comment?>
    <br> 
    <?php echo $c_list?>
</div>   
</body>
</html>