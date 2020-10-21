<?php

    function retrieve($success,$manusername,$manpassword){
    require'api/db_connect.php';
   
    
    $msql="SELECT * FROM users";
    $mstmt = $dbh->prepare($msql);
    $mstmt->execute();
    $mresult = $mstmt->fetchAll();
    
    
    if($success[1]=="User"){
    echo("<center>");
    echo(' <form action="http://localhost/umsupd/manage.php"  method="post">');
    echo("<table border = '1'>");
    echo("<tr>");
    echo("<th>");
    echo("USER ID");
    echo("</th>");
    echo("<th>");
    echo("USERNAME");
    echo("</th>");
    echo("<th>");
    echo("NAME");
    echo("</th>");
    echo("<th>");
    echo("AGE");
    echo("</th>");
    echo("<th>");
    echo("ROLE");
    echo("</th>");
      echo("<th>");
    echo("SELECT USER");
    echo("</th>");
    echo("</tr>");
    $i=0;
    foreach($mresult as $mrow){
    if($mrow["role"]=="Admin"){
        continue;
   
    }
    else{
    echo("<tr>");
    echo("<td>");
    echo ($mrow["userid"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["username"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["name"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["age"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["role"]);
    echo("</td>");
    $userid=$mrow["userid"];
    echo("<td>");
    $str4="<button type=" ."'submit'" . " name=" ."'select'" ." value=" ."'$userid'" . ">" ."select"."</input>" ; 
    echo($str4);
    //$str4="<input type=" ."'radio'" . " name=" ."'select'" ." value=" ."'$userid'" ." id="."'$userid'" ." onclick="."'myFunction($userid)'". " />"; 
  // echo($str4); 
   
    echo("</td>");
    echo("</tr>");
    $i++;
   
    }
    
    }
    $str1="<input type=" ."'hidden'" . " name=" ."'manusername'" ." value=" ."'$manusername'" . "/>"  ;
    echo($str1);
    $str2="<input type=" ."'hidden'" . " name=" ."'manpassword'" ." value=" ."'$manpassword'" . "/>"  ;
    echo($str2);
    
    echo("</table>");
     echo("</form>");
    echo("</center>");
    
    }
    else{
    echo("<center>");
    echo(' <form action="http://localhost/umsupd/manage.php"  method="post">');
    echo("<table border = '1'>");
    echo("<tr>");
    echo("<th>");
    echo("USER ID");
    echo("</th>");
    echo("<th>");
    echo("username");
    echo("</th>");
    echo("<th>");
    echo("NAME");
    echo("</th>");
    echo("<th>");
    echo("AGE");
    echo("</th>");
    echo("<th>");
    echo("ROLE");
    echo("</th>");
     echo("<th>");
    echo("SELECT USER ");
    echo("</th>");
    echo("</tr>");
    $i=0;
    foreach($mresult as $mrow){
    echo("<tr>");
    echo("<td>");
    echo ($mrow["userid"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["username"]);
    $userid=$mrow["userid"];
    echo("</td>");
    echo("<td>");
    echo ($mrow["name"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["age"]);
    echo("</td>");
    echo("<td>");
    echo ($mrow["role"]);
    echo("</td>");
    echo("<td>");
   $str4="<button type=" ."'submit'" . " name=" ."'select'" ." value=" ."'$userid'" . ">" ."select"."</input>" ; 
   echo($str4);
   //$str4="<input type=" ."'radio'" . " name=" ."'select'" ." value=" ."'$userid'" ." id="."'$userid'" ." onclick="."'myFunction($userid,$manusername,$manpassword)'". " />"; 
   //echo($str4);
    echo("</td>");
    echo("</tr>");
    $i++;
    
    
    }
    $str1="<input type=" ."'hidden'" . " name=" ."'manusername'" ." value=" ."'$manusername'" . "/>"  ;
    echo($str1);
    $str2="<input type=" ."'hidden'" . " name=" ."'manpassword'" ." value=" ."'$manpassword'" . "/>"  ;
    echo($str2);
    echo("</table>");
    echo("</form>");
    
    
    echo("</center>");
    
   
    
    }

}
?>