<?php
require "db.php";
// import $connect
// import $mysession
// import $randomuser

function _viewport($num){echo "<meta name='viewport' content='width=device-width, initial-scale=$num' />";}
function _innerjs($str){echo "<script>alert('$str');</script>";}
function _http_res($sec,$page){echo "<meta http-equiv='refresh' content='$sec;url=$page'>";};

_viewport(1.0);

if (isset($_POST["submit"])){

  $image_name = $_FILES["picture"]["name"];
  $image_size = $_FILES["picture"]["size"];
  $img_tmp = $_FILES["picture"]["tmp_name"];
  $image_path = $_FILES["picture"]["path_name"];
  $image_error = $_FILES["picture"]["error"];
  
  $allowedimage = array("jpg","png","jpeg");
  
  $expimage = explode(".",$image_name);
  $myimageex = strtolower(end($expimage));
  $myfinalimage = uniqid(false,"").".".$myimageex;
  
  if ($image_error === 0) {
    if (in_array($myimageex, $allowedimage)) {
       if ($image_size < 500000000) {
         if (!empty($image_name)) {
           $filedistination = "img/".$myfinalimage;
           move_uploaded_file($img_tmp, $filedistination);
           _http_res(0,"index.php");
           $insertimage = "insert into users (username,myid,myimages,likes) values ('$randomuser','$mysession','$myfinalimage','')";
           mysqli_query($connect,$insertimage);
         } else {_innerjs("No file was selected");_http_res(0,"index");}
       } else {_innerjs("Image size is big");_http_res(0,"index");}
    } else {_innerjs("This extension is not allowed");_http_res(0,"index");}
  } else {_innerjs("Sorry something went wrong");_http_res(0,"index.php");}
  
}
