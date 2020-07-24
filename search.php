<?php
require_once("lib/content.php");
$category = $_GET['categori'];
$search = $_GET['search'];

$sql="select * from namu_list where $category like '%$search%'";
$result=mysqli_query($connect,$sql);
$li=" ";
while($row_search=mysqli_fetch_array($result)){
    $arr_search = Array(
        'idx' => $row_search['idx'],
        'title' => $row_search['title'],
        'author' => $row_search['author'],
        'date' => $row_search['created']
    );
    $li = $li."<li><a href='board.php?idx=".$arr_search['idx']."'>
    {$arr_search['title']}
    </a>&nbsp&nbsp{$arr_search['author']}
    &nbsp&nbsp{$arr_search['date']}</li>";
    
} 
if($category == "title"){
    $var = "제목";
} else if ($category =="author"){
    $var = "저자";
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
    <h3><?php echo $var; ?>에서 '<?php echo $search; ?>'검색결과</h3>
</div>

<div class="main">
    <h3>게시판</h3>
    <form action="./search.php" >
        <select name="categori">
        <option value="title">제목</option>
        <option value="author">저자</option>    
        </select>
        <input type="text" name="search" size="40">
        <input type="submit" value='검색'>
    </form>
    <br>
    <?= $li ?>
    <?php 

    ?>
</div>
<br>
<div class="bottom">
    <table>
    <tr><h3>이전 페이지</h3></tr>
    <tr>
    <button><a href="./index.php">돌아가기</a></button>
    </tr></table>
</div>  
    
</body>
</html>