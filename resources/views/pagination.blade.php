<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>pagination</title>
    <style>
        
    </style>
</head>
<body>
    <table style="border: 1px solid #ccc">
        <thead>
            <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>email</th>
            <th>avatar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->age}}</td>
                <td>{{$data->email}}</td>
                <td><img style="width: 100px" src="{{asset('/storage/images/' . $data->avatar)}}" alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $datas->links() }}
    
</body>
</html>