<?php

   
    function delete($tusername,$order,$usr,$pw){
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
        $sqld="DELETE FROM users WHERE username=:susername";
        $stmtd = $dbh->prepare($sqld);
        $stmtd->bindParam(':susername', $tusername);
        $stmtd->execute();
        $del="Successfully deleted";
        return $del;
        }
    else{
        $del="You don't have required permission";
        return $del;
       
    }
}

?>