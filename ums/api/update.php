<?php
 function update($order,$tusername,$tpassword,$tname,$tage,$trole,$usr,$pw){
    require'api/db_connect.php';
    $sqla="SELECT * FROM users WHERE username=:fusername";
    $stmta = $dbh->prepare($sqla);
    $stmta->bindParam(':fusername', $tusername);
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
        $sqlu="UPDATE users SET username=:username , password=:password , name=:name , age=:age, role=:role WHERE username=:username";
        $stmtu = $dbh->prepare($sqlu);
        $stmtu->bindParam(':username', $tusername);
        $stmtu->bindParam(':password', $tpassword);
        $stmtu->bindParam(':name', $tname);
        $stmtu->bindParam(':age', $tage);
        $stmtu->bindParam(':role', $trole);
        $stmtu->execute();
      
        $up="Successfully updated";
        
        return $up; 
        
    }
    else{
       $up="You don't have required permission";
       return $up;
    }
 }
?>