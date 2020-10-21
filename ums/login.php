<!DOCTYPE HTML>

<html lang="en">
<head>
    <title>LOGIN PAGE</title>
    
</head>
<body>
   <center><h1>LOGIN PAGE</h1></center>
   <br/>
   <br/>
   <br/>
   <br/>
   <center>
    <?php
     //to check error incase of bad login returned from manage.php
   if (isset($_REQUEST["error"])){
     $error=$_REQUEST['error'];
    echo "<h3 style="."'color:red;'>".$error."<h3>";
   }
     ?>
     </br>
    <form action="http://localhost/umsupd/manage.php" method="post">
        <br/>
        <a>Username </a>
        <input type="text" name="manusername" id="un" required/>
        <br/>
        <a>Password</a>
        <input type="password" name="manpassword" id="pw" required/>
        <br/>
        <input type="hidden" name="log" value="yes"/>
        <br/>
        <button type="submit" name='login'>Login</button>
       
    </form>
    </center>
    <center>
     <br/>
    
    <br/>
   <a href="http://localhost/umsupd/register.php" >Not a user? Then signup</a>
    <br/>
    <br/>
        
    <a href="http://localhost/umsupd/index.html">HOME</a>
    

   </center>
    
</body>
</html>
