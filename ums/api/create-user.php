<?php



function register($cusername,$cpassword,$cname,$cage,$crole){
   require'api/db_connect.php';
   

   $sql="SELECT * FROM users WHERE username=:username";
  
   $stmt = $dbh->prepare($sql);
   
   $stmt->bindParam(':username', $cusername);
   $stmt->execute();
  
  
 
   $result = $stmt->fetch();
   if (isset($result['username'])) {
   
    
    $res="Username already taken";
    return $res;
   }
   else{
    
     $sql2= "INSERT INTO users (username, password, name, age, role) VALUES (:username, :password, :name, :age, :role)";
     $stmt2 = $dbh->prepare($sql2);
     $stmt2->bindParam(':username', $cusername);
     $stmt2->bindParam(':password', $cpassword);
     $stmt2->bindParam(':name', $cname);
     $stmt2->bindParam(':age', $cage);
     $stmt2->bindParam(':role', $crole); 
     $stmt2->execute();
 
     $res="Succesfully created";    
     return $res;
   }
  
  
}

 ?>        

