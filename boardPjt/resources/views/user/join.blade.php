<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOIN</title>
</head>
<body>
    <h1> JOIN. 회원가입 </h1>
    <form action="{{ route('users.insUser') }}">
        <div><label>ID <input type="text" name="user_id"></label></div>
        <div><label>PW <input type="password" name="password"></label></div>
        <div><label>NAME <input type="text" name="nicknm"></label></div>
        <input type="submit" value="JOIN">
        @csrf
    </form>
</body>
</html>