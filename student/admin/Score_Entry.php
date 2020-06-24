<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$stu_name=$_POST['sudenttxt'];
	$fa_name=$_POST['factxt'];
	$sub_name=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO stu_score_tbl 
						VALUES(
							NULL,
							'$stu_name',
							'$fa_name' ,
							'$sub_name',
							'$miderm',
							'$final',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="";
else
	$msg="".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$stu_id=$_POST['sudenttxt'];
	$faculties_id =$_POST['factxt'];
	$sub_id=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE stu_score_tbl SET
							stu_id='$stu_id' ,
							faculties_id='$faculties_id' ,
							sub_id='$sub_id' ,
							miderm='$miderm' ,	
							final='$final' ,
							note='$note' 
						WHERE ss_id=$id

					");
					
if($sql_update==true)
	header("location:?tag=view_scores");
else
	$msg="";
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. مدرسة .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM stu_score_tbl WHERE ss_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>

	<div id="top_style">
        <div id="top_style_text">
      		تحديث النتائج
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_scores"><input type="button" name="btn_view" value="عودة" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0" dir="rtl">
        	<tr>
            	<td>اسم الطالب</td>
            	<td>
                	<select name="sudenttxt" id="textbox">
                    	<option>---- اضغط للاختيار -----</option>
                            <?php
                          		$student_name=mysql_query("SELECT * FROM stu_tbl");
								while($row=mysql_fetch_array($student_name)){
									 if($row['stu_id']==$rs_upd['stu_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['stu_id'];?>" <?php echo $iselect ;?> > <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>اسم الفصل</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- اختر الفصل   ------</option>
                            <?php
                               $fac_name=mysql_query("SELECT * FROM facuties_tbl");
							   while($row=mysql_fetch_array($fac_name)){
								    if($row['faculties_id']==$rs_upd['faculties_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['faculties_id'];?>" <?php echo $iselect ;?> > <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>اسم المادة</td>
            	<td>
                	<select name="subjecttxt" id="textbox">
                    	<option>------------ اختر المادة -----------</option>
                            <?php
                               $subject=mysql_query("SELECT * FROM sub_tbl");
							   while($row=mysql_fetch_array($subject)){
								   if($row['sub_id']==$rs_upd['sub_id'])
								   		$iselect="selected";
									else
										$iselect="";
							?>
                            <option value="<?php echo $row['sub_id'];?>" <?php echo $iselect ;?> > <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>امتحان فصلي</td>
            	<td>
                	<input type="text" name="midermtxt" id="textbox" value="<?php echo $rs_upd['miderm'];?> "/>
                </td>
            </tr>
            
            <tr>
            	<td>امتحان نهائي</td>
                <td>
                	<input type="text" name="finaltxt"  id="textbox" value="<?php echo $rs_upd['final'];?>" />
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
                	<input type="submit" name="btn_upd" value="تعديل" id="button-in" title="تعديل"  />
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
      		اضافة نتيجة
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_scores"><input type="button" name="btn_view" value="عرض النتائج" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0" dir="rtl">
        	<tr>
            	<td>اسم الطالب</td>
            	<td>
                	<select name="sudenttxt" id="textbox">
                    	<option>---- اختر الطالب -----</option>
                            <?php
                          		$student_name=mysql_query("SELECT * FROM stu_tbl");
								while($row=mysql_fetch_array($student_name)){
								?>
                                <option value="<?php echo $row['s_id'];?>"> <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>اسم الفصل</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>----اختر الفصل   ------</option>
                            <?php
                               $fac_name=mysql_query("SELECT * FROM facuties_tbl");
							   while($row=mysql_fetch_array($fac_name)){
								?>
                        		<option value="<?php echo $row['faculties_id'];?>"> <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>المادة</td>
            	<td>
                	<select name="subjecttxt" id="textbox">
                    	<option>------------ اختر المادة -----------</option>
                            <?php
                               $subject=mysql_query("SELECT * FROM sub_tbl");
							   while($row=mysql_fetch_array($subject)){
							?>
                            <option value="<?php echo $row['sub_id'];?>"> <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>امتحان فصلي</td>
            	<td>
                	<input type="text" name="midermtxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>امتحان نهائي</td>
                <td>
                	<input type="text" name="finaltxt"  id="textbox" />
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
		</table>

   </div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>