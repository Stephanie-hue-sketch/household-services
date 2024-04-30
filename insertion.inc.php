<?php 

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $type = $_POST['type'];
 $loc = $_POST['loc']; 
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
  if ($type == "") {
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`,`User_Type`, `Password`, `Location`, `Status`) VALUES ('$fname','$phone','$email','Client',md5('$password'),'$loc', 1)";
     mysqli_query($conn, $sql);
  header("Location: index.html?clientregistration=success");
  }else{
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`, `User_Type`, `Password`, `Location`, `Service_Type`, `Status`) VALUES ('$fname','$phone','$email','Service Provider',md5('$password'),'$loc','$type', 0)";
     mysqli_query($conn, $sql);
  header("Location: index.html?serviceproviderregistration=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

//Make A Service Request
if (isset($_POST['msr'])) {
 $cid = $_SESSION['clientname'];
 $rooms = $_POST['rooms']; 
 $type = $_POST['type']; 
 $det = $_POST['det']; 
 $ft = $_POST['date'] . " to " . $_POST['date1']; 
 $fee = $_POST['fee']; 

   function dateDiffInDays($date1, $date2) {
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400));
}

$ftn = dateDiffInDays($_POST['date'], $_POST['date1']);

        $tprice = $ftn * $fee;

 require_once 'dbconnection.inc.php';               

  $sql = "INSERT INTO `requests`(`Client_ID`, `Fee`, `From_To`, `Details`, `Rooms`, `Total_Fees`, `Service_Type`) VALUES ('$cid','$fee','$ft','$det','$rooms','$tprice','$type')";
     mysqli_query($conn, $sql);   
  header("Location: index2.php?makeaservicerequest=success");
}

//Rate A Service Provider
if (isset($_POST['rtsp'])) {
 $spid = explode(',',$_POST['rid']);
 $rid = $spid[0];
 $uid = $spid[1];
 $rt = $_POST['rt']; 

 require_once 'dbconnection.inc.php';               

$sql_select = "SELECT `Ratings` FROM `users` WHERE `User_ID` = '$uid'";
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_assoc($result);
$currentRatings = $row['Ratings'];

$newRatings = $currentRatings + $rt;

  $sql = "UPDATE `requests` SET `Status` = 'Completed & Service Provider Rated.' WHERE `Request_ID` = '$rid'";
  mysqli_query($conn, $sql);
  // var_dump($sql);
  $sql1 = "UPDATE `users` SET `Ratings` = '$newRatings' WHERE `User_ID` = '$uid'";
  //var_dump($sql1);
  mysqli_query($conn, $sql1);     
       
  header("Location: index2.php?rateaserviceprovider=success"); 

}

//Delete Functions

        if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `users` WHERE `User_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        $sql1 = "DELETE FROM `requests` WHERE `User_ID` = '$deleteItem'";
        mysqli_query($conn, $sql1);         
        header("Location: index.php?deleteuser=success");
        }

        if($_REQUEST['action'] == 'deleteR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `requests` WHERE `Request_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index2.php?deleterequest=success");
        }

//Update Requests

        if($_REQUEST['action'] == 'acceptR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $uid = $_SESSION['spnamep'];
        $sql = "UPDATE `requests` SET `Status` = 'Accepted', `Service_Provider_ID` = '$uid' WHERE `Request_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?acceptRequest=success");                        
        } 

        if($_REQUEST['action'] == 'rejectR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `requests` SET `Status` = 'Pending', `Service_Provider_ID` = 1 WHERE `Request_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index2.php?rejectpotentialRequest=success");                        
        } 

        if($_REQUEST['action'] == 'cancelR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `requests` SET `Status` = 'Cancelled' WHERE `Request_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index2.php?cancelRequest=success");                        
        } 

        if($_REQUEST['action'] == 'completeR' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `requests` SET `Status` = 'Completed' WHERE `Request_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index2.php?completeRequest=success");                        
        }

        if($_REQUEST['action'] == 'updateU' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `users` SET `Status` = 1 WHERE `User_ID` = '$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?approveUser=success");                        
        }         

//Update User
if (isset($_POST['upu'])) {
 $uid = $_POST['uid'];
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $qual = $_POST['qual']; 
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];
 $phone = $_POST['phone'];
 $mod = $_POST['mod'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index.php?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updateserviceprovider=success");
  }else if ($mod == 3) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password'), `Qualifications` = '$qual' WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index2.php?updateclient=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

 ?>