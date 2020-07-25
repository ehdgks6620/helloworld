<!DOCTYPE html>
<?php 
    require_once("lib/content.php");
    $sql = "select * from namu_member where u_id='$user_id'";
    $result = mysqli_query($connect,$sql);

    $tag = " ";
    $greet = " ";
    if($row = mysqli_fetch_array($result)){
        $tag = $tag."<div class='tag tag_1'>
        <a class='a' href='process/process_log_out.php'>로그아웃</a>
        <a class='a' href='resign_up.php'>정보수정</a>
        <a class='a' href='create.php'>글작성하기</a></div>";
        $greet = $greet."<p>".$row['u_nick']."님 환영합니다!!</p>";
    } else{
        $tag = $tag."<div class='tag tag_2'>
        <a class='a' href='log_in.php'>로그인</a>
        <a class ='a' href='sign_up.php'>회원가입</a>
        </div>";
        $greet = $greet."<p>대학생들의 쉼터 나무입니다.</p>";
    }
        
    if(!isset($_GET['page'])){
        $page=1;
    } else {
        $page =$_GET['page'];
    }

    $view_list=10;
    
    $start=$view_list*($page-1);

    $sql_li_total = "select * from namu_list";
    $result_total = mysqli_query($connect, $sql_li_total);
    $total_list=mysqli_num_rows($result_total);

    $sql_li = "select * from namu_list limit $start, $view_list";
    $result = mysqli_query($connect, $sql_li);
    

    
    $li="<table border='1'><tr>
    <th>이동</th>
    <th>제목</th>
    <th>저자</th>
    <th>작성일</th>
    </tr> ";
    while($row_li=mysqli_fetch_array($result)){
        $arr_li = Array(
            'idx' => $row_li['idx'],
            'title' => $row_li['title'],
            'author' => $row_li['author'],
            'date' => $row_li['created']
        );
        $li = $li."<tr>
        <td><a href='board.php?idx=".$arr_li['idx']."'>click</a></td>
        <td>{$arr_li['title']}</td>
        <td>{$arr_li['author']}</td>
        <td>{$arr_li['date']}</td></tr>";
        
    } 
    require_once("lib/page.php");
    

?>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAMU</title>
    <link rel="stylesheet" />
</head>
<body>
<div class="top"> 
    <div class="namu"><a href='index.php'>NAMU</a></div>
    <?php echo $tag ?>
    <?php echo $greet ?>
</div>

</div>
<div class="main">
    
    <h3>게시판</h3>
    <form action="search.php" >
        <select name="categori">
        <option value="title">제목</option>
        <option value="author">저자</option>    
        </select>
        <input type="text" name="search" size="40">
        <input type="submit" value='검색'>
    </form>
    <br>
    <?=  $li ?>
    <?= $page_num?>
</div>
<br>
<div class="bottom">
    <table>
    <tr><h3>기타 기능</h3></tr>
    <tr>
        <td><a href='rank.php'>랭킹 조회</a></td>
    </tr></table>
</div>  
<div class='ooo'></div>
</body>
</html>