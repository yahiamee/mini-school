<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM stu_score_tbl WHERE ss_id=$id");
	if($del_sql)
		$msg="";
	else
		$msg="".mysql_error();	
			
}
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
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">عرض النتائج</td>
        <td><input type="text" name="searchtxt" title="ادخل الاسم للبحث " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="بحث" id="button-search" title="بحث نتيجة" /></td>
    </tr>
</table>
</form>
</div>
<br />

<div id="content-input">
	 <table border="1" width="770px" align="center" cellpadding="3" class="mytable" cellspacing="0" dir="rtl">
        <tr>
            <th>م</th>
            <th>كود الطالب </th>
            <th>كود الفصل</th>
            <th>كود المادة</th>
            <th>الامتحان الفصلي</th>
            <th>الامتحان النهائي</th>
            <th>ملاحظات</th>
        </tr>
        
        <?php
		$mm= $_SESSION['STUDENT_ADMIN_NAME'];
		$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM stu_score_tbl WHERE sub_id like '%$key%' and stu_id = '$mm' ");
	else
        $sql_sel=mysql_query("SELECT * FROM stu_score_tbl WHERE stu_id = '$mm'");
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['stu_id'];?></td>
            <td><?php echo $row['faculties_id'];?></td>
            <td><?php echo $row['sub_id'];?></td>
            <td><?php echo $row['miderm'];?></td>
            <td><?php echo $row['final'];?></td>
            <td><?php echo $row['note'];?></td>
        </tr>
        
    <?php
		
    }
    ?>
    </table>
</div>
</body>
</html>