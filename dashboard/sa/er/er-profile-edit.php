<?php 
include '../../../snippets/edit-conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");


// $_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];    
// echo $id;
$roleAccess = $_SESSION["role"];
if ($roleAccess < 0) {
  header("location: ../../../admin/login.php");
  exit; // prevent further execution, should there be more code that follows
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Employer - Just Join</title>
  <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

    <!-- Favicons -->
    <link href="../../../assets/img/fav-jj.png" rel="icon">
    <link href="../../assets/img/fav-jj.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="../../../assets/css/style.css" rel="stylesheet">
  <style>
      .form-control{
          color: black
      }
  </style>
</head>

<body>

     <!-- ======= Header ======= -->
     <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="/"><img src="../../../assets/img/logo-trim.png"></a></h1>
       <!--     <nav class="nav-menu d-none d-lg-block">
              <ul>              
                <li><a href="../ep/saep-dashboard.php" class="btn btn-block">Employee</a></li>
                <li><a href="../er/saer-dashboard.php" class="btn btn-danger btn-block employee">Employer</a></li>
                <li><a href="../../../access.php" class="btn btn-block employer">Profile Access</a></li>
                <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
              </ul>
          </nav>--> 
                 <nav class="nav-menu d-none d-lg-block">
                 <ul>
                      <li class="drop-down scrolltoDrop"><a href="#">Staffing Solutions</a> 
                        <ul>
                        <li><a href="../ep/saep-dashboard.php" class="btn btn-block employee">Employee</a></li>
                        <li><a href="./saer-dashboard.php" class="btn btn-danger btn-block">Employer</a></li>
                        </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Realestate</a> 
                        <ul>
                            <li><a href="../rb/sarb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../rb/sars-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Pre-Owned Cars</a> 
                        <ul>
                            <li><a href="../cb/sacb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../cs/sacs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li><?php echo $roleAccess == 1 ? '<a href="../../../access.php" class="btn btn-block employer">Profile Access</a>' : ''; ?></li>
                      <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                      <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                     </ul>
                 </nav>
        </div>
    </header>
  <div class="container mt160 shadow-sm bg-white rounded">
  <?php
        $query = "SELECT * FROM employer WHERE id = $id";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
    ?>
    <div class="panel employer-panel-primary date-of-reg">
      <div class="panel-heading">Employee id: JJIN<?php echo $id?><p>Registered on: <?php echo $row['date_of_registered']?></div>
      <input type="hidden" id="employerID" value="<?php echo $id?>">
    </div>

    <form id='employer-form' class="employer-form">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="employerName">Name<span class="mandatory">*</span></label>
          <input type="text" class="form-control" id="employerName" placeholder="Name" value="<?php echo $row['name']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="employerDesignation">Designation in your organization</label>
          <input type="text" class="form-control" id="employerDesignation"
            placeholder="Chairman, Director, Incharge..." value="<?php echo $row['designation']?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="organizationType">Select organization type</label>
          <select id="organizationType" class="form-control">
            <option value="null">Choose...</option>
            <option <?php echo $row['organization_type'] == 'School' ? 'selected = "selected"' : '';?>>School</option>
            <option <?php echo $row['organization_type'] == 'College' ? 'selected = "selected"' : '';?>>College</option>
            <option <?php echo $row['organization_type'] == 'Hospital' ? 'selected = "selected"' : '';?>>Hospital</option>
            <option <?php echo $row['organization_type'] == 'Super Markets' ? 'selected = "selected"' : '';?>>Super Markets</option>
            <option <?php echo $row['organization_type'] == 'Malls' ? 'selected = "selected"' : '';?>>Malls</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="organisationName">Name of your organisation</label>
          <input type="text" class="form-control" id="organisationName"
            placeholder="EX: School, College, Hospital..." value="<?php echo $row['organization_name']?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="employerPhoneNumber">Phone Number<span class="mandatory">*</span></label>
          <input type="number" class="form-control" id="employerPhoneNumber" placeholder="Phone Number" pattern="pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="<?php echo $row['phone_number']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="employerEmail">Email</label>
          <input type="email" class="form-control" id="employerEmail" placeholder="Email" value="<?php echo $row['email']?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="employerAadhar">Aadhar Number</label>
          <input type="number" class="form-control" id="employerAadhar" placeholder="Aadhare Number (optional)" value="<?php echo $row['aadhar']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="employerAddress">Address<span class="mandatory">*</span></label>
          <textarea type="text" class="form-control" id="employerAddress" placeholder="Full Address"
           ><?php echo $row['address']?></textarea>
        </div>
      </div>


      <div class="form-row">
        <div class="form-group col-md-12">
          <div class="panel panel-danger">
            <div class="panel-heading">Please Fill Requirement Details Below</div>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="employeeCategory">Looking for employee category</label>
          <select id="employeeCategory" class="form-control">
            <option value="null">Choose...</option>
            <option <?php echo $row['emp_category'] == 'School' ? 'selected = "selected"' : '';?>>School</option>
            <option <?php echo $row['emp_category'] == 'College' ? 'selected = "selected"' : '';?>>College</option>
            <option <?php echo $row['emp_category'] == 'Hospital' ? 'selected = "selected"' : '';?>>Hospital</option>
            <option <?php echo $row['emp_category'] == 'Super Markets' ? 'selected = "selected"' : '';?>>Super Markets</option>
            <option <?php echo $row['emp_category'] == 'Malls' ? 'selected = "selected"' : '';?>>Malls</option>
            <option <?php echo $row['emp_category'] == 'Others' ? 'selected = "selected"' : '';?>>Others</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="employeeJobType">Job Type</label>
          <select name="defaultDropdown" id="defaultDropdown" class="form-control">
            <option value="null">Select Organization</option>
          </select> 
          <select id="employeeJobType" class="form-control school dropdown">
            <option>Choose School Staff</option>
            <option value="Teacher" <?php echo $row['emp_job_type'] == 'Teacher' ? 'selected = "selected"' : '';?>>Teacher</option>
            <option value="Accountants" <?php echo $row['emp_job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Administrative Staff" <?php echo $row['emp_job_type'] == 'Administrative Staff' ? 'selected = "selected"' : '';?>>Administrative Staff</option>
            <option value="Front Office Staff" <?php echo $row['emp_job_type'] == 'Front Office Staff' ? 'selected = "selected"' : '';?>>Front Office Staff</option>
            <option value="Security Guards" <?php echo $row['emp_job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Bus and Van Drivers" <?php echo $row['emp_job_type'] == 'Bus and Van Drivers' ? 'selected = "selected"' : '';?>>Bus and Van Drivers</option>
            <option value="Sweepers" <?php echo $row['emp_job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Watchman" <?php echo $row['emp_job_type'] == 'Watchman' ? 'selected = "selected"' : '';?>>Watchman</option>
          </select>
          <select id="employeeJobType" class="form-control college dropdown">
            <option value="null">Choose College Staff</option>
            <option value="Lecturers" <?php echo $row['emp_job_type'] == 'Lecturers' ? 'selected = "selected"' : '';?>>Lecturers</option>
            <option value="Accountants" <?php echo $row['emp_job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Front Office Staff" <?php echo $row['emp_job_type'] == 'Front Office Staff' ? 'selected = "selected"' : '';?>>Front Office Staff</option>
            <option value="Administrative Staff" <?php echo $row['emp_job_type'] == 'Administrative Staff' ? 'selected = "selected"' : '';?>>Administrative Staff</option>
            <option value="Security Guards" <?php echo $row['emp_job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Bus and Van Drivers" <?php echo $row['emp_job_type'] == 'Bus and Van Drivers' ? 'selected = "selected"' : '';?>>Bus and Van Drivers</option>
            <option value="Sweepers" <?php echo $row['emp_job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Watchman" <?php echo $row['emp_job_type'] == 'Watchman' ? 'selected = "selected"' : '';?>>Watchman</option>
          </select>
          <select id="employeeJobType" class="form-control hospital dropdown">
            <option value="null">Choose Hospital Staff</option>
            <option value="Nurses" <?php echo $row['emp_job_type'] == 'Nurses' ? 'selected = "selected"' : '';?>>Nurses</option>
            <option value="Lab Technicians" <?php echo $row['emp_job_type'] == 'Lab Technicians' ? 'selected = "selected"' : '';?>>Lab Technicians</option>
            <option value="X-Ray Technicians" <?php echo $row['emp_job_type'] == 'X-Ray Technicians' ? 'selected = "selected"' : '';?>>X-Ray Technicians</option>
            <option value="Front Office Staff" <?php echo $row['emp_job_type'] == 'Front Office Staff' ? 'selected = "selected"' : '';?>>Front Office Staff</option>
            <option value="Accountants" <?php echo $row['emp_job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Security Guards" <?php echo $row['emp_job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Sweepers" <?php echo $row['emp_job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Watchman" <?php echo $row['emp_job_type'] == 'Watchman' ? 'selected = "selected"' : '';?>>Watchman</option>
          </select>
          <select id="employeeJobType" class="form-control super_markets dropdown">
            <option value="null">Choose Super Market Staff</option>  
            <option value="Sales Boys/Girls" <?php echo $row['emp_job_type'] == 'Sales Boys/Girls' ? 'selected = "selected"' : '';?>>Sales Boys/Girls</option>    
            <option value="Cashiers" <?php echo $row['emp_job_type'] == 'Cashiers' ? 'selected = "selected"' : '';?>>Cashiers</option>     
            <option value="Accountants" <?php echo $row['emp_job_type'] == 'Accountants' ? 'selected = "selected"' : '';?>>Accountants</option>
            <option value="Security Guards" <?php echo $row['emp_job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
            <option value="Sweepers" <?php echo $row['emp_job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
          </select>
          <select id="employeeJobType" class="form-control malls dropdown">
            <option value="null">Choose Malls Staff</option>           
            <option value="Sales Boys/Girls" <?php echo $row['emp_job_type'] == 'Sales Boys/Girls' ? 'selected = "selected"' : '';?>>Sales Boys/Girls</option>
            <option value="Supervisors" <?php echo $row['emp_job_type'] == 'Supervisors' ? 'selected = "selected"' : '';?>>Supervisors</option>
            <option value="Assistant Managers" <?php echo $row['emp_job_type'] == 'Assistant Managers' ? 'selected = "selected"' : '';?>>Assistant Managers</option>
            <option value="Sweepers" <?php echo $row['emp_job_type'] == 'Sweepers' ? 'selected = "selected"' : '';?>>Sweepers</option>
            <option value="Security Guards" <?php echo $row['emp_job_type'] == 'Security Guards' ? 'selected = "selected"' : '';?>>Security Guards</option>
          </select>
          <input class="form-control others dropdown" type="text" id="employeeJobTypeOthers" placeholder="Employee Type" value="<?php echo $row['emp_job_type']?>">
          </div> 
        <div class="form-group col-md-4">
          <label for="employeePositions">No of Positions</label>
          <input class="form-control" type="number" id="employeePositions" placeholder="Ex: 1, 2, 5, 8" value="<?php echo $row['no_positions']?>">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="employeeGender">Gender</label>
          <select id="employeeGender" class="form-control">
            <option value="null">Choose...</option>
            <option <?php echo $row['gender'] == 'Male' ? 'selected = "selected"' : '';?>>Male</option>
            <option <?php echo $row['gender'] == 'Female' ? 'selected = "selected"' : '';?>>Female</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="employeeExperience">Experience</label>
          <input class="form-control" type="text" id="employeeExperience" placeholder="Ex: 2yrs" value="<?php echo $row['experience']?>">
        </div>
        <div class="form-group col-md-2">
          <label for="employeeSalaryMin">Salary Min</label>
          <input class="form-control" type="text" id="employeeSalaryMin" placeholder="Ex: 10,000" value="<?php echo $row['salary_min']?>">
        </div>
        <div class="form-group col-md-2">
          <label for="employeeSalaryMax">Salary Max</label>
          <input class="form-control" type="text" id="employeeSalaryMax" placeholder="Ex: 20,000" 
          value="<?php echo $row['salary_max']?>">
        </div>
        <div class="form-group col-md-4">
        <label for="employerStatus">Employee Joining Status</label>
          <select id="employerStatus" class="form-control <?php echo $row['employer_status'] == 'Complete' ? 'green' : 'gray';?>">
            <option value="Progress" <?php echo $row['employer_status'] == 'Progress' ? 'selected = "selected"' : '';?>>Progress</option>
            <option value="Complete" <?php echo $row['employer_status'] == 'Complete' ? 'selected = "selected"' : '';?>>Complete</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="employeeReached">Contacted?</label>
          <select id="employerReached" class="form-control <?php echo $row['reached'] == 'Reached' ? 'green' : 'gray';?>">
            <option value="Reached" <?php echo $row['reached'] == 'Reached' ? 'selected = "selected"' : '';?>>Reached</option>
            <option value="Not Reached" <?php echo $row['reached'] == 'Not Reached' ? 'selected = "selected"' : '';?>>Not Reached</option>
          </select>
        </div>  
        <div class="form-group col-md-4">
          <label for="employeePaid">Paid?</label>
          <select id="employerPaid" class="form-control <?php echo $row['paid'] == 'Paid' ? 'green' : 'gray';?>">
            <option value="Paid" <?php echo $row['paid'] == 'Paid' ? 'selected = "selected"' : '';?>>Paid</option>
            <option value="Unpaid" <?php echo $row['paid'] == 'Unpaid' ? 'selected = "selected"' : '';?>>Unpaid</option>
          </select>
        </div>  
        <div class="form-group col-md-12">
          <label for="employeeReachedComment">Response from the employee</label>
          <textarea type="text" class="form-control" id="employeeReachedComment" placeholder="Customer Feedback.."><?php echo $row['employee_comment']?></textarea>
        </div>
      </div>
      <?php
        }
    ?>
      <button id="submit" type="submit" class="btn btn-primary btn-lg" style="margin-right: 10px">Update</button>
      <a href="./saer-dashboard.php" class="btn btn-danger btn-lg">Cancel</a>
    </form>

  </div>

  <!-- ======= Footer ======= -->
  <!--<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Just Join</h3>
            <p>
              Narasaraopet <br>
              Guntur, Andrapradesh<br>
              <strong>Phone:</strong> +91 9632642380<br>
              <strong>Email:</strong> nagesh.kankanampati@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="employer.php">Looking Employee?</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="employee.php">Need Job?</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Man power</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Real Estate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Car Buy/ Sell</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>

            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Just Join</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https:www.justjoin.in">Just Join</a>
      </div>
    </div>
  </footer>-->
  <!-- End Footer -->

       <!-- success modal -->
       <div class="modal" id="success-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Updated Successfully!</h3>
  
            </div>
            <div class="modal-body">
              <p>Thank you!</p>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <!-- <button type="button" class="btn btn-primary">Close</button> -->
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" onclick="return location.reload();">
                Close
              </button>
            </div>
          </div>
        </div>
    </div>

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
  <script src="../../../assets/js/sa/er-edit.js"></script>

</body>

</html>