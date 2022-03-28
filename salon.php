<html>
    <head>
      <title>ASSIGMENT 4</title>
      <link rel="stylesheet" type="text/css" href="style-4.css">
    </script>
   
    </head>
    <body>
    <div class="container">
        <div class="header"><h2>The Art of Hair</h2></div>
        <form id="form" method='post' onsubmit="return validate()" action=login.php >
                Stylist's First Name:
                <input id="FirstName" input type="text" name="FirstName"  style="width:350px;" placeholder="Example: Sam" > *REQUIRED
          
                <br><br>Stylist's Last Name:
                <input id="LastName" input type="text" name="LastName"  style="width:350px;"  placeholder="Example: Dones"> *REQUIRED

                <br><br>Stylist's Password:
                <input id="Password" input type="password" name="Password" style="width:350px;" placeholder="Example: Qwerty123!">*REQUIRED

                <br><br>Stylist's ID:
                <input id="ID" input type="text" name="Id" style="width:350px;"  placeholder="Example: 12345678">*REQUIRED

                <br><br>Stylist's phone #:
                <input id="Number" input type="text" name="number" style="width:350px;"  placeholder="Example: 973-555-1524">*REQUIRED

                <br><br>Stylist's email #:
                <input id="Email" input type="email" name="email" style="width:350px;" placeholder="Example:hello@outlook.com">
                <span id="text" style="display:none">*REQUIRED</span>

                <br><br><input type="checkbox" name="box" id="checkbox">Check the box to request an Email Cofirmation:

           
                <input type="submit" name="login"></input>
                <input type="reset" value="Reset">
                
        </form>
    </div>  
   <script src="script-1.js"></script>

</body>
</html>
