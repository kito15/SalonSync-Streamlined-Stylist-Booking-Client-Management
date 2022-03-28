
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style_1.css">
</head>
<body>
<div class="navbar">
  <a class href=#>Home</a>
  <a href=# id="search">Search A Stylist’s Accounts</a>
  <a href=# id="appointment">Make a Client’s Appointment</a>
  <a href=# id="clientOrder">Place A Client’s Order</a></li>
  <a href=# id="update">Update A Client’s Order</a>
  <a href=# id="cancelClientAppointment">Cancel A Client’s Appointment </a>
  <a href=# id="cancelOrder">Cancel A Client’s Order</a>
  <a href=# id="createAccount">Create A New Client Account</a>

</div>

<div id="myPageDisplay"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$('.navbar a').on('click', function(){
    $.get('displayTables.php', { menu: this.id }, function(data){
        $('#myPageDisplay').html(data);
    });
});
</script>
</body>
</html>