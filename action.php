<?php
require "db.php";
// import $connect
// import $mysession
// import $randomuser

function _viewport($num){echo "<meta name='viewport' content='width=device-width, initial-scale=$num' />";}
function _innerjs($str){echo "<script>alert('$str');</script>";}
function _http_res($sec,$page){echo "<meta http-equiv='refresh' content='$sec;url=$page'>";};


$sqls = "select username, myid from users";
$sqlq = mysqli_query($connect, $sqls);
$sqlr = mysqli_num_rows($sqlq);

if ($sqlr > 0) {
  while ($sqlfetch = mysqli_fetch_assoc($sqlq)) {
     $f = $sqlfetch["username"];
     $id = $sqlfetch["myid"];
     if (isset($_POST["$f"])) {
       $sendl = "UPDATE users SET likes = 'true' WHERE username = '$f'";
       mysqli_query($connect, $sendl);
       
       _http_res(0,"index.php");
     }
     
  }
}



if (isset($_POST["comm"])) {
  $comment = $_POST["comment"];
  
  if (!empty($comment)) {
    if (str_word_count($comment) !== 1500) {
        $subcomms = "insert into comments (username,userid,comment) values ('$mysession','$randomuser','$comment')";
        mysqli_query($connect, $subcomms);
        _http_res(0.0,"index.php");
    } else {_innerjs("Comment too long");_http_res(0.0,"index.php");}
  } else {_innerjs("Your input is empty, cant submit");_http_res(0.0,"index.php");}
  
}

