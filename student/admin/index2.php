<!DOCTYPE html>
<?php
	session_start();
	
	require("conection/connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="مرحبا..";	
					else
						header("location: everyone.php");
					
			}
			
			else
					$msg="اسم المستخدم او كلمة المرور خطأ";
}

?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>مدرسة</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

</head>
<body>

<p></p>
<p></p><p></p><p></p><p></p>


  <body>
<div class="container">
	<section id="content">
		<form action="" method="post" dir="rtl">
			<h1>دخول الاساتذة</h1>
			<div>
				<input type="text" placeholder="اسم المستخدم" required="" id="username" name="unametxt" />
			</div>
			<div>
				<input type="password" placeholder="كلمة المرور" required="" id="password" name="pwdtxt" />
			</div>
			<div>
				<input type="submit" name="btn_log" value="دخـــول" />
				<a href="#"></a>
				<a href="#"></a>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="index.php">الادارة</a>
			<a href="tech/index2.php">الاساتذة</a>
			<a href="gra/index3.php">أولياء الإمور</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
  



    <script  src="js/index.js"></script>




</body>

</html>
