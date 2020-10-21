<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>REGISTERATION PAGE</title>
    
</head>
<body>
   <center><h1>REGISTER DETAILS</h1></center>
   <br/>
   <br/>
   <br/>
   <center>
   <?php
   
   //adding details to db  
    if (isset($_POST["rsubmit"])){
      require("api/create-user.php");
      $tusername= $_POST['rusername'];
      $tpassword=$_POST['rpassword'];
      $cpassword=$_POST['cpassword'];
      $tname=$_POST['rname'];
      $tage=$_POST['rage'];
      $trole=$_POST['rrole'];
      
     if($tpassword==$cpassword){
      if(is_numeric($tage)){
      
      $res=register($tusername,$tpassword,$tname,$tage,$trole);
      echo("</br>");
     
    
      echo("<center>");
       echo '<h3 style="color:red;">'.$res."<h3>";
      echo("</center>");
     
    
    
      }
      else{
         echo('<center>');
         echo("<h4 style='color:red;'>Please enter a valid age</h4>");
         echo('</center>');
      }
      
     }
     else{
      echo('<center>');
         echo" <h4 style='color:red;' >The password fields does not match</h4>";
         echo('</center>');
     }
   
      }
    
  
    ?>
      <table>
    <form action="http://localhost/umsupd/register.php"  method="post">
     
        <tr>
        <td><a>Username</a></td>
        <td><input type="text" name="rusername" required/></td>
        </tr>
     
        <tr>
        <td><a>Password</a></td>
        <td><input type="password" name="rpassword" required/></td>
         </tr>
      
        <tr>
        <td><a>Confirm Password</a></td>
        <td><input type="password" name="cpassword" required/></td>
         </tr>
      
        <tr>
        <td><a>Name</a></td>
        <td><input type="text" name="rname" required/></td>
         </tr>
     
        <tr>
        <td><a>Age</a></td>
        <td><input type="text" name="rage" required/></td>
         </tr>
      
        <tr>
        <td><a>Role</a></td>
        <td><select name="rrole">
            <option value="Admin">Admin</option>
            <option value="Developer">Developer</option>
            <option value="HR">HR</option>
            <option value="User">User</option>
        </select></td>
         </tr>
       
      </table>
       <br/>
       <br/>
       <button type="submit" name='rsubmit' >Submit</button></td>
        
    </form>
    
    <br/>
   
    <br/>
    <br/>
    <a href="http://localhost/umsupd/index.html" >HOME</a>
    
   </center>

</body>
</html>
