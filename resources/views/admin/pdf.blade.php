<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.c">
<style>
.img-container{
  position: relative;
  text-align: center;
 
}

</style>
</head>
<body >


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

     
