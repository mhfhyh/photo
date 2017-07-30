<html> 
<head>
<title> photo1 </title>
<meta charset="UTF-8">
    <link href="{{  URL::asset('css/st1.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>
    
<h3>إضافة صورة</h3>
<br> 

    <div id="right">
        {{--<a href="photo/{{$item->id}}" target="_blank"><img src={{$item->url}} Width="170px" height="302px" border="4"/> </a>--}}
    </div>

    <div id="left">    
<form action='{{route('add_photo')}}' method="post">
    {{csrf_field()}}
<div id="right2">
: اسم للصورة<br><br>
: رابط للصورة<br><br>
: مكان التصوير<br><br>
: تاريخ الصورة<br><br>
: إضافة وصف<br><br></div>
    <div id="left2">
        <input type="text"  name="name"><br><br>
        <input type="text"  name="url"><br><br>


        <input type="text"   name="place"><br><br>

        <input id="date" type="date" value="{{date("Y/m/d")}}" name="date"><br><br>
        <textarea name="description" rows="10" cols="30"> </textarea><br><br>
        <div id="left3">
<input type="submit" value="حفظ"></div></div>
</form><br>
</div>  
</body>
</html>

