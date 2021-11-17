<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 引入jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <input type="button" value="點我" id="btn">
    <p id="p"></p>
    <script>
        let px = document.querySelector('#p');
        // jQuery頁面載入事件
        $(function(){  // 載入事件 類似window.onload(){xxxx}
            // 綁定btn
            $('#btn').click(function(){
                // 發送ajax請求
                $.get('/home/test/ajax2',function(data){
                    console.log('hello');
                    console.log(data[0]);
                    console.log(data[1]);
                    // 渲染數據庫的數據到 HTML頁面(瀏覽器)  JSON轉string JSON.stringify()
                    px.innerHTML = JSON.stringify(data[0]);
                },'json');
            });
        })
    </script>
</body>
</html>