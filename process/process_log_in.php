<?php
 session_start();
 if(isset($_SESSION["id"])){
     $login_check=True;
 }
 $connect = mysqli_connect("localhost","root","000325","namu");
 $filtered = array(
    'id' => mysqli_real_escape_string($connect,$_POST['u_id']),
    'pw' => mysqli_real_escape_string($connect,$_POST['u_pw']),
    'nick' => mysqli_real_escape_string($connect,$_POST['u_nick'])
);
 $back=0;
 $sql ="select * from namu_member";
 $result = mysqli_query($connect,$sql);
 while($row=mysqli_fetch_array($result)){
    if($filtered['id']==$row['u_id'] && $filtered['pw']==$row['u_pw'] && $filtered['nick']==$row['u_nick']){
        $back=1;
        $_SESSION['id']=$row['u_id'];
        $_SESSION['pw']=$row['u_pw'];
        $_SESSION['nick']=$row['u_nick'];
        header('Location: ../index.php');
        
    }

 }
 if($back!=1){
 $back=0;
 ?>
  <form action="/loopy/webpage/index.php" method="post">
      <h1>로그인에 실패했습니다. 다시 입력해주세요.</h1>
      <input type="hidden" name="back" value="<?=$back?>">
      <input type="submit" name="submit" value="메인창으로 돌아가기">
    </form>
<?php
  }
?>