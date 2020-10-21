<?php

function login($vusername,$vpassword){
    require'api/db_connect.php';

    
    $lsql="SELECT * FROM users WHERE username=:tusername";
    $lstmt = $dbh->prepare($lsql);
    $lstmt->bindParam(':tusername', $vusername);
    $lstmt->execute();
    $lresult = $lstmt->fetch();
    $mrole=$lresult['role'];
   
    
    if($vusername==$lresult['username'] and $vpassword==$lresult['password']){
        // returning a array() and role to check the role of logged user
        $log=array('1',$mrole);
        return $log;
    }
    else{
        $log=array('0');
        return $log;
    }
    
    }

    


?>