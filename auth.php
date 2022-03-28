<?php
function menu1(){
   include 'dbconnections.php';
  $result="SELECT currentNames.Name FROM currentNames";
  $result=$con->query($result);
  echo '<table border=1px cellspacing="0">
  <tr bgcolor="gray"><th>Stylist Name</th>
  <th>Name:</th>
  <th>Password</th>';

    while($row=$result->fetch_assoc()){
               echo "<tr bgcolor=gray><td>".$row["Name"];
           }
    }
}

   <?php