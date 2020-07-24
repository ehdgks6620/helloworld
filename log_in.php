<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAMU</title>
</head>
<body>
<h1><a>NAMU</a></h1>
<p>로그인 하셔야 합니다.</p>

<form action="/loopy/webpage/process/process_log_in.php" method="post">
<table>
<tr>
    <th>아이디</th>
    <td><input type="text" name="u_id"></td>
</tr>
<tr>
    <th>비밀번호</th>
    <td><input type="password" name="u_pw"></td>
</tr>
<tr>
    <th>닉네임</th>
    <td><input type="text" name="u_nick"></td>
</tr>
</table>
    <br>
    <input type="submit" value="로그인">
</form>
    <p><a href="index.php">돌아가기</a><p>
</body>
</html>