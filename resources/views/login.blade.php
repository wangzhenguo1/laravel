<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <h1>文大拿</h1>
     <form action="{{url('logindo')}}" method="post">
         @csrf
        <input type="text" name="name">账号<br>
        <input type="text" name="pwd">密码<br>
        <input type="submit" value="提交">
     </form>
</body>
</html>