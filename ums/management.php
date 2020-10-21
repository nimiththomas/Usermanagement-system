<?php
 function add($uid,$tusername,$tpassword,$tname,$tage,$trole){
             require'api/db_connect.php';
            $sqlu="UPDATE users SET username=:username , password=:password , name=:name , age=:age, role=:role WHERE userid=:userid";
            $stmtu = $dbh->prepare($sqlu);
            $stmtu->bindParam(':userid', $uid);
            $stmtu->bindParam(':username', $tusername);
            $stmtu->bindParam(':password', $tpassword);
            $stmtu->bindParam(':name', $tname);
            $stmtu->bindParam(':age', $tage);
            $stmtu->bindParam(':role', $trole);
            $stmtu->execute();
          
            $up="Successfully updated";
            return $up;
            }

$usr=$_REQUEST['manusername'];
$pw=$_REQUEST['manpassword'];
if(isset($_REQUEST['manuserid'])){
$uid=$_REQUEST['manuserid'];
$confirmdel=$_REQUEST['mandelete'];
}

$loggeduserrole=$_POST['loguser'];
$soption=$_POST['moption'];
require'api/db_connect.php';
 
//assigning order variable to check user role based privilages 
if($loggeduserrole=="User"){
    $order=1;
}
elseif($loggeduserrole=="Developer"){
    $order=2;
}

elseif($loggeduserrole=="HR"){
    $order=3;
}
else{
    $order=4;
}


//require 'api/create-user.php';
    $tusername= $_POST['musername'];
    $tpassword=$_POST['mpassword'];
    $tname=$_POST['mname'];
    $tage=$_POST['mage'];
    $trole=$_POST['mrole'];
    
    //checking option selected
    if($soption=='create'){
      require 'api/create-user.php';  
        if(is_numeric($tage)){   

       $ret=register($tusername,$tpassword,$tname,$tage,$trole);
       
      
       
        header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&ret='.$ret);
        
        }
        else{
        $error2='please enter a valid age';
        header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&error2='.$error2);
         }
}

    elseif($soption=='delete'){
        if($confirmdel=="yn"){
            echo("<center>");
             echo(' <form action="http://localhost/umsupd/management.php"  method="post">');
             echo"<input type=" ."'hidden'" . " name=" ."'manusername'" ." value=" ."'$usr'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'manpassword'" ." value=" ."'$pw'" . "/>"  ;
            
             echo"<input type=" ."'hidden'" . " name=" ."'manuserid'" ." value=" ."'$uid'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'loguser'" ." value=" ."'$loggeduserrole'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'moption'" ." value=" ."'$soption'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'musername'" ." value=" ."'$tusername'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'mname'" ." value=" ."'$tname'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'mage'" ." value=" ."'$tage'" . "/>"  ;
             echo"<input type=" ."'hidden'" . " name=" ."'mrole'" ." value=" ."'$trole'" . "/>"  ;
             
             echo("</br>");
             echo"<h3>Do you wish to permanently delete selected data</h3>";
             echo("</br>");
             echo('<button type="submit" name="mandelete" value="y">Yes</button>');
             echo("</br>");
             echo("</br>");
             echo('<button type="submit" name="mandelete" value="n">No</button>');
             echo("</form>");
             echo("</center>");
        }
        elseif($confirmdel=="n"){
              $del="You Selected No";
           
            header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&ret='.$del);   
        }
       else{
         $sqla="SELECT * FROM users WHERE userid=:userid";
        $stmta = $dbh->prepare($sqla);
        $stmta->bindParam(':userid', $uid);
         $stmta->execute();
        $resulta = $stmta->fetch();
        if($resulta['role']=="User"){
        $edorder=1;
        }
         elseif($resulta['role']=="Developer"){
        $edorder=2;
        }   
    
        elseif($resulta['role']=="HR"){
        $edorder=3;
        }
        else{
        $edorder=4;
        }
   
   
    
        if($order >=$edorder){
            $sqld="DELETE FROM users WHERE username=:susername";
            $stmtd = $dbh->prepare($sqld);
            $stmtd->bindParam(':susername', $tusername);
            $stmtd->execute();
            $del="Successfully deleted";
            
            }
        else{
            $del="You don't have required permission";
           
           
        }
        
        
        header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&ret='.$del);
    }
          
}

    elseif($soption=='update'){
        if(is_numeric($tage)){   
        //require'api/update.php';
       // $ret=update($order,$tusername,$tpassword,$tname,$tage,$trole,$usr,$pw);
         $sqla="SELECT * FROM users WHERE userid=:userid";
        $stmta = $dbh->prepare($sqla);
        $stmta->bindParam(':userid', $uid);
        $stmta->execute();
        $resulta = $stmta->fetch();
        if($resulta['role']=="User"){
        $edorder=1;
        }
        elseif($resulta['role']=="Developer"){
        $edorder=2;
        }
    
        elseif($resulta['role']=="HR"){
        $edorder=3;
        }
        else{
        $edorder=4;
        }
       
       
        
        if($order >=$edorder){
            $sql="SELECT * FROM users WHERE username=:username";
  
            $stmt = $dbh->prepare($sql);
   
            $stmt->bindParam(':username', $tusername);
            $stmt->execute();
            $result = $stmt->fetch();
            
            if (isset($result['username'])) {
             if($result['username']!=$resulta['username']){
                   $up="username already taken";
             }
    
            else{
                $up=add($uid,$tusername,$tpassword,$tname,$tage,$trole);
            }
            
            }
            
            else{
              $up=add($uid,$tusername,$tpassword,$tname,$tage,$trole);
            
            }
            
        }
        else{
           $up="You don't have required permission";
           
        }
       
        header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&ret='.$up);
        }
        else{
        $error2='please enter a valid age';
        header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&error2='.$error2);
        }
        
}


    
    else
    {   $error2='please select a option';
        header('Location:http://localhost/umsupd/manage.php?'.'manusername='.$usr.'&'.'manpassword='.$pw.'&error2='.$error2);
}



?>