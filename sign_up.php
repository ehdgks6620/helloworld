<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAMU</title>
</head>
<body>
    <h1 ><a>NAMU</a></h1>
    <h2>회원정보 입력</h2>
    <div class="signUP">
    <form action="process/process_sign_up.php" method="post">
        <table>
        <tr height="2"><td colspan="2"></td></tr>
        <tr>
         <th>이름 </th>
         <td><input type="text" name="u_name" placeholder="이름" ></td>
        </tr>
        <tr>
         <th>아이디 </th>
         <td><input type="text" name="u_id" placeholder="아이디"></td>
        </tr>
         <tr>
         <th>비밀번호 </th>
         <td><input type="password" name="u_pw" placeholder="비밀번호"></td>
         </tr>
        <tr>
         <th>닉네임</th>
         <td>
         <input type="text" name="u_nick" placeholder="닉네임">
         </td>
        </tr>
        <tr>
         <th>자기소개</th>
         <td>
         <textarea name='u_intro' placeholder='내용' size=100 ></textarea>
         </td>
        </tr>
        </table>
        <br>
        <input type="submit" value="회원가입">
    </form>
    <br>
    <p><a href="index.php">돌아가기</a><p>
    <div>
</body>
</html>