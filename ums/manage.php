

<?php
//checking for valid login
require_once'api/verify-login.php';
require'api/db_connect.php';
/*
echo'<script>
function myFunction(userid,manusername,manpassword) {
    $seluserid=document.getElementById(userid).value;
    document.write($seluserid);
  
    $url="http://localhost/umsupd/manage.php?seluserid="+$seluserid+"&manusername="+manusername+"&manpassword="+manpassword;
    location.replace($url);
}
</script>';
*/
//$seluserid=$_REQUEST['seluserid'];
//echo($seluserid);
$manusername=$_REQUEST['manusername'];
$manpassword=$_REQUEST['manpassword'];
if(isset($manusername)){
  
$success=login($manusername,$manpassword);
}
//checking whether returned variable for successfull login

if($success[0]==1){
  
    require'api/retrieve-data.php';
    //retrieving table
    echo"<center><h1>User details</h1></center>";
      echo("</center>");
    echo("</br>");
    echo("<center>");
     if (isset($_REQUEST['ret'])){
     $error=$_REQUEST['ret'];
     echo "<h3 style="."'color:red;'>".$error."<h3>";
   }
    echo("</center>");
    
     echo("</br>");
    echo("<center>");
     if (isset($_REQUEST['error2'])){
     $error2=$_REQUEST['error2'];
     echo "<h3 style="."'color:red;'>".$error2."<h3>";
   }
    echo("</center>");
   retrieve($success,$manusername,$manpassword);
   
    if(isset($_REQUEST['select'])){
     $seluserid=$_REQUEST['select'];
     
     
   
    
    
   $sql6="SELECT * FROM users WHERE userid=:userid";
  
   $stmt6 = $dbh->prepare($sql6);
   
   $stmt6->bindParam(':userid', $seluserid);
   $stmt6->execute();

   $result6 = $stmt6->fetch();
   $kusername=$result6['username'];
   $kpassword=$result6['password'];
   $kname=$result6['name'];
   $kage=$result6['age'];
   $krole=$result6['role'];
    
   // creating a form to collect data
    echo("<center>");
    echo("<br>");
  echo("<table>");
    echo(' <form action="http://localhost/umsupd/management.php"  method="post">');
     
    
    echo("<tr>");
    echo("<td>");
    echo("Enter details");
    echo("</td>");
    echo("<td>");
    echo'<input type="text" name="musername" placeholder="enter username"' .'value='."'$kusername'"."/>";
    echo("</td>");
    echo("<td>");
     echo'<input type="text" name="mpassword" placeholder="enter username"' .'value='."'$kpassword'"."/>";
    echo("</td>");
    echo("<td>");
     echo'<input type="text" name="mname" placeholder="enter username"' .'value='."'$kname'".'/>';
    echo("</td>");
    echo("<td>");
     echo'<input type="text" name="mage" placeholder="enter username"' .'value='."'$kage'".'/>';
    echo("</td>");
    echo("<td>");
    echo'<select name="mrole">';
    echo('<option value="Admin">Admin</option>');
    echo('<option value="Developer">Developer</option>');
    echo('<option value="HR">HR</option>');
    echo('<option value="User">User</option>');
    echo("</select>");
    echo("</td>");
    echo("</tr>");
   
    echo("<tr>");
    echo("<td>");
    echo("Select a option");
    echo("</td>");
    echo("<td>");
    echo('<input type="radio"  name="moption" value="create">');
    echo('<label for="male">CREATE</label><br>');
    echo("</td>");
    echo("<td>");
    echo('<input type="radio"  name="moption" value="update">');
    echo('<label for="male">UPDATE</label><br>');
    echo("</td>");
    echo("<td>");
    echo('<input type="radio"  name="moption" value="delete">');
    echo('<label for="male">DELETE</label><br>');
    echo("</td>");
    echo("<td>");
    
    if($success[1]=="User"){
    echo('<input type="hidden" name="loguser" value="User"/>');
    }
    elseif($success[1]=="Admin"){
    echo('<input type="hidden" name="loguser" value="Admin"/>');   
    }
    elseif($success[1]=="Developer"){
    echo('<input type="hidden" name="loguser" value="Developer"/>');   
    }
    
    else{
    echo('<input type="hidden" name="loguser" value="HR"/>');   
    }
    
    
    $str1="<input type=" ."'hidden'" . " name=" ."'manusername'" ." value=" ."'$manusername'" . "/>"  ;
    echo($str1);
    $str2="<input type=" ."'hidden'" . " name=" ."'manpassword'" ." value=" ."'$manpassword'" . "/>"  ;
    echo($str2);
     $str8="<input type=" ."'hidden'" . " name=" ."'manuserid'" ." value=" ."'$seluserid'" . "/>"  ;
     $str10="<input type=" ."'hidden'" . " name=" ."'mandelete'" ." value=" ."'yn'" . "/>"  ;
       echo($str10);
    echo($str8);
   
    
    
    echo('<button type="submit" name="msubmit" >Submit</button>');
    
   
    echo("</td>"); 
    echo("</tr>");
    
    echo("</form>");
    echo("</table>");
    echo("</br>");
    echo("</br>");
    echo("<center>");
     echo('<a href="http://localhost/umsupd/index.html" >LOGOUT</a> ');
       echo("<center>");
    
    /*
    echo("</center>");
    echo("</br>");
    echo("<center>");
     if (isset($_REQUEST['ret'])){
     $error=$_REQUEST['ret'];
     echo"<h3>".$error."</h3>";
   }
    echo("</center>");
    
     echo("</br>");
    echo("<center>");
     if (isset($_REQUEST['error2'])){
     $error2=$_REQUEST['error2'];
     echo"<h3>".$error2."</h3>";
   }
    echo("</center>");
    
    */
    
    echo("<center>");
    echo("</br>");
    echo("</br>");
    echo("</br>");
    echo("NOTE");
    echo("</br>");
    echo("Users with role of User in ums cannot view admin information");
    echo("</br>");
    echo("The create option can be used to add users to the ums");
    echo("</br>");
    echo("The update option can be used to update user records its done based on the username.");
    echo("</br>");
    echo("The delete option can be used to delete user records its done based on the username.");
    echo("</br>");
    echo("A user with lesser role cannot update or delete information of users with higher role");
    echo("</br>");
    echo("Click the submit button after entering details and selecting option to perform the task");
    echo("</br>");
    echo("</br>");
    echo("</br>");
    echo("</br>");
   
    echo("</center>");
    
    }
    
    else{
     echo("<center>");
    echo("<br>");
  echo("<table>");
    echo(' <form action="http://localhost/umsupd/management.php"  method="post">');
     
    
    echo("<tr>");
    echo("<td>");
    echo("Enter details");
    echo("</td>");
    echo("<td>");
    echo'<input type="text" name="musername" placeholder="enter username" />';
    echo("</td>");
    echo("<td>");
    echo('<input type="password" name="mpassword" placeholder="enter password"/>');
    echo("</td>");
    echo("<td>");
    echo('<input type="text" name="mname" placeholder="enter name"/>');
    echo("</td>");
    echo("<td>");
    echo('<input type="text" name="mage" placeholder="enter age"/>');
    echo("</td>");
    echo("<td>");
    echo('<select name="mrole">');
    echo('<option value="Admin">Admin</option>');
    echo('<option value="Developer">Developer</option>');
    echo('<option value="HR">HR</option>');
    echo('<option value="User">User</option>');
    echo("</select>");
    echo("</td>");
    echo("</tr>");
   
    echo("<tr>");
    echo("<td>");
    echo("Select a option");
    echo("</td>");
    echo("<td>");
    echo('<input type="radio"  name="moption" value="create">');
    echo('<label for="male">CREATE</label><br>');
    echo("</td>");
    echo("<td>");
    echo('<input type="radio"  name="moption" value="update">');
    echo('<label for="male">UPDATE</label><br>');
    echo("</td>");
    echo("<td>");
    echo('<input type="radio"  name="moption" value="delete">');
    echo('<label for="male">DELETE</label><br>');
    echo("</td>");
    echo("<td>");
    
    if($success[1]=="User"){
    echo('<input type="hidden" name="loguser" value="User"/>');
    }
    elseif($success[1]=="Admin"){
    echo('<input type="hidden" name="loguser" value="Admin"/>');   
    }
    elseif($success[1]=="Developer"){
    echo('<input type="hidden" name="loguser" value="Developer"/>');   
    }
    
    else{
    echo('<input type="hidden" name="loguser" value="HR"/>');   
    }
    
    
    $str1="<input type=" ."'hidden'" . " name=" ."'manusername'" ." value=" ."'$manusername'" . "/>"  ;
    echo($str1);
    $str2="<input type=" ."'hidden'" . " name=" ."'manpassword'" ." value=" ."'$manpassword'" . "/>"  ;
    echo($str2);
     $str10="<input type=" ."'hidden'" . " name=" ."'mandelete'" ." value=" ."'yn'" . "/>"  ;
     
     echo($str10);
     if(isset($_REQUEST['select'])){
       $str8="<input type=" ."'hidden'" . " name=" ."'manuserid'" ." value=" ."'$seluserid'" . "/>"  ;
       echo($str8);
     }
     //$str8="<input type=" ."'hidden'" . " name=" ."'manuserid'" ." value=" ."'$seluserid'" . "/>"  ;
    //echo($str8);
   
    
    
    echo('<button type="submit" name="msubmit" >Submit</button>');
    
   
    echo("</td>"); 
    echo("</tr>");
    
    echo("</form>");
    echo("</table>");
    echo("</br>");
    echo("</br>");
    echo("<center>");
     echo('<a href="http://localhost/umsupd/index.html" >LOGOUT</a> ');
       echo("<center>");
    
    /*
    echo("</center>");
    echo("</br>");
    echo("<center>");
     if (isset($_REQUEST['ret'])){
     $error=$_REQUEST['ret'];
     echo"<h3>".$error."</h3>";
   }
    echo("</center>");
    
     echo("</br>");
    echo("<center>");
     if (isset($_REQUEST['error2'])){
     $error2=$_REQUEST['error2'];
     echo"<h3>".$error2."</h3>";
   }
    echo("</center>");
    */
    echo("<center>");
    echo("</br>");
    echo("</br>");
    echo("</br>");
    echo("NOTE");
    echo("</br>");
    echo("Users with role of User in ums cannot view admin information");
    echo("</br>");
    echo("The create option can be used to add users to the ums");
    echo("</br>");
    echo("The update option can be used to update user records its done based on the userid.");
    echo("</br>");
    echo("The delete option can be used to delete user records its done based on the userid.");
    echo("</br>");
    echo("A user with lesser role cannot update or delete information of users with higher role");
    echo("</br>");
    echo("Click the submit button after entering details and selecting option to perform the task");
    echo("</br>");
    echo("</br>");
    echo("</br>");
    echo("</br>");
   
    echo("</center>");
    
    }  
  }
    
    
   

else{
    //redirecting to login page incase of unsuccessfull login
     header('Location:http://localhost/umsupd/login.php?error=Invalid login');
   
    
    }




?>

