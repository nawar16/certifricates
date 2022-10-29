<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
 <style>


 * { font-family: "DejaVu Sans"; direction: rtl; text-align: right;}
.img-container{
  position: relative;
  text-align: center;
 
}

</style>
</head>
<body>


<div class="img-container">
<img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/66.jpg'))) }}"
 style="width:100%;height:100%"  />

  <h1 class="text-center" style="position: absolute!important;
  top: 27%;
  left: 35%;
  transform: translate(-50%, -50%);
  font-weight:inherit;
  color:#535f69;
  font-size:40px
  ">{{$type}} Doctorate</h1>
  <span class="text-center" style="position: absolute!important;
  top: 37.5%;
  left: 33%;
  transform: translate(-50%, -50%);
  font-weight:inherit;
  font-size:20px;
  color:#535f69
  ">{{now()->toDateString()}}</span>

<h1 class="text-center" style="position: absolute!important;
  top: 45%;
  left: 35%;
  transform: translate(-50%, -50%);
  font-weight:inherit;
  color:#535f69;
  font-size:40px
  ">{{$fname}} {{$lname}}</h1>

<h2 class="text-center" style="position: absolute!important;
  top: 57%;
  left: 35%;
  transform: translate(-50%, -50%);
  font-weight:inherit;
  color:#535f69
  ">"   {{$degree}}  "</h2>
    <h2 class="text-center" style="position: absolute!important;
  top: 64%;
  left: 35%;
  transform: translate(-50%, -50%);
  font-weight:inherit;
  color:#535f69
  ">{{$field}}</h2>


</div>
   
          

</body>
</html>

     
