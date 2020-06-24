<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM sub_tbl WHERE sub_id=$id");
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
<title>مدرسة</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="200px" style="font-size:18px; color:#006; text-indent:30px;">عرض المواد</td>
        <td><input type="text" name="searchtxtz" title="ادخل الاسم للبحث " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="بحث" id="button-search" title="بحث مادة" /></td>
    </tr>
</table>
</form>
</div><!--end of style_div -->
<br />

<div id="content-input">
	<form method="post">
    <table border="1" width="805px" align="center" cellpadding="3" class="mytable" cellspacing="0" dir="rtl">
        <tr>
            <th>م</th>
            <th>رقم الفصل</th>
            <th>رقم الاستاذ</th>
            <th>المستوى</th>
             <th>اسم المادة</th>
            <th>ملاحظات</th>
      	</tr>
        
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM sub_tbl WHERE sub_name  like '%$key%' ");
	else
        $sql_sel=mysql_query("SELECT * FROM sub_tbl");
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['faculties_id'];?></td>
            <td><?php echo $row['teacher_id'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row['sub_name'];?></td>
            <td><?php echo $row['note'];?></td>
        </tr>
    <?php	
    }
    ?>
   	</table>
 	</form>
</div><!--end of content_input -->
</body>
</html>