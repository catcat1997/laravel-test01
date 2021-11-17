<!-- <link rel="stylesheet" type="text/css" href="/index.php">
<link rel="stylesheet" type="text/css" href="/robots.txt">
<link rel="stylesheet" type="text/css" href="{{asset('/index.php')}}"> -->
<a href="/index.php"></a>
<a href="/robots.txt"></a>
<a href="{{asset('/index.php')}}"></a>
@extends('template.template')

@section('title', 'Page Title')

@section('sidebar')
@parent
    <p>parent content</p>
    <!-- sidebar 片段利用 parent 指令向佈局的 sidebar 追加（而非覆蓋）內容。 
        在渲染視圖時，parent 指令將被佈局中的內容替換。 -->
@endsection

@section('content')
    <p>This is last content.</p>
    
@endsection


<!-- 文件的包含 include -->
@include('template.template')
