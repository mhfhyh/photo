@extends('layouts.app')
@section('content')
<html>
<head>
    <title> MySnapchat </title>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
    <link href="css/main.css" type="text/css" rel="stylesheet">
</head>
<body>

<p><br><a href="https://snapchat.com/add/a_alfayz" target="_blank"><img src="https://e.top4top.net/p_555bhbbp1.png" title="MySnap" Width="200px" height="200px"/></a></p>
<h1>a_alfayz

    @if(auth()->check())
<br>
<a href="add"> إضافة صورة</a>
     @endif
</h1>

<h3>MySnapchat</h3>
<br><br>
@include('layouts.sidebar')

<div id="loc">
    <div id="text">تركيا - صيف 2016</div>
    <div id="arrw">
        <h2> <img src="https://a.top4top.net/p_562qdwxk1.png" Width="30px"/></h2>
    </div>

</div>
<h2>
    <div class="mypic">
        @php( $count=1)
        @foreach($photo as $item )

            <a href="photo/{{$item->id}}" target="_blank"><img src={{$item->url}} title="MySnap" Width="170px" height="302px" border="1"/></a>
             {{$item->user->name}}
            @if($count++%4==0)<br> @endif

        @endforeach

    </div>
    <br>
</h2>
<h5></h5>
<h4>
    <a href="https://www.youtube.com/user/aALFAYZ" target="_blank"><img src="https://c.top4top.net/p_556iis602.png" title="youtube" Width="55px" height="55px"/></a>
    <a href="https://twitter.com/a_Alfayz" target="_blank"><img src="https://b.top4top.net/p_556rl70h1.png" title="twitter" Width="55px" height="55px"/></a>
    <a href="https://www.instagram.com/a_alfayz" target="_blank"><img src="https://d.top4top.net/p_556shljd3.png" title="instagram" Width="55px" height="55px"/></a>
    <br>
</h4>
</body>
</html>
@endsection
