<?php

	$msg="";
	$opr="";
	$id="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['genderrdo'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$degree=$_POST['degree'];
	$salary=$_POST['slarytxt'];
	$married=$_POST['marriedrdo'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];	
	
$sql_ins=mysql_query("INSERT INTO teacher_tbl 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$gender',
							'$dob',
							'$pob',
							'$addr',
							'$degree',
							'$salary' ,
							'$married',
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
	$gender=$_POST['genderrdo'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$degree=$_POST['degree'];
	$salary=$_POST['slarytxt'];
	$married=$_POST['marriedrdo'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];

	$sql_update=mysql_query("UPDATE teacher_tbl SET
							f_name='$f_name' ,
							l_name='$l_name' ,
							gender='$gender' ,
							dob='$dob' ,
							pob='$pob' ,
							address='$addr' ,
							degree='$degree' ,
							salary='$salary' ,
							married='$married' ,
							phone='$phone' ,
							email='$mail' ,
							note='$note'
						WHERE teacher_id=$id
	
	");
if($sql_update==true)
	header("location:?tag=view_teachers");
else
	$msg="Update Fail!...";

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
<title>مدرسة</title>
</head>

<body>

<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM teacher_tbl WHERE teacher_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<div id="top_style">
        <div id="top_style_text">
        تحديث بيانات الاساتذة</div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_teachers"><input type="button" name="btn_back" value="عودة" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<!-- for form Upadte-->


<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0" dir="rtl">
		
		     <tr> 
                    	<td>الدرجة العليمة</td>
                    <td>
                        <select name="degree" id="textbox" >
                            
                            <?php
                                $mm=array("بكلاريوس","ماجستير","دكتوراه");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										if($mon==$rs_upd['degree'])
											$iselect="selected";
										else
											$iselect="";
											
										echo"<option value='$mon' $iselect> $mon</option>";		
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                
            	<tr>
                	<td>المرتب</td>
                    <td>
                    	<input type="text" name="slarytxt" id="textbox" value="<?php echo $rs_upd['salary'];?>" />
                    </td>
                </tr>
                
            	<tr>
                	<td>الحالة الاجتماعية</td>
                    <td>
                    	<input type="radio" name="marriedrdo" value=" متزوج"<?php if($rs_upd['married']=="متزوج") echo "checked";?>/>متزوج 
                        <input type="radio" name="marriedrdo" value="غير متزوج"<?php if($rs_upd['married']=="غير متزوج") echo "checked";?> />غير متزوج 
                    </td>
                </tr>
                
               <tr>
               		<td>الهاتف</td>
                    <td>
                    	<input type="text"  name="phonetxt" id="textbox" value="<?php echo $rs_upd['phone'];?>" />
                    </td>
               </tr>
               
               <tr>
               		<td>البريد</td>
                    <td>
                    	<input type="text" name="emailtxt" id="textbox" value="<?php echo $rs_upd['email'];?>" />
                    </td>
               </tr>
               
               <tr>
               		<td>ملاحظات</td>
                    <td>
                    	<textarea name="notetxt" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                    </td>
               </tr>
		
		
		
		 <tr>
            	<td colspan="2">
                	<input type="reset" value="الغاء" id="button-in"/>
                	<input type="submit" name="btn_upd" value="تحديث" id="button-in"  />
                </td>
            </tr>
		
		
		
            </table  >

   </div>
 
	<div>
    	<table border="0" cellpadding="5" cellspacing="0" dir="rtl">
               
               
            	<tr>
                	<td>الاسم الاول</td>
                    <td>
                    	<input type="text" name="fnametxt" id="textbox" value="<?php echo $rs_upd['f_name'];?>" />
                    </td>
            	</tr>
                
                <tr>
                	<td>الاسم الثاني</td>
                    <td>
                    	<input type="text" name="lnametxt" id="textbox"  value="<?php echo $rs_upd['f_name'];?>"/>
                    </td>
            	</tr>
                
                <tr>
                	<td>الجنس</td>
                    <td>
                    	<input type="radio" name="genderrdo" value="ذكر"<?php if($rs_upd['gender']=="ذكر") echo "checked";?>  />ذكر
                        <input type="radio" name="genderrdo" value="انثى"<?php if($rs_upd['gender']=="انثى") echo "checked";?> />انثى
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
							if($i==$d)
							$sel="selected='selected'";
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel ;?> >
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
                	<td>مكان الميلاد</td>
                    <td>
                    	<input type="text"  name="pobtxt" id="textbox" value=" <?php echo $rs_upd['pob']; ?>"/>
                    </td>
                </tr>
                
                <tr>
            	<td>العنوان</td>
            	<td>
                	<textarea name="addrtxt" cols="23" rows="3"><?php echo $rs_upd['address'];?></textarea>
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
<div id="top_style">
        <div id="top_style_text">
        اضافة استاذ
        </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_teachers"><input type="button" name="btn_view" title="عرض الاساتذة" value="عرض الاساتذة" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<!-- for form Upadte-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0" dir="rtl">
            	
				<tr> 
                    	<td>الدرجة العلمية</td>
                    <td>
                        <select name="degree" id="textbox">
                            <option>------------  اضغط للاختيار  ------------</option>
                            <?php
                                $mm=array("بكلاريوس","ماجستير","دكتوراه");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										echo"<option value='$mon'> $mon</option>";
                                    //echo"<option value='$i'> $mon</option>";		
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                
            	<tr>
                	<td>المرتب</td>
                    <td>
                    	<input type="text" name="slarytxt" id="textbox" />
                    </td>
                </tr>
                
            	<tr>
                	<td>الحالة الاجتماعية</td>
                    <td>
                    	<input type="radio" name="marriedrdo" value="متزوج"  checked="checked"/>متزوج
                        <input type="radio" name="marriedrdo" value="غير متزوج" />غير متزوج
                    </td>
                </tr>
                
               <tr>
               		<td>الهاتف</td>
                    <td>
                    	<input type="text"  name="phonetxt" id="textbox"/>
                    </td>
               </tr>
               
               <tr>
               		<td>البريد</td>
                    <td>
                    	<input type="text" name="emailtxt" id="textbox" />
                    </td>
               </tr>
               
               <tr>
               		<td>ملاحظات</td>
                    <td>
                    	<textarea name="notetxt" cols="23" rows="3"></textarea>
                    </td>
               </tr>
				
				  <tr>
            	<td colspan="2">
                	<input type="reset" value="الغاء" id="button-in"/>
                	<input type="submit" name="btn_sub" value="اضافة" id="button-in"  />
                </td>
            </tr>
		
				
            </table  >

   </div>
 
 
 
 
	<div>
    	<table border="0" cellpadding="5" cellspacing="0" dir="rtl">
		
		<tr>
                	<td>الاسم الاول</td>
                    <td>
                    	<input type="text" name="fnametxt" id="textbox" />
                    </td>
            	</tr>
                
                <tr>
                	<td>الاسم الثاني</td>
                    <td>
                    	<input type="text" name="lnametxt" id="textbox" />
                    </td>
            	</tr>
                
                <tr>
                	<td>الجنس</td>
                    <td>
                    	<input type="radio" name="genderrdo" value="ذكر" checked="checked"/>ذكر
                        <input type="radio" name="genderrdo" value="انثى" />انثى
                    </td>
                </tr>
                
                <td>تاريخ الميلاد</td>
                <td>
                	<select name="yy" style="height:25px;">
                    	<option>السنة</option>
                        <?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
                	</select>
                    -
                    <select name="mm" style="height:25px;">
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
                    <select name="dd" style="height:25px;">
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
                    	<input type="text"  name="pobtxt" id="textbox"/>
                    </td>
                </tr>
                
                <tr>
            	<td>العنوان</td>
            	<td>
                	<textarea name="addrtxt" cols="23" rows="3"></textarea>
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