<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];	

$sql_ins=mysql_query("INSERT INTO stu_tbl 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$gender',
							'$dob',
							'$pob',
							'$addr',
							'$phone',
							'$mail',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];	
	
	$sql_update=mysql_query("UPDATE stu_tbl SET 
								f_name='$f_name',
								l_name='$l_name' ,
								gender='$gender',
								dob='$dob',
								pob='$pob',
								address='$addr',
								phone='$phone',
								email='$mail',
								note='$note'
							WHERE
								stu_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_students");
	else
		$msg="Update Fail".mysql_error();
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />
<title>مدرسة</title>
</head>
<body>
<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM stu_tbl WHERE stu_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
        تحديث بيانات طالب </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_students"><input type="button" name="btn_view" title="عرض الطلاب" value="عودة" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

 
<div id="style_informations">
	<form method="post" dir="rtl">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
			 <tr>
            	<td>الهاتف</td>
            	<td>
                	<input type="text" name="phonetxt" id="textbox" value="<?php echo $rs_upd['phone'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>البريد الالكتروني</td>
                <td>
                	<input type="text" name="emailtxt"  id="textbox" value="<?php echo $rs_upd['email'];?> "/>
                </td>
            </tr>
            
            <tr>
            	<td>ملاحظات</td>
                <td>
                	<textarea name="notetxt" cols="22" rows="5" readonly ><?php echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
			
			  <tr>
                <td colspan="2">
                	<input type="reset" value="الغاء" id="button-in"/>
                	<input type="submit" name="btn_upd" value="تحديث" id="button-in"  />
                </td>
            </tr>
			
		</table>
   </div>
 
	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            <tr>
            	<td></td>
            	<td>
                	<input type="hidden" name="fnametxt" id="textbox" value="<?php echo $rs_upd['f_name'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>اسم ولي الامر</td>
            	<td>
                	<input type="text" name="lnametxt" id="textbox" value="<?php echo $rs_upd['l_name'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>الجنس</td>
                <td>
                	<input type="radio" name="gender" value="انثى" <?php if($rs_upd['gender']=="Male") echo "checked";?> />انثى
                    <input type="radio" name="gender" value="ذكر" <?php if($rs_upd['gender']=="Female") echo "checked";?>/>ذكر
                </td>
            </tr>
            
            <tr>
            	<td>تاريخ الميلاد</td>
                <td>
                	<select name="yy" >
                    	<option>السنة</option>
                    	
                        <?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
                       
                	</select>
                    -
                    <select name="mm">
                    	<option>الشهر</option>
						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                    </select>
                    -
                    <select name="dd">
                    	<option>اليوم</option>
						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
					</select>
                </td>
            </tr>
            
            <tr>
            	<td>مكان الميلاد:</td>
                <td>
                	<input type="text" name="pobtxt" id="textbox" value="<?php echo $rs_upd['pob'];?> "/>
                
                </td>
            </tr>
            <tr>
            	<td>العنوان</td>
            	<td>
                	<textarea name="addrtxt" cols="22" rows="3"> <?php echo $rs_upd['address'];?></textarea>
    			</td>
        	</tr>
            
          
			
			
			
			
			
			
			
           
    	</table>
  </div>
    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div id="top_style">
        <div id="top_style_text">
        اضافة طالب
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_students"><input type="button" name="btn_view" title="عرض الطلاب" value="عرض الطلاب" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post" dir="rtl">
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
        	
			
			
			
	    <tr>
	      <td>الهاتف</td>
	      <td><input type="text" name="phonetxt" id="textbox" /></td>
        </tr>
	    <tr>
	      <td>البريد</td>
	      <td><input type="text" name="emailtxt"  id="textbox" /></td>
        </tr>
	    <tr>
	      <td>ملاحظات:</td>
	      <td><textarea name="notetxt" cols="22" rows="5"></textarea></td>
        </tr>
			
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="الغاء" id="button-in"/>
                	<input type="submit" name="btn_sub" value="اضافة" id="button-in"  />
                </td>
            </tr>
	  </table>
    </div>
 
	<div>
	  <table border="0" cellpadding="4" cellspacing="0">
	  <tr>
            	<td>الاسم الاول</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox"/>
                </td>
            </tr>
            
            <tr>
            	<td>ولي الامر</td>
            	<td>
                	<input type="text" name="lnametxt" id="textbox"/>
                </td>
            </tr>
            
            <tr>
            	<td>الجنس</td>
                <td>
                	<input type="radio" name="gender" value="انثى" checked="checked" />انثى
                    <input type="radio" name="gender" value="ذكر"/>ذكر
                </td>
            </tr>
            
            <tr>
            	<td>تاريخ الميلاد</td>
                <td>
                	<select name="yy" >
                    	<option>السنة</option>
                        <?php
							
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
               	  </select>
                    -
                    <select name="mm">
                    	<option>الشهر</option>
						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                    </select>
                    -
                    <select name="dd">
                    	<option>اليوم</option>
						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
					</select>
              </td>
        </tr>
            
            <tr>
            	<td>مكان الميلاد</td>
                <td>
                	<input type="text" name="pobtxt" id="textbox"/>
                
                </td>
            </tr>
            <tr>
            	<td>العنوان</td>
            	<td>
                	<textarea name="addrtxt" cols="22" rows="3"></textarea>
    			</td>
        	</tr>
	  
	  
	  
	  
      </table>
      
	</div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>