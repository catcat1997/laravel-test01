<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    id&emsp;&emsp;name&emsp;&emsp;age&emsp;&emsp;email <br/>
    @foreach($data as $val)
        {{$val->id}}&emsp;&emsp;{{$val->name}}&emsp;&emsp;{{$val->age}}&emsp;&emsp;{{$val->email}} <br/>
    @endforeach
</body>
</html>