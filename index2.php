<?php
require_once 'dbconnection.inc.php';
session_start();

if (!isset($_SESSION['clientname'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['clientname'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Household Services System - Service Provider Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

        <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Nairobi, KENYA.</small>
                </div>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+254 712 345678</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="#" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">Household Services</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#" class="nav-item nav-link active">Home</a>
                <a href="#data" class="nav-item nav-link">Database</a>
                <a href="#mod" class="nav-item nav-link">My Module</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href="logout.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/s1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To The Household Services Platform</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Empowering the Household Service Providers</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</p>
                                <a href="#data" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Database</a>
                                <a href="#mod" class="btn btn-light py-md-3 px-md-5 animated slideInRight">My Module</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/s2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To The Household Services Platform</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Reliable, Professional, and Personalized</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</p>
                                <a href="#data" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Database</a>
                                <a href="#mod" class="btn btn-light py-md-3 px-md-5 animated slideInRight">My Module</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/s3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To The Household Services Platform</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Expert Care for Your Home and Loved Ones</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</p>
                                <a href="#data" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Database</a>
                                <a href="#mod" class="btn btn-light py-md-3 px-md-5 animated slideInRight">My Module</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

<!-- Database Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0" id="data">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-12 ps-lg-0" style="min-height: 400px;">
                        <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">View Database</h1>
                            <br>
                            <h2>List of My Requests</h2>
                        </div>
<table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Requests ID</th>
<th style="text-align: left;
  padding: 8px;">Fee Per Day</th>
  <th style="text-align: left;
  padding: 8px;">Schedule</th>
 <th style="text-align: left;
  padding: 8px;">Total Fees</th>
   <th style="text-align: left;
  padding: 8px;">Details</th>
   <th style="text-align: left;
  padding: 8px;">Service Type</th>
  <th style="text-align: left;
  padding: 8px;">Status</th>
    <th style="text-align: left;
  padding: 8px;">Service Provider Details & Ratings</th>  
   <th style="text-align: left; padding: 8px;"></th>
   <th style="text-align: left; padding: 8px;"></th>   
</tr>

<?php

$sql = "SELECT COUNT(`requests`.`Request_ID`) AS `Total`, `requests`.`Request_ID`, `requests`.`Service_Provider_ID`, `requests`.`Fee`, `requests`.`From_To`, `requests`.`Total_Fees`, `requests`.`Status`, `requests`.`Details`, `requests`.`Rooms`, `requests`.`Service_Type`, `users`.`Location`, `users`.`Ratings`, `users`.`Fullname`, `users`.`Phone_Number`, `users`.`Email_Address` FROM `requests` JOIN `users` ON `requests`.`Service_Provider_ID` = `users`.`User_ID` WHERE `requests`.`Client_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Request_ID"]); ?></td>
<td><?php echo($row["Fee"]); ?></td>
<td><?php echo($row["From_To"]); ?></td>
<td><?php echo($row["Total_Fees"]); ?></td>
<?php
if($row['Rooms'] == ""){
?>
<td><?php echo($row["Details"]); ?>.</td>
<?php
}else{
?>
<td><?php echo($row["Details"]); ?>. With <?php echo($row["Rooms"]); ?> number of rooms.</td>
<?php
}
?>
<td><?php echo($row["Service_Type"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<?php
if(($row['Service_Provider_ID'] == '') || ($row['Service_Provider_ID'] == 1)){
?>
<td></td>
<?php
}else{
?>
<td><?php echo($row["Fullname"]); ?> reach out on <?php echo($row["Phone_Number"]); ?> or <?php echo($row["Email_Address"]); ?> at <?php echo($row["Location"]); ?> - <?php echo($row["Ratings"]); ?> / <?php echo(($row["Total"]) * 10); ?></td>
<?php
}
?>
<?php
if($row['Status'] == 'Accepted'){
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to complete this request?')?window.location.href='insertion.inc.php?action=completeR&id=<?php echo($row["Request_ID"]); ?>':true;" title='Complete Request'>Complete</button></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to reject this service provider?')?window.location.href='insertion.inc.php?action=rejectR&id=<?php echo($row["Request_ID"]); ?>':true;" title='Reject Service Provider'>Reject</button></td>
<?php
}else if($row['Status'] == 'Pending'){
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to cancel this request?')?window.location.href='insertion.inc.php?action=cancelR&id=<?php echo($row["Request_ID"]); ?>':true;" title='Cancel Request'>Cancel</button></td>
<?php
}else{
?>
<td></td>
<?php
}
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this request?')?window.location.href='insertion.inc.php?action=deleteR&id=<?php echo($row["Request_ID"]); ?>':true;" title='Delete Request'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }

?>

</table>
<br>
<div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" onclick="printData();">Print</button>
                                    <br>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Database End -->

    <!-- My Module Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0" id="mod">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                                        <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Update My Details</h1>
                        </div>
                        <form action="insertion.inc.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="fname" required class="form-control border-0" placeholder="Your Name" value="<?php echo $row1['Fullname']; ?>" style="height: 55px;">
                                    <input type="hidden" value="3" name="mod" required>
                                    <input type="hidden" value="<?php echo $filter; ?>" name="uid" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email" value="<?php echo $row1['Email_Address']; ?>" name="email" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Phone Number" value="<?php echo $row1['Phone_Number']; ?>" name="phone" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="password" class="form-control border-0" name="password" required placeholder="Your Password" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="password" class="form-control border-0" name="cpassword" required placeholder="Confirm Your Password" style="height: 55px;">
                                </div>                                
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="upu">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Rate a Service Provider</h1>
                        </div>
                        <form action="insertion.inc.php" method="POST">
                            <div class="row g-3">
                                  <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;" name="rid" required>
                                        <option selected>Select A Completed Request ID</option>
                                     <?php
                                      $sql = "SELECT * FROM `requests` WHERE `Client_ID` = '$filter' AND `Status` = 'Completed'";
                                      $all_categories = mysqli_query($conn,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["Request_ID"];?>,<?php echo $category["Service_Provider_ID"];?>"><?php echo $category["Request_ID"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" name="rt" max="10" required placeholder="Your Rating" style="height: 55px;">
                                </div>                               
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="rtsp">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>          
            </div>
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-12 ps-lg-0" style="min-height: 400px;">
                                        <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Make A Service Request</h1>
                        </div>
                        <form action="insertion.inc.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label>Start Date:</label>
                                    <br>
                                    <input type="date" min="<?php echo date('Y-m-d'); ?>" name="date" required class="form-control border-0" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>End Date:</label>
                                    <br>
                                    <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control border-0" name="date1" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" min="1000" class="form-control border-0" placeholder="Fee for Services" name="fee" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" min="1" class="form-control border-0" name="rooms" placeholder="No. of Rooms (if service has to do with rooms)." style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Request Details" name="det" required></textarea>
                                </div> 
                                <div class="col-12 col-sm-12">
                                    <select class="form-select border-0" style="height: 55px;" name="type">
                                        <option selected disabled>Select A Service Type</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Dishes">Dishes</option>
                                        <option value="Cooking">Cooking</option>
                                        <option value="Laundry">Laundry</option>
                                        <option value="Full Package">Full Package</option>
                                    </select>
                                </div>                                
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="msr">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Module End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s" id="contact">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">Contact Us</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Nairobi, KENYA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+254 712 345678</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>household_services@gmail.com</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="#data">Database</a>
                    <a class="btn btn-link" href="#mod">My Module</a>
                    <a class="btn btn-link" href="logout.php">Logout</a>
                    <a class="btn btn-link" href="#contact">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Household Services Portal</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>