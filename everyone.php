<?php
	session_start();
	
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مدرسة</title>
<link rel="stylesheet" type="text/css" href="css/everyone_format.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>

<body>

   <div id="top">
      <div><h3> &nbsp;&nbsp;&nbsp;نظام ادارة مدرسة </h3><b></b>
            
      </div>
</div>
<br /><br />
<div id="admin">
	
        <div id="lmain">
                <a href="#" title="logo" ><img src="picture/logo.png" /></a>
                <div id="leftmanu">
                	<div >
                        <a href="?tag=home" title="HOME (Shift+Ctrl+H)">الرئيسية</a><br />
                	</div>
                    
                   <?php /*?> 
                    <?php 
						$sql_menu=mysql_query("SELECT * FROM  article_tbl WHERE loca_id=1");
						while($row=mysql_fetch_array($sql_menu)){
						?>
						 <div><a href="?tag=view&v_id=<?php echo $row['a_id'];?>"><?php echo $row['title'];?></a></div>
						<?php	
							}
						?>  <?php */?>
                    <b align="center">
                    
                 <div>
                    	<a href="everyone.php?tag=student_entry" title="Shift+1"> &nbsp;الطلاب </a><br />
                    </div>
                    
                    <div>
                    	<a href="everyone.php?tag=teachers_entry" class="customer" title="Shift+2">&nbsp;الاساتذة</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=faculties_entry" class="customer" title="Shift+3">&nbsp;الفصول</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=subject_entry" class="customer" title="Shift+4">&nbsp;المواد</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=score_entry" class="customer" title="Shift+5">&nbsp;النتائج</a>
                    </div>
                    
					
                     <div>
                    	<a href=".\index.php" class="customer" title="Shift+6">&nbsp;خروج</a>
                    </div> 
					                   
                     </b>
                    
                </div><!-- end of leftmanu -->
        </div><!--end of lmaim -->
        
        <div>
        
        
        </div>
    <div id="rmain">
    	<div id="pic_manu">
    		<a href="#" title="الطلاب"><img src="picture/student.png" hspace="10px" /></a>
            <a href="#" title="الاساتذة"><img src="picture/teacher.png" hspace="20px" /></a>
            <a href="#" title="الفصول"><img src="picture/faculties.png" hspace="15px" /></a>
            <a href="#" title="المواد"><img src="picture/subject.png" hspace="10px" /></a>
            <a href="#" title="النتائج"><img src="picture/score.png" hspace="20px" /></a>
            <a href="#" title="المستخدمين"><img src="picture/user.png" hspace="10px" /></a>
            <a href="#" title="عن المدرسة"><img src="picture/location.png" hspace="10px" /></a>
			 <a href="#" title="اتصل لنا"><img src="picture/contact.png" hspace="10px" /></a>
            <a href="#" title="المطورين"><img src="picture/article.png" hspace="10px" /></a>
			           

            <a href="#" title="خروج"><img src="picture/about us.png" hspace="15px" /></a>
         </div><!--end of pic_manu -->
        
        
        
        
         <div id="menu2">
                
                <div style="width:4px; height:37px; padding:0px; margin:0px; float:left;"></div>
                
                <li id="li_menu"><a href="">الطلاب</a>
                
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="everyone.php?tag=student_entry" class="sales">اضافة طالب</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_students" class="stocks">عرض الطلاب</a></li>
               
                    </ul>
                
                
                </li>
                <li id="li_menu"><a href="#">الاساتذة</a>
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="everyone.php?tag=teachers_entry" class="order">اضافة استاذ</a></li>
                       <li id="li_submenu"><a href="everyone.php?tag=view_teachers" class="stocks">عرض الاساتذة</a></li> 
                    </ul>
                
                </li>
                <li id="li_menu"><a href="">الفصول</a>
                
                    
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=faculties_entry" class=" order">اضافة فصل</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_faculties" class="customer">عرض الفصول</a></li>
                    </ul>
                
                
                </li>
                <li id="li_menu"><a href="#">المواد</a>
                
                    
                    <ul>
                    	<li id="li_submenu"><a href="everyone.php?tag=subject_entry" class=" customer">اضافة مادة</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_subjects" class=" customer">عرض المواد</a></li>
                    </ul>
                
                
                </li>
           <li id="li_menu"><a href="">النتائج</a>
                
                    
                    <ul>
                        
                        <li id="li_submenu"><a href="everyone.php?tag=score_entry" class="customer"> اضافة نتيجة</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_scores" class="order">عرض النتائج</a></li>
                    </ul>
                
                
                </li>
                
                <li id="li_menu" style="border-right:#CCC"><a href="">المستخدمين</a>
                
                    
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=susers_entry" class="customer">اضافة مستخدم</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_users" class="sales">عرض المستخدمين</a></li>
                     
                    </ul>
                    
                </li>
               
                <li id="li_menu"><a href="">عن المدرسة</a>
                
                    
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=about" class="stocks">عن المدرسة</a></li>
                       
                    </ul>
                
                
                </li>
                <li id="li_menu"><a href="">اتصل بنا</a>
                
                	<ul>
                    	 <li id="li_submenu"><a href="everyone.php?tag=contact" class="customer">اتصل بنا</a></li>
                
                	</ul>
                </li>
                   
 <li id="li_menu"><a href="">المطورين</a>
                
                   
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=location_entry" class="stocks">المطورين</a></li>
                    </ul>
                
                
                </li>
                <li id="li_menu"><a href="">خروج</a>
                
                    
                    <ul>
                        <li id="li_submenu"><a href="index.php" class=" sales">خروج</a></li>
                    </ul>
                
                
                </li>				   
      </div><!--end of menu2--> 
            
            
            <div id="contents">
            
            	<div id="informations">
                	<div id="in_informations">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="student_entry")
                            include("Students_Entry.php");
                        elseif($tag=="teachers_entry")
                            include("Teachers_Entry.php");
                        elseif($tag=="score_entry")
                            include("Score_Entry.php");	
                        elseif($tag=="subject_entry")
                            include("Subject_Entry.php");
                        elseif($tag=="faculties_entry")
                            include("Faculties_Entry.php");
                        elseif($tag=="susers_entry")
                            include("Users_Entry.php");	
                        elseif($tag=="view_students")
                            include("View_Students.php");
						elseif($tag=="view_teachers")
							include("View_Teachers.php");
						elseif($tag=="view_subjects")
							include("View_Subjects.php");
						elseif($tag=="view_scores")
							include("View_Scores.php");
						elseif($tag=="view_users")
							include("View_Users.php");
						elseif($tag=="view_faculties")
							include("View_Faculties.php");
						elseif($tag=="location_entry")
							include("Location_Entry.php");
						elseif($tag=="contact")
							include("Artical_Entry.php");
						elseif($tag=="test_score")
							include("test_Scores .php");
						elseif($tag=="view_location")
							include("View_location.php");
						elseif($tag="view_artical")
							include("View_Articaly.php");
						elseif($tag="about")
							include("iew_Articaly.php");
							/*$tag= $_REQUEST['tag'];
							
							if(empty($tag)){
								include ("Students_Entry.php");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div><!--end of in_informations -->
                </div><!--end of informations -->
    		</div><!--end of contens -->   
     </div><!--end of rmain -->
    	
    </div><!--end of admin -->

</body>
</html>