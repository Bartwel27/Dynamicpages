<?php require "db.php"; 
// import $connect
// import $mysession
// import $randomuser

$myid = $mysession;
$checks = "select * from users order by id desc";
$checkq = mysqli_query($connect, $checks);
$rows = mysqli_num_rows($checkq);



?>
<!DOCTYPE html>
<html lang="eng">
	<head>
		<title>DynamicPages</title>
		 <meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		 <meta name="theme-color" content="#222" />
		 
		 <link rel="stylesheet" href="css/" />
		 <link rel="stylesheet" href="css/" />
		  
	</head>
	<body>
	  <!--head-->
	   <div class="head">
	    <h1>DynamicPage</h1>
	    <a><button id="sign">Sign Up</button></a>
	   </div>
	   <!--<svg style="width:100%;max-width:400px;margin:0 auto;" viewBox="0 0 1440 320"><path fill="#222" fill-opacity="1" d="M0,64L24,90.7C48,117,96,171,144,186.7C192,203,240,181,288,181.3C336,181,384,203,432,224C480,245,528,267,576,240C624,213,672,139,720,112C768,85,816,107,864,101.3C912,96,960,64,1008,85.3C1056,107,1104,181,1152,197.3C1200,213,1248,171,1296,154.7C1344,139,1392,149,1416,154.7L1440,160L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>-->
	  <!--head-->
	  
		 <!--container-->
		 <div class="container">
		 		  
		   <!--displayer-->
		   <div class="displayer">
		    <br>
		     <?php
		     if ($rows > -1) {
		       while ($fetch = mysqli_fetch_assoc($checkq))	{
		       	         
		     ?>
		       <div class="img_cont">
		         <img src="img/<?php echo $fetch['myimages']; ?>">
		         <p><?php echo $fetch["username"]; ?></p>
		           <div class="links">
		            <a href="img/<?php echo $fetch['myimages']; ?>" download><svg width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4m4-5l5 5l5-5m-5 5V3"/></svg></a>
		            <a href="img/<?php echo $fetch['myimages']; ?>"><svg width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5"/><path d="M12 13a1 1 0 1 0 0-2a1 1 0 0 0 0 2m9 4v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></g></svg></a>
		            
		            <?php
		              // count likes
		              $l = $fetch["username"];
		              $sqllikes = "select likes from users where username = '$l' and likes = 'true'";
		              $sqllikesq = mysqli_query($connect, $sqllikes);
		              $sqllikesR = mysqli_num_rows($sqllikesq);
		              
		            ?>
		            
		            <!--<form action="action.php" method="post"><button name="<?php echo $fetch['username']; ?>"> <?php echo $sqllikesR; ?> <svg width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="m20.975 12.185l-.739-.128zm-.705 4.08l-.74-.128zM6.938 20.477l-.747.065zm-.812-9.393l.747-.064zm7.869-5.863l.74.122zm-.663 4.045l.74.121zm-6.634.411l-.49-.568zm1.439-1.24l.49.569zm2.381-3.653l-.726-.189zm.476-1.834l.726.188zm1.674-.886l-.23.714zm.145.047l.229-.714zM9.862 6.463l.662.353zm4.043-3.215l-.726.188zm-2.23-1.116l-.326-.675zM3.971 21.471l-.748.064zM3 10.234l.747-.064a.75.75 0 0 0-1.497.064zm17.236 1.823l-.705 4.08l1.478.256l.705-4.08zm-6.991 9.193H8.596v1.5h4.649zm-5.56-.837l-.812-9.393l-1.495.129l.813 9.393zm11.846-4.276c-.507 2.93-3.15 5.113-6.286 5.113v1.5c3.826 0 7.126-2.669 7.764-6.357zM13.255 5.1l-.663 4.045l1.48.242l.663-4.044zm-6.067 5.146l1.438-1.24l-.979-1.136L6.21 9.11zm4.056-5.274l.476-1.834l-1.452-.376l-.476 1.833zm1.194-2.194l.145.047l.459-1.428l-.145-.047zm-1.915 4.038a8.378 8.378 0 0 0 .721-1.844l-1.452-.377A6.878 6.878 0 0 1 9.2 6.11zm2.06-3.991a.885.885 0 0 1 .596.61l1.452-.376a2.385 2.385 0 0 0-1.589-1.662zm-.863.313a.515.515 0 0 1 .28-.33l-.651-1.351c-.532.256-.932.73-1.081 1.305zm.28-.33a.596.596 0 0 1 .438-.03l.459-1.428a2.096 2.096 0 0 0-1.548.107zm2.154 8.176h5.18v-1.5h-5.18zM4.719 21.406L3.747 10.17l-1.494.129l.971 11.236zm-.969.107V10.234h-1.5v11.279zm-.526.022a.263.263 0 0 1 .263-.285v1.5c.726 0 1.294-.622 1.232-1.344zM14.735 5.343a5.533 5.533 0 0 0-.104-2.284l-1.452.377a4.03 4.03 0 0 1 .076 1.664zM8.596 21.25a.916.916 0 0 1-.911-.837l-1.494.129a2.416 2.416 0 0 0 2.405 2.208zm.03-12.244c.68-.586 1.413-1.283 1.898-2.19L9.2 6.109c-.346.649-.897 1.196-1.553 1.76zm13.088 3.307a2.416 2.416 0 0 0-2.38-2.829v1.5c.567 0 1 .512.902 1.073zM3.487 21.25c.146 0 .263.118.263.263h-1.5c0 .682.553 1.237 1.237 1.237zm9.105-12.105a1.583 1.583 0 0 0 1.562 1.84v-1.5a.083.083 0 0 1-.082-.098zm-5.72 1.875a.918.918 0 0 1 .316-.774l-.98-1.137a2.418 2.418 0 0 0-.83 2.04z"/></svg></button></form>
		           -->
		           </div>
		       </div>
		     <?php
		      }
		     }
		     ?>
		     
		   </div>
		   <!--displayer-->
		  
		  <form id="form" action="upload.php" method="post" enctype="multipart/form-data">
		   <center><label for="inp">Select a Picture To Upload</label></center>
		   <input name="picture" type="file" id="inp" style="display:none;"/>
		   <button name="submit" id="sub"><svg width="25px" height="25px" viewBox="0 0 512 512"><path fill="white" d="M474.444 19.857a20.336 20.336 0 0 0-21.592-2.781L33.737 213.8v38.066l176.037 70.414L322.69 496h38.074l120.3-455.4a20.342 20.342 0 0 0-6.62-20.743M337.257 459.693L240.2 310.37l149.353-163.582l-23.631-21.576L215.4 290.069L70.257 232.012L443.7 56.72Z"/></svg></button>
		  </form>
		  
		  <!--comments-->
		  <div class="comments">
		    <h2>Comments</h2>
		    
		    <?php
		     $rcomms = "select * from comments order by id desc";
		     $rcommsq = mysqli_query($connect, $rcomms);
		     $rrows = mysqli_num_rows($rcommsq);
		     if ($rrows > -1) {
		     while ($fetchcomm = mysqli_fetch_assoc($rcommsq)) {
		  
		    ?>
		      <p id="comment">
		       <b id="name"><?php echo $fetchcomm["userid"]; ?></b><br>
		       <?php echo $fetchcomm["comment"]; ?>
		      </p>
		    <?php
		      }
		    }
		    ?>
		    
		    <form action="action.php" method="post">
		     <input name="comment" type="text" placeholder="comment..." autocomplete=off />
		     <button type="submit" name="comm"><svg width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M5 3h13a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-4.59l-3.7 3.71c-.18.18-.43.29-.71.29a1 1 0 0 1-1-1v-3H5a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3m13 1H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h4v4l4-4h5a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2M5 7h13v1H5zm0 3h12v1H5zm0 3h8v1H5z"/></svg></button>
		    </form>
		  </div>
		  <!--comments-->
		  
		 </div>
		 <!--container-->
	</body>
