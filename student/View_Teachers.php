<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM teacher_tbl WHERE teacher_id=$id");
	if($del_sql)
		$msg="";
	else
		$msg="".mysql_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>مدرسة</title>
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">عرض الاساتذة</td>
        <td><input type="text" name="searchtxt" title="ادخل الاسم للبحث " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="بحث" id="button-search" title="بحث استاذ" /></td>
    </tr>
</table>
</form>
</div><!--end of style_div -->
<br />

<div id="content-input">
	 <table border="1" width="800px" align="center" cellpadding="3" class="mytable" cellspacing="0" dir="rtl">
        <tr>
            <th>م</th>
            <th>الاسم</th>
            <th>الجنس</th>
            <th>تاريخ الميلاد</th>
            <th>الدرجة العلمية</th>
            <th>المرتب</th>
            <th>الهاتف</th>
            <th>البريد الالكرتوني</th>
            <th>ملاحظات</th>
        </tr>
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM teacher_tbl WHERE f_name  like '%$key%' or l_name like '%$key%'");
	else
        $sql_sel=mysql_query("SELECT * FROM teacher_tbl");
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['f_name']."    ".$row['l_name'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['degree'];?></td>
            <td><?php echo $row['salary'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['note'];?></td>
        </tr>
    <?php	
    }
    ?>
    </table>
</div><!-- end of content-input -->
</body>
</html>