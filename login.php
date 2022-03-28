<?php
include 'dbconnections.php';
    if(isset($_POST['login'])){
        $firstName=mysqli_real_escape_string($con,$_POST['FirstName']);
        $lastName=mysqli_real_escape_string($con,$_POST['LastName']);
        $password=mysqli_real_escape_string($con,$_POST['Password']);
        $id=mysqli_real_escape_string($con,$_POST['Id']);
        $sql="SELECT * FROM StylistDB WHERE Stylist_ID = '$id' AND Stylist_First_Name= '$firstName' AND Stylist_Last_Name= '$lastName' AND Stylist_Password= '$password' ";
        $result=mysqli_query($con,$sql);
        if (mysqli_num_rows($result)){
            session_start();
            $_SESSION['FirstName']=$firstName;
            $_SESSION['LastName']=$lastName;
            $_SESSION['Id']=$id;
            header("Location:menu_.php");
        }else{
            echo "<script>
            alert('Invalid login credentials! Try again.');
            window.location.href='salon.php';
            </script>";
        }
    } else if(isset($_POST['submit_appointment'])){
            session_start();
            $clientFirst=mysqli_real_escape_string($con,$_POST['clientFirst']);
            $clientLast=mysqli_real_escape_string($con,$_POST['clientLast']);
            $clientID=mysqli_real_escape_string($con,$_POST['clientID']);
            $appointmentType=mysqli_real_escape_string($con,$_POST['appointmentType']);
            $date=mysqli_real_escape_string($con,$_POST['date']);

            $sql="SELECT * FROM ClientData WHERE Client_First_Name = '$clientFirst' AND Client_Last_Name= '$clientLast' AND client_ID= '$clientID'";
            $appointmentID=rand(21, 50);

            $result=mysqli_query($con,$sql);
            if (mysqli_num_rows($result)){
               $id=$_SESSION['Id'];
               $res = mysqli_query($con,"INSERT INTO ClientAppointments VALUES ('$appointmentType', '$date', '$id','$clientID','$appointmentID')");
               echo "<script>
               alert('Client Appointment Placed.');
               window.location.href='menu_.php#'
               </script>"
               ;
            }else{
               echo "<script>
               alert('CLIENT CANNOT BE FOUND RECHECK DATA ENTERED. OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT.') 
               window.location.href='menu_.php#'</script>;";
            } 
    }else if(isset($_POST['placeOrder'])){
            session_start();
            $id=$_SESSION['Id'];
            $orderNumber=rand(21, 50);
            $clientF=mysqli_real_escape_string($con,$_POST['clientF']);
            $clientL=mysqli_real_escape_string($con,$_POST['clientL']);
            $client_ID=mysqli_real_escape_string($con,$_POST['client_ID']);
            $appointmentID=mysqli_real_escape_string($con,$_POST['appointmentID']);
            $productOrder=mysqli_real_escape_string($con,$_POST['productOrder']);
            $shippingAddress=mysqli_real_escape_string($con,$_POST['shippingAddress']);
            $sql="SELECT * FROM ClientData WHERE Client_First_Name = '$clientF' AND Client_Last_Name= '$clientL' AND client_ID= '$client_ID'";
            $result=mysqli_query($con,$sql);
            if (mysqli_num_rows($result)){
               $res="SELECT * FROM ClientAppointments WHERE AppointmentID = '$appointmentID'";
               $results=mysqli_query($con,$res);
               if(mysqli_num_rows($results)){
                $insert = mysqli_query($con,"INSERT INTO clientOrder VALUES ('$productOrder', '$shippingAddress', '$orderNumber','$id','$client_ID','$appointmentID')");
                echo 
                "<script>
                 alert('Client Order Placed');
                 window.location.href='menu_.php#'</script>";
               }else if(!mysqli_num_rows($results)){
                echo "<script>
                alert('APPOINTMENT ID CAN NOT BE FOUND. OTHERWISE YOU NEED TO BOOK AN APPOINTMENT FOR THE CLIENT.')
                window.location.href='menu_.php#'</script>";
               }
            }else{
                echo "<script>
                alert('CLIENT CANNOT BE FOUND RECHECK DATA ENTERED. OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR THE CLIENT.')
                window.location.href='menu_.php#'</script>";
            }
        }else if(isset($_POST['updateOrder'])){
            $clientNumber=mysqli_real_escape_string($con,$_POST['clientNumber']);
            $orderNum=mysqli_real_escape_string($con,$_POST['orderNum']);
            $updateClientOrder=mysqli_real_escape_string($con,$_POST['updateClientOrder']);

            $sql="SELECT * FROM clientOrder WHERE orderNumber = '$orderNum' AND ClientID= '$clientNumber'";

            $result=mysqli_query($con,$sql);
            if (mysqli_num_rows($result)){
               $res = mysqli_query($con,"UPDATE clientOrder SET ProductType = '$updateClientOrder' WHERE orderNumber = '$orderNum'");
               echo "<script>
               alert('ORDER UPDATED.');
               window.location.href='menu_.php#'</script>;
               </script>";
            }else{
               echo "<script>
               alert('EITHER DATA ENTERED FOR Client ID or Order Number is Incorrect. Please Check the Client ID and Order number entered or that the order was placed by searching records of the photographer.') 
               window.location.href='menu_.php#'</script>;";
            } 
    }else if(isset($_POST['cancelAppoinment'])){
            $clientNumber=mysqli_real_escape_string($con,$_POST['clientNumber']);
            $clientAppointmentID=mysqli_real_escape_string($con,$_POST['clientAppointmentID']);

            $sql="SELECT * FROM ClientAppointments WHERE clientID = '$clientNumber' AND AppointmentID= '$clientAppointmentID'";
            $result=mysqli_query($con,$sql);
            if (mysqli_num_rows($result)){
               $res = mysqli_query($con,"DELETE FROM ClientAppointments WHERE AppointmentID='$clientAppointmentID' AND ClientID='$clientNumber'");
               echo "<script>
               alert('Client Appointment Cancelled.');
               window.location.href='menu_.php#'</script>;
               </script>";
            }else{
               echo "<script>
               alert('EITHER DATA ENTERED FOR Client ID or Order Number is Incorrect. Please Check the Client ID and Order number entered or that the order was placed by searching records of the photographer.') 
               window.location.href='menu_.php#'</script>;";
            } 
    } else if(isset($_POST['cancelOrder'])){
            $clientNumber=mysqli_real_escape_string($con,$_POST['clientNumber']);
            $orderNumber=mysqli_real_escape_string($con,$_POST['orderNumber']);

            $sql="SELECT * FROM clientOrder WHERE ClientID = '$clientNumber' AND orderNumber= '$orderNumber'";
            $result=mysqli_query($con,$sql);
            if (mysqli_num_rows($result)){
               $res = mysqli_query($con,"DELETE FROM clientOrder WHERE orderNumber='$orderNumber' AND ClientID='$clientNumber'");
               echo "<script>
               alert('Customer Order Cancelled.');
               window.location.href='menu_.php#'</script>;
               </script>";
            }else{
               echo "<script>
               alert('ORDER DOES NOT EXIST FOR THE CLIENT. Please Check and Re-enter Order Number.') 
               window.location.href='menu_.php#'</script>;";
            } 
    }
     else if(isset($_POST['createAccount'])){
            $clientfirstName=mysqli_real_escape_string($con,$_POST['clientfirstName']);
            $clientLastName=mysqli_real_escape_string($con,$_POST['clientLastName']);
            $cidnumber=mysqli_real_escape_string($con,$_POST['cidnumber']);

            $sql="SELECT * FROM ClientData WHERE ClientID = '$cidnumber' AND Client_Last_Name= '$clientLastName' AND Client_First_Name='$clientfirstName'";
            $result=mysqli_query($con,$sql);
            if ($result){
               echo "<script>
               alert('Client already has an account.') 
               window.location.href='menu_.php#'</script>;";

            }else{
                $res = mysqli_query($con,"INSERT INTO ClientData VALUES ('$clientfirstName', '$clientLastName', '$cidnumber')");
                echo "<script>
               alert('Client Account Created.');
               window.location.href='menu_.php#'</script>;
               </script>";
            } 
    }
?>
