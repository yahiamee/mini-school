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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>نظام ادارة مدرسة</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>

<style>
.btn-group button {
  background-color: #1a8cff; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 100px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: center; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #0000ff;
}
</style>
<body>
<center>
<style>
h1 {
  text-shadow: 5px 3px blue;
}
</style>
</head>
<body>

<h1><b>نظام ادارة مدرسة</b></h1>

<div class="btn-group">
  <button>دخول الإدارة</button>
  <button>دخول الأساتذة</button>
  <button>دخول ولي الأمر</button>
</div>

</center>
	<form method="post">
						

    	<fieldset>
        	<fieldset></fieldset>
            	<div id="login_back">
        			<div id="msg">
                    
        			</div>
                    <center>
					
                    <div id="login_form">
                    	<input type="text" class="fields" name="unametxt" title="ادخل اسم المستخدم"  placeholder="username" required />
                        <div class="clear"></div>
                        <input type="password" class="fields" name="pwdtxt"  title="ادخل كلمة المرور"  autocomplete="off" placeholder="password" required />
                        <div class="clear"></div>
                        
                      <p></p>
						
                        <input type="submit" class="button" name="btn_log" value="دخول" />	
                    </center>
                    </div>
        		</div>
    	</fieldset>
    </form>
	<style>
	linear-gradient(110deg, #fdcd3b 60%, #ffed4b 60%);
	</style>
	<h2 class="linear-gradient" align="center">
	<?php echo $msg; ?>
	</h2>
</body>
</html>