</html>
<?php ?>
<style>
body{width:100%;max-width:800px;margin:0 auto;font-family:sans-serif;}
body .head{width:100%;max-width:400px;height:60px;margin:0 auto;background:#222;display:flex;justify-content:space-between;position:sticky;top:0;}
body .head h1{margin:0;padding:0;color:white;font-weight:300;margin-left:10px;margin-top:16px;font-size:20px;}
body .head a button{margin-top:15px;padding:10px;margin-right:10px;background:none;color:white;border:01px solid white;padding:6px;border-radius:5px;}
.container{width:100%;max-width:800px;margin:0 auto;}
#form{width:100%;max-width:400px;margin:0 auto;position:fixed;bottom:0;background:#222;padding-top:20px;padding-bottom:20px;}
#form label{color:black;font-weight:light;text-decoration:underline;color:white;}
#form #sub{background:#222;border:0px;outline:none;width:60px;height:60px;position:fixed;bottom:70px;right:10px;border-radius:30px;}
.container .displayer{width:100%;max-width:300px;margin:0 auto;margin-bottom:150px;}
.container .displayer .img_cont{width:100%;max-width:300px;margin:0 auto;border:0px solid green;margin-bottom:20px}
.container .displayer .img_cont p{color:grey;font-size:7px;margin-left:20px;}
.container .displayer .img_cont img{width:150;height:150px;border-radius:20px;}
.container .displayer .links{width:130px;display:flex;justify-content:space-around;border:0px solid grey;}
.container .displayer .links form button{background:grey;width:px;border:0px;}
.container .comments{width:100%;max-width:300px;margin:0 auto;margin-bottom:200px;border:0px solid grey;}
.container .comments h2{font-weight:300;}
.container .comments form{width:100%;display:flex;justify-content:space-between;border-radius:10px;border:1px solid grey;margin-top:20px;}
.container .comments form input{width:250px;border:0px;outline:none;border-top-left-radius:10px;border-bottom-left-radius:10px;}
.container .comments form button{background:#222;border:0px;padding:10px;border-top-right-radius:9px;border-bottom-right-radius:9px;}
.container .comments #comment{border-left:2px solid grey;padding-left:20px;}
.container .comments #comment #name{font-size:10px;color:gray;}
</style>
<script src="run.js"></script>
		