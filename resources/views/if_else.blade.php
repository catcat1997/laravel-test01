<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    今天是星期
    @if($day == '1')
    一
    @elseif($day == '2')
    二
    @elseif($day == '3')
    三
    @elseif($day == '4')
    四
    @elseif($day == '5')
    五
    @elseif($day == '6')
    六
    @else
    日
    @endif
</body>
</html>