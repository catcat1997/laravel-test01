<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上傳</title>
    <style>
        img {
            width: 200px;
            
        }
    </style>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <p>姓名:<input type="text" name="name"></p>
        <p>年齡:<input type="text" name="age"></p>
        <p>email:<input type="text" name="email"></p>
        <p>頭像:<input type="file" name="avatar"></p>
        <input type="submit">
    </form>
    上一個用戶上傳的頭像:
    <img src="{{$images}}" alt="">
</body>
</html>