<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/home/test/verify_form">
    @csrf
    <p>name:<input type="text" name="name" placeholder=""></p>
    <p>age:<input type="text" name="age" placeholder=""></p>
    <p>email:<input type="text" name="email" placeholder=""></p>
    <p>captcha:<img src="{{Captcha::src('default')}}"><input type="text" name=captcha></p>
    <input type="submit">
    </form>
</body>
</html>