<?php
session_start();
switch($_GET['menu']){
    case 'search':
        menu1();
        break;
    case 'appointment':
        menu2();
        break;
    case 'clientOrder':
        menu3();
        break;
    case 'update':
        menu4();
        break;
    case 'cancelClientAppointment':
        menu5();
        break;
    case 'cancelOrder':
        menu6();
        break;
    case 'createAccount':
        menu7();
        break;
}
function menu1(){
   include 'dbconnections.php';
   if(isset($_SESSION['FirstName'])&&isset($_SESSION['LastName'])&&isset($_SESSION['Id'])){
          $firstName=$_SESSION['FirstName'];
          $lastName=$_SESSION['LastName'];
          $id=$_SESSION['Id'];
          $result="SELECT  StylistDB.Stylist_First_Name,StylistDB.Stylist_Last_Name,StylistDB.Stylist_ID,StylistDB.Stylist_Phone,StylistDB.Email, ClientData.Client_First_Name, ClientData.Client_Last_Name,ClientData.client_ID, ClientAppointments.AppointmentType,ClientAppointments.date,ClientAppointments.AppointmentID,clientOrder.ProductType,clientOrder.shippingAddress,clientOrder.orderNumber
              FROM ClientData
              INNER JOIN ClientAppointments ON ClientAppointments.ClientID = ClientData.client_ID
              INNER JOIN clientOrder on clientOrder.ClientID=ClientAppointments.ClientID
              INNER JOIN StylistDB on StylistDB.Stylist_ID= clientOrder.StylistID
              WHERE Stylist_ID = '$id' AND Stylist_First_Name= '$firstName' AND Stylist_Last_Name= '$lastName'";

          $result=$con->query($result);
          echo '<table border=1px cellspacing="0">
          <tr bgcolor="gray"><th>Stylist Name</th>
          <th>Stylist Last Name</th>
          <th>Stylist ID</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Client First Name</th>
          <th>Client Last Name</th>
          <th>Client ID</th>
          <th>Appointment Type</th>
          <th>Date and Time</th>
          <th>Appointment ID</th>
          <th>Product</th>
          <th>Shipping Address</th>
          <th>Order number</th></tr>';

           if($result!= false &&$result->num_rows!=0){
               while($row=$result->fetch_assoc()){
                   echo "<tr bgcolor=gray><td>".$row["Stylist_First_Name"]."</td><td>".$row["Stylist_Last_Name"]."</td><td>".$row["Stylist_ID"]."</td><td>".$row["Stylist_Phone"]."</td><td>".$row["Email"]."</td><td>".$row["Client_First_Name"]."</td><td>".$row["Client_Last_Name"]."</td><td>".$row["client_ID"]."</td><td>".$row["AppointmentType"]."</td><td>".$row["date"]."</td><td>".$row["AppointmentID"]."</td><td>".$row["ProductType"]."</td><td>".$row["shippingAddress"]."</td><td>".$row["orderNumber"];
               }
           }
   }
   }
   function menu2(){
    echo "

    <link rel='stylesheet' type='text/css' href='style-4.css'>
    <div class='container'>
        <div class='header'><h2>The Art of Hair</h2></div>
        <form method='post' action=login.php>
                Client's First Name:
                <input id='FirstName' input type='text' name='clientFirst'  style='width:350px;'>*REQUIRED
          
                <br><br>Client's Last Name:
                <input id='clientLastName' input type='text' name='clientLast'  style='width:350px;'>*REQUIRED

                <br><br>Client's ID:
                <input id='clientID' input type='text' name='clientID' style='width:350px;'>*REQUIRED

                <br><br>Appointment Type:
                <input id='appointmentType' input type='text' name='appointmentType' style='width:350px;'>*REQUIRED

                <br><br>Date and Time #:
                <input id='date' input type='date' name='date' style='width:350px;'>*REQUIRED
                
                <br><br>
                <input type='submit' name='submit_appointment'></input>
        </form>
    </div>
    ";
   }
   function menu3(){
    echo "
    <script>
    function show_alert() {
      if(!confirm('Before you place an order you must have booked an appointment/event. Did you have an appointment/event?')) {
        return false;
      }
      this.form.submit();
}</script>
        <link rel='stylesheet' type='text/css' href='style-4.css'>
        <div class='container'>
        <div class='header'><h2>The Art of Hair</h2></div>
        <form method='post' onsubmit='return show_alert();' action=login.php '>
                Client's First Name:
                <input id='ClientFirst' input type='text' name='clientF'  style='width:350px;' > *REQUIRED
          
                <br><br>Client's Last Name:
                <input id='LastName' input type='text' name='clientL'  style='width:350px;'> *REQUIRED

                <br><br>Client ID Number:
                <input id='ID' input type='text' name='client_ID' style='width:350px;'>*REQUIRED

                <br><br>Client Appointment ID:
                <input id='appointmentID' input type='text' name='appointmentID' style='width:350px;'>*REQUIRED

                <br><br>Product Order:
                <input id='product' input type='text' name='productOrder' style='width:350px;'>*REQUIRED

                <br><br>Shipping Address:
                <input id='shipping' input type='text' name='shippingAddress' style='width:350px;' >*REQUIRED
                <br><br>
                <input type='submit' name='placeOrder'></input>
                </form>
            </div>  
           ";
                  
   }
    function menu4(){
    echo "
      <script>
    function show_alert() {
      if(!confirm('You are about to UPDATE this order. Are you sure you want to update?')) {
        return false;
      }
      this.form.submit();
}</script>
    
        <link rel='stylesheet' type='text/css' href='style-4.css'>
        <div class='container'>
        <div class='header'><h2>The Art of Hair</h2></div>
        <form method='post' onsubmit='return show_alert();' action=login.php>
                Client ID number:
                <input id='idNum' input type='text' name='clientNumber'  style='width:350px;' > *REQUIRED
          
                <br><br>Client Order Number:
                <input id='order' input type='text' name='orderNum'  style='width:350px;'> *REQUIRED

                <br><br>Update Order:
                <input id='update' input type='text' name='updateClientOrder' style='width:350px;'>*REQUIRED
                <br><br>
                <input type='submit' name='updateOrder'></input>
                </form>
            </div>  
           ";
                  
   }
    function menu5(){
    echo "
    <script>
        function show_alert() {
          if(!confirm('You are about to cancel this Appointment. Are you sure you want to cancel?')) {
            return false;
          }
          this.form.submit();
    }</script>
        <link rel='stylesheet' type='text/css' href='style-4.css'>
        <div class='container'>
        <div class='header'><h2>The Art of Hair</h2></div>
        <form method='post' onsubmit='return show_alert();' action=login.php>
                Client ID number:
                <input id='idNum' input type='text' name='clientNumber'  style='width:350px;' > *REQUIRED
          
                <br><br>Client AppointmentID:
                <input id='appointment' input type='text' name='clientAppointmentID'  style='width:350px;'> *REQUIRED
                <br><br>
                <input type='submit' name='cancelAppoinment'></input>
                </form>
            </div>  
           ";
                  
   }
   function menu6(){
    echo "
     <script>
        function show_alert() {
          if(!confirm('You are about to cancel this order. Are you sure you want to cancel?')) {
            return false;
          }
          this.form.submit();
    }</script>
        <link rel='stylesheet' type='text/css' href='style-4.css'>
        <div class='container'>
        <div class='header'><h2>The Art of Hair</h2></div>
        <form method='post' onsubmit='return show_alert();' action=login.php >
                Client ID number:
                <input id='idNum' input type='text' name='clientNumber'  style='width:350px;' > *REQUIRED
          
                <br><br>Client Order number:
                <input id='ordernum' input type='text' name='orderNumber'  style='width:350px;'> *REQUIRED
                <br><br>
                <input type='submit' name='cancelOrder'></input>
                </form>
            </div>  
           ";
                  
   }
    function menu7(){
    echo "
        <link rel='stylesheet' type='text/css' href='style-4.css'>
        <div class='container'>
        <div class='header'><h2>The Art of Hair</h2></div>
        <form method='post' action=login.php>
                Client First Name:
                <input id='firstName' input type='text' name='clientfirstName'  style='width:350px;' > *REQUIRED

                 <br><br>Client Last Name:
                <input id='last' input type='text' name='clientLastName'  style='width:350px;' > *REQUIRED

                <br><br>Client ID NUMBER:
                <input id='idNum' input type='text' name='cidnumber'  style='width:350px;'> *REQUIRED
                <br><br>
                <input type='submit' name='createAccount'></input>
                </form>
            </div>  
            ";
                  
   }

?>

