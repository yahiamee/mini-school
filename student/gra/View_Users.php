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
	$del_sql=mysql_query("DELETE FROM users_tbl WHERE u_id=$id");
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
<title>::. مدرسة .::</title>
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">عرض المستخدمين</td>
        <td><a href="?tag=susers_entry"><input type="button" title="اضافة مستخدم جديد" name="butAdd" value="اضافة جديد" id="button-search" /></a></td>
        <td><input type="text" name="searchtxt" title="ادخل الاسم للبحث " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="بحث" id="button-search" title="Search Users" /></td>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
	<form method="post">
    <table border="1" width="780px" align="center" cellpadding="3" class="mytable" cellspacing="0" dir="rtl">
        <tr>
            <th>م</th>
            <th>اسم المستخدم</th>
            <th>كلمة المرور</th>
            <th>النوع</th>
            <th>ملاحظات</th>
            <th colspan="2">اجراء</th>
        </tr>
        
         <?php
		 
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM users_tbl WHERE username  like '%$key%' ");
	else
        $sql_sel=mysql_query("SELECT * FROM users_tbl");
		
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['type'];?></td>
            <td><?php echo $row['note'];?></td>
            <td align="center"><a href="?tag=susers_entry&opr=upd&rs_id=<?php echo $row['u_id'];?>" title="تعديل"><img src="picture/update.png" /></a></td>
            <td align="center"><a href="?tag=view_users&opr=del&rs_id=<?php echo $row['u_id'];?>" title="حذف"><img src="picture/delete.png" /></a></td>
        </tr>
    <?php	
    }
    ?>
     </table>
   </form>
</div><!-- end of content-input -->
</body>
</html>