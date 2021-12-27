<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Real-Estate - Just Join</title>
  <meta
    content="Just-Join  is a multi-services corporate entity established in 2021. We are providing services for staffing solutions, real-estate, and pre-owned cars segment."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

  <!-- Favicons -->
  <link href="assets/img/fav-jj.png" rel="icon">
  <link href="assets/img/fav-jj.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/"><img src="assets/img/logo-trim.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
      <nav class="nav-menu d-none d-xl-block">
        <ul>
          <li class=""><a href="index.html">Home</a></li>
          <li><a href="/#about">About </a> </li>         
          <li class="drop-down scrolltoDrop"><a>Services</a>
            <ul>
              <li class="drop-down scrolltoDrop"><a>Staffing Solutions</a> 
               <!-- <ul>
                  <li class="drop-down"><a href="/JJ/index.html#employer">Employer</a></li>
                  <li class="drop-down"><a href="/JJ/index.html#employee">Employee</a></li>
                </ul>-->
              </li>
              <li class="drop-down"><a href="/#realestate">Real Estate</a></li>
              <li class="drop-down"><a href="/#carzone">Pre-Owned Cars</a></li>
              </ul>
          </li>    
          <li><a href="#contact">Contact</a></li>    

          <li class="redirectPage"><a class="employee-btn" href="/registration.html"> Registration </a>
          <!--  <ul>
              <li class="drop-down pt-0 pl-0"> <a href="employer.php" class="menu-employer-btn scrollto">Looking Employee?</a></li>
              <li class="drop-down pt-0 pl-0"><a href="employee.php" class="menu-employee-btn scrollto">Need Job?</a></li>
              <li class="drop-down pt-0 pl-0"><a href="real-estate-seller.php" class="menu-employer-btn scrollto">Sale Property</a></li>
              <li class="drop-down pt-0 pl-0"> <a href="real-estate-buyer.php" class="menu-employee-btn scrollto">Buy Property</a></li>           
              <li class="drop-down pt-0 pl-0"><a href="car-seller.php" class="menu-employer-btn scrollto">Sale Car</a></li>
              <li class="drop-down pt-0 pl-0"> <a href="car-buyer.php" class="menu-employee-btn scrollto">Buy Car</a></li>
            </ul>-->
          </li> 
      
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="employer.php" class="employer-btn scrollto">Looking Employee?</a>
	  <a href="employee.php" class="employee-btn scrollto">Need Job?</a>-->

    </div>
  </header><!-- End Header -->
  <div class="container mt160">
  <div class="text-right mt-5">
    <span class="helpline">Need Help on filling the application? please call : 97 3636 6464, 97 3636 8484</span>
    </div>
    <div class="panel employee-panel-primary">
      <div class="panel-heading"> Want to  buy property (Ex: House, Land, Agriculture Land ...)? Please fill the below application</div>
    </div>

    <form id='propertyBuyer' class="employee-form">
    <div class="panel panel-danger">
            <div class="panel-heading">Please fill your details </div>
          </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="propertyBuyerName">First Name<span class="mandatory">*</span></label>
          <input type="text" class="form-control" id="propertyBuyerName" placeholder="First Name" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="propertyBuyerSurname">Last Name</label>
          <input type="text" class="form-control" id="propertyBuyerSurname"
            placeholder="Last Name" value="">
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="aadhar">Aadhar Number (Optional)</label>
        <input type="number" class="form-control" id="aadhar" placeholder="Aadhare Number" value="">
      </div>
        <div class="form-group col-md-6">
          <label for="propertyType">Property Type</label>
          <select id="propertyType" class="form-control">
            <option value="null" selected>Choose</option>
            <option value="house">House</option>
            <option value="land">Land</option>
            <option value="agriculture">Agriculture</option>           
            <option value="others">Others</option>
          </select>
          <input class="form-control others dropdown mt-4" type="text" id="propertyOthers" placeholder="Other Property Name" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="propertValue">Property Value</label>
          <input type="text" class="form-control" id="propertValue"
            placeholder="EX: 10,00,00..">
        </div>
        <div class="form-group col-md-6">
          <label for="propertyPhonenumber">Phone Number<span class="mandatory">*</span></label>
          <input type="number" class="form-control" id="propertyPhonenumber" placeholder="Phone Number" pattern="pattern="[1-9]{1}[0-9]{9}" maxlength="10">
        </div>  
      </div>
      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="buyerAddress">Prefered Location</label>
          <textarea type="text" class="form-control" id="buyerAddress" placeholder="Property prefered location"
           ></textarea>
        </div>        
      </div>
      <!-- <div class="form-row">        
        <div class="form-group col-md-6">
          <label for="date">Date of Submit</label>
          <input type="Date" class="form-control" id="dateOfSubmit" placeholder="DD/MM/YYYY">
        </div> 
      </div> -->
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label pl-4" for="gridCheck">
            &nbsp;Please confirm  the above data before submitting
          </label>
        </div>
      </div>
      <button id="submit-btn" type="submit" class="btn bg-red colorWhite" disabled>Submit</button>
    </form>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
            <h3>just-join.in</h3>
            <p>
              Narasaraopet <br />
              Guntur, Andrapradesh<br />
              <strong>Phone:</strong> +91 97 3636 6464, 97 3636 8484<br />
              <strong>Email:</strong> nagesh.justjoin@gmail.com<br />
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Quick Links</h4>
            <ul>
          <!--    <li><i class="bx bx-chevron-right"></i> <a href="/index.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#services">Services</a></li> -->
              <li><i class="bx bx-chevron-right"></i> <a href="/employer.php">Looking Employee</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/employee.php">Need Job</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/real-estate-seller.php">Sell Property</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/real-estate-buyer.php"> Buy Property</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/car-seller.php">Sell a Car</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/car-buyer.php"> Buy a Car</a></li>
            </ul>
          </div>

       <div class="col-lg-3 col-md-6 footer-links">
         <h4>Our Services</h4>
         <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/#manpower">Staffing Solutions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#realestate">Real Estate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#carzone">Pre-Owned Cars</a></li>
            </ul>
       </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>

            <div class="social-links mt-3">             
              <a href="https://www.facebook.com/profile.php?id=100075155240790" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/justjoin.in/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
             <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>-->
            </div>
          </div>

        </div>
      </div>
    </div>
    
     <!-- success modal -->
     <div class="modal" id="success-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Registration Successfully!</h3>
              
            </div>
            <div class="modal-body">
              <p>Thank you reaching us!<br>Our Team will reach you soon. </p>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <!-- <button type="button" class="btn btn-primary">Close</button> -->
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                <!-- <span aria-hidden="true">&times;</span> -->
                Close
              </button>
            </div>
          </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright"></div>
      <div class="credits">
        Designed by <a href="https://just-join.in/">Just Join</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="./assets/js/real-estate-buy.js"></script>

</body>

</html>