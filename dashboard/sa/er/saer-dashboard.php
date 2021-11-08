<?php
include '../../../snippets/conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");

// do check
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

    <title>Just Join -Employer  Dashboard</title>
    <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
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
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    

    <!-- <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet">

    <style>
        #hero {
            padding-top: 60px;
            margin: 0;
        }

        .block {
            width: 100%;
        }
        .ico-gray{
            color: #cdcdcd;
        }
        .ico-red{
            color: red;
        }
        .ico-green{
            color: green;
        }
        .pt-0{
            padding-top: 0 !important;
        }
        .pr-5{
            padding-right: 5px;
        }
        #loading
        {
            text-align:center; 
            background: url('../../../assets/img/loader.gif') no-repeat center; 
            height: 150px;
        }
        #search_key{
            margin-bottom: 10px
        }
        #search_key:focus{
            box-shadow: none
        }
        #data-not-found{
            color: red
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="../../../index.html"><img src="../../../assets/img/logo-trim.png"></a></h1>
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
                 </nav>        </div>
    </header>

    <!-- ======= Hero Section ======= -->
    <?php       
        
        $dataSchools = array();
        $dataSchoolsCat = array();
        $sqlSchool = "SELECT * FROM employer  WHERE emp_category = 'School' && (employer_status='Complete' || employer_status='Progress') ORDER BY id DESC";
        $resultSchool = $conn->query($sqlSchool);
        if($resultSchool){
            while($rowSchool = $resultSchool->fetch_assoc()) {
                $dataSchoolsCat[] = $rowSchool['emp_category'];
                $dataSchools[] = $rowSchool['employer_status'];
            }
        }
        foreach($dataSchoolsCat as $ss){ 
            $dataSchoolsCat =  $ss;
        } 

        $dataColleges = array();
        $dataCollegesCat = array();
        $sqlCollege = "SELECT * FROM employer  WHERE emp_category = 'College' && (employer_status='Complete' || employer_status='Progress') ORDER BY id DESC";
        $resultCollege = $conn->query($sqlCollege);
        if($resultCollege){
            while($rowCollege = $resultCollege->fetch_assoc()) {
                $dataCollegesCat[] = $rowCollege['emp_category'];
                $dataColleges[] = $rowCollege['employer_status'];
            }
        }
        foreach($dataCollegesCat as $cc){ 
            $dataCollegesCat =  $cc;
        } 

        $dataHospitals = array();
        $dataHospitalsCat = array();
        $sqlHospital = "SELECT * FROM employer WHERE emp_category = 'Hospital' && (employer_status='Complete' || employer_status='Progress') ORDER BY id DESC";
        $resultHospital = $conn->query($sqlHospital);
        if($resultHospital){
            while($rowHospital = $resultHospital->fetch_assoc()) {
                $dataHospitalsCat[] = $rowHospital['emp_category'];
                $dataHospitals[] = $rowHospital['employer_status'];
            }
        }
        
        foreach($dataHospitalsCat as $hh){ 
            $dataHospitalsCat =  $hh;
        } 

        $dataSuperMarketss = array();
        $dataSuperMarketssCat = array();
        $sqlSuperMarkets = "SELECT * FROM employer WHERE emp_category = 'Super Markets' && (employer_status='Complete' || employer_status='Progress') ORDER BY id DESC";
        $resultSuperMarkets = $conn->query($sqlSuperMarkets);
        if($resultSuperMarkets){
            while($rowSuperMarkets = $resultSuperMarkets->fetch_assoc()) {
                $dataSuperMarketssCat[] = $rowSuperMarkets['emp_category'];
                $dataSuperMarketss[] = $rowSuperMarkets['employer_status'];
            }
        }
        foreach($dataSuperMarketssCat as $smm){ 
            $dataSuperMarketssCat =  $smm;
        } 

        $dataMallss = array();
        $dataMallssCat = array();
        $sqlMalls = "SELECT * FROM employer WHERE emp_category = 'Malls' && (employer_status='Complete' || employer_status='Progress') ORDER BY id DESC";
        $resultMalls = $conn->query($sqlMalls);
        if($resultMalls){
            while($rowMalls = $resultMalls->fetch_assoc()) {
                $dataMallssCat[] = $rowMalls['emp_category'];
                $dataMallss[] = $rowMalls['employer_status'];
            }
        }
        foreach($dataMallssCat as $dm){ 
            $dataMallssCat =  $dm;
        } 
        
        $sql = "SELECT * FROM employer ORDER BY id DESC";
        $result = $conn->query($sql);
        $rowsCount = mysqli_num_rows($result);
        if ($result->num_rows > 0) {

        // Total Completed
        $sqlActive = "SELECT * FROM employer WHERE employer_status = 'Complete'";
        $activeResult = $conn->query($sqlActive);
        $activeTotal = mysqli_num_rows($activeResult);
        if ($activeResult->num_rows > 0){
            $len = $activeTotal;
        }
        else{
            $len = 0;
        }

        // Total In Completed
        $sqlInActive = "SELECT * FROM employer WHERE employer_status = 'Progress'";
        $inActiveResult = $conn->query($sqlInActive);
        $inActiveTotal = mysqli_num_rows($inActiveResult);
        if ($inActiveResult->num_rows > 0){
            $inLen = $inActiveTotal;
        }
        else{
            $inLen = 0;
        }
        
        ?>
    <div class="container pt-130">
    <div class="panel employer-panel-primary">
      <div class="panel-heading">Employer </div>      
    </div>
    <div class="row m-0 collapse_bar shadow-sm bg-white rounded">
        <div class="col-md-2 col-xs-4">
            <div class="row">
               <label class="col-12">School</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                   <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $schoolCompletedData = '';
                                                if ($dataSchoolsCat == 'School') {
                                                    $schoolCompleted=mysqli_query($conn, "SELECT count(*) as schoolCompleteTotal FROM employer WHERE emp_category = 'School' GROUP BY emp_category");
                                                    $schoolCompletedData=mysqli_fetch_assoc($schoolCompleted);
                                                    echo $schoolCompletedData['schoolCompleteTotal'];
                                                    $schoolCompletedData = implode("", $schoolCompletedData);
                                                }
                                                else{
                                                    $schoolCompletedData = 0;
                                                    echo $schoolCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                    $schoolInCompletedData = '';
                                                    foreach($dataSchools as $s){
                                                        if ($dataSchoolsCat == 'School' && $s == 'Complete') {
                                                            $schoolInCompleted=mysqli_query($conn, "SELECT count(*) as schoolInCompleteTotal FROM employer WHERE emp_category = 'School' && employer_status = 'Complete' GROUP BY emp_category");
                                                            $schoolInCompletedData=mysqli_fetch_assoc($schoolInCompleted);
                                                            echo $schoolInCompletedData['schoolInCompleteTotal'];
                                                            $schoolInCompletedData = implode("", $schoolInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataSchoolsCat !== 'School' || $s == 'Progress'){
                                                        $schoolInCompletedData = 0;
                                                        echo $schoolInCompletedData;
                                                    }                                       
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $schoolCompletedData - $schoolInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <!-- College -->
        <div class="col-md-2 col-xs-4">
            <div class="row">
               <label class="col-12">College</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                    <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $collegeCompletedData = '';
                                                if ($dataCollegesCat == 'College') {
                                                    $collegeCompleted=mysqli_query($conn, "SELECT count(*) as collegeCompleteTotal FROM employer WHERE emp_category = 'College' GROUP BY emp_category");
                                                    $collegeCompletedData = mysqli_fetch_assoc($collegeCompleted);
                                                    echo $collegeCompletedData['collegeCompleteTotal'];
                                                    $collegeCompletedData = implode("", $collegeCompletedData);
                                                }
                                                else{
                                                    $collegeCompletedData = 0;
                                                    echo $collegeCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                    $collegeInCompletedData = '';
                                                    foreach($dataColleges as $c){
                                                        if ($dataCollegesCat == 'College' && $c == 'Complete') {
                                                            $collegeInCompleted=mysqli_query($conn, "SELECT count(*) as collegeInCompleteTotal FROM employer WHERE emp_category = 'College' && employer_status = 'Complete' GROUP BY emp_category");
                                                            $collegeInCompletedData=mysqli_fetch_assoc($collegeInCompleted);
                                                            echo $collegeInCompletedData['collegeInCompleteTotal'];
                                                            $collegeInCompletedData = implode("", $collegeInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataCollegesCat !== 'College' || $c == 'Progress'){
                                                        $collegeInCompletedData = 0;
                                                        echo $collegeInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $collegeCompletedData - $collegeInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <!-- Hospital -->
        <div class="col-md-3 col-xs-4">
            <div class="row">
               <label class="col-12">Hospital</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                    <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $hospitalCompletedData = '';
                                                if ($dataHospitalsCat == 'Hospital') {
                                                    $hospitalCompleted=mysqli_query($conn, "SELECT count(*) as hospitalCompleteTotal FROM employer WHERE emp_category = 'Hospital' GROUP BY emp_category");
                                                    $hospitalCompletedData=mysqli_fetch_assoc($hospitalCompleted);
                                                    echo $hospitalCompletedData['hospitalCompleteTotal'];
                                                    $hospitalCompletedData = implode("", $hospitalCompletedData);
                                                }
                                                else{
                                                    $hospitalCompletedData = 0;
                                                    echo $hospitalCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                    $hospitalInCompletedData = '';
                                                    foreach($dataHospitals as $h){
                                                        if ($dataHospitalsCat == 'Hospital' && $h == 'Complete') {
                                                            $hospitalInCompleted=mysqli_query($conn, "SELECT count(*) as hospitalInCompleteTotal FROM employer WHERE emp_category = 'Hospital' && employer_status = 'Complete' GROUP BY emp_category");
                                                            $hospitalInCompletedData=mysqli_fetch_assoc($hospitalInCompleted);
                                                            echo $hospitalInCompletedData['hospitalInCompleteTotal'];
                                                            $hospitalInCompletedData = implode("", $hospitalInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataHospitalsCat !== 'Hospital' || $h == 'Progress'){
                                                        $hospitalInCompletedData = 0;
                                                        echo $hospitalInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $hospitalCompletedData - $hospitalInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <!-- Super Markets -->
        <div class="col-md-3 col-xs-4">
            <div class="row">
               <label class="col-12">Super Markets</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                     <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $superMarketsCompletedData = '';
                                                if ($dataSuperMarketssCat == 'Super Markets') {
                                                    $superMarketsCompleted=mysqli_query($conn, "SELECT count(*) as superMarketsCompleteTotal FROM employer WHERE emp_category = 'Super Markets' GROUP BY emp_category");
                                                    $superMarketsCompletedData=mysqli_fetch_assoc($superMarketsCompleted);
                                                    echo $superMarketsCompletedData['superMarketsCompleteTotal'];
                                                    $superMarketsCompletedData = implode("", $superMarketsCompletedData);
                                                }
                                                else{
                                                    $superMarketsCompletedData = 0;
                                                    echo $superMarketsCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php
                                                    $superMarketsInCompletedData = '';
                                                    foreach($dataSuperMarketss as $smm){
                                                        if ($dataSuperMarketssCat == 'Super Markets' && $smm == 'Complete') {
                                                            $superMarketsInCompleted=mysqli_query($conn, "SELECT count(*) as superMarketsInCompleteTotal FROM employer WHERE emp_category = 'Super Markets' && employer_status = 'Complete' GROUP BY emp_category");
                                                            $superMarketsInCompletedData=mysqli_fetch_assoc($superMarketsInCompleted);
                                                            echo $superMarketsInCompletedData['superMarketsInCompleteTotal'];
                                                            $superMarketsInCompletedData = implode("", $superMarketsInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataSuperMarketssCat !== 'Super Markets' || $smm == 'Progress'){
                                                        $superMarketsInCompletedData = 0;
                                                        echo $superMarketsInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $superMarketsCompletedData - $superMarketsInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-4">
            <div class="row">
               <label class="col-12">Malls</label>
            </div>
            <div class="row">
               <div class="col-12">
                    <div class="row">
                            <div class="col-12 text-center">
                                <table class="col-12">
                                    <tr>
                                        <td><p class="badge-secondary count-num">T</p></td>
                                        <td><p class="badge-success count-num">C</p></td>                                        
                                        <td><p class="badge-danger count-num">P</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                $mallsCompletedData = '';
                                                if ($dataMallssCat == 'Malls') {
                                                    $mallsCompleted=mysqli_query($conn, "SELECT count(*) as mallsCompleteTotal FROM employer WHERE emp_category = 'Malls' GROUP BY emp_category");
                                                    $mallsCompletedData=mysqli_fetch_assoc($mallsCompleted);
                                                    echo $mallsCompletedData['mallsCompleteTotal'];
                                                    $mallsCompletedData = implode("", $mallsCompletedData);
                                                }
                                                else{
                                                    $mallsCompletedData = 0;
                                                    echo $mallsCompletedData;
                                                }
                                                
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                    $mallsInCompletedData = '';
                                                    foreach($dataMallss as $dm){
                                                        if ($dataMallssCat == 'Malls' && $dm == 'Complete') {
                                                            $mallsInCompleted=mysqli_query($conn, "SELECT count(*) as mallsInCompleteTotal FROM employer WHERE emp_category = 'Malls' && employer_status = 'Complete' GROUP BY emp_category");
                                                            $mallsInCompletedData=mysqli_fetch_assoc($mallsInCompleted);
                                                            echo $mallsInCompletedData['mallsInCompleteTotal'];
                                                            $mallsInCompletedData = implode("", $mallsInCompletedData);
                                                            break;
                                                        }
                                                    } 
                                                    if($dataMallssCat !== 'Malls' || $dm == 'Progress'){
                                                        $mallsInCompletedData = 0;
                                                        echo $mallsInCompletedData;
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="count-num">
                                                <?php 
                                                echo $mallsCompletedData - $mallsInCompletedData;
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                  
               </div>
            </div>
        </div>
     </div>
    </div>
    </div>
<!-- requirement details end -->

    <section class="container">
        <div class="row">
            <div class="col-md-3 col-xs-4 d-flex align-items-center">
                <div class="total">Total Unread: <span id="newArrival">0</span></div>
            </div>
            <div class="col-md-3 col-xs-4 d-flex align-items-center">
                <div class="total">Today Unread: <span id="todayNewArrival">0</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="form-outline">
                    <input type="search" id="search_key" class="form-control" placeholder="Search record.."
                    aria-label="Search" />
                </div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total">Total: <?php echo $rowsCount;?></div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total">Completed: <?php echo $len?></div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total">Pending: <?php echo $inLen?></div>
            </div>
            <div class="col-md-2 col-xs-4 d-flex align-items-center">
                <div class="total"><a href="./export.php" class="download-file">Download</a></div>
            </div>
        </div>
        <div class="row block">
            <div class="col-lg-12 table-responsive shadow-sm bg-white rounded" id="table_container">
                <table class="table table-bordered" id="table_main">
                        <thead>
                            <tr class="table-info table-th-blue">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php
                                while($row = $result->fetch_assoc()) {
                                    $new = $row["read_record"] == 0 ? ' new' : '';
                                    $roleAccess == 1 ? $delete = '<a href="javascript:void(0)" class="" onclick="return del('.$row["id"].');"><span class="glyphicon glyphicon-trash red-color"></span></a>' : $delete = '';
                                    echo '<tr class="each-row'.$new.'" data-id="'.$row["id"].'">
                                        <td>JJIN'.$row["id"].'</td>
                                        <td>'.$row["name"].'</td>
                                        <td>'.$row["organization_type"].'</td>
                                        <td>'.$row["phone_number"].'</td>
                                        <td>'.$row["address"].'</td>
                                        <td>'.$row["employer_status"].'</td>
                                        <td><a href="javascript:void(0)" class="pr-3" onclick="return edit('.$row["id"].');"><span class="glyphicon glyphicon-edit blue-color"></span></a>
                                        <a href="javascript:void(0)" class="pr-3" onclick="return view('.$row["id"].');"><span class="glyphicon glyphicon-eye-open blue-color"></span></span></a>
                                        '.$delete.'</td>
                                        <input type="hidden" class="regDate" value="'.$row['date_of_registered'].'"/>
                                        </tr>';
                                }
                            } else {
                                echo "<td><td>No Data Found</td></tr>";
                            }
                                $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <div id="data-not-found"></div>
                </div>
            </div>
        </section>

     <!-- success modal -->
     <div class="modal" id="success-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Deleted Successfully!</h3>
             
            </div>
            <div class="modal-body">
              <p>Thank you reaching us!<br>Our Team will reach you soon. </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                Close
              </button>
            </div>
          </div>
        </div>
    </div>

    
    <!-- <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div> -->
  
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../../../assets/vendor/php-email-form/validate.js"></script>
    <script src="../../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../../../assets/vendor/aos/aos.js"></script> -->
  
<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>
 <!-- <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>-->

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
  <script>  
  function newCount(){
    $('.each-row').each(function(){
        let d = $(this).find('.regDate').val();
        if(d === new Date().toISOString().replace(/T.*/,'').split('-').reverse().join('-') && $(this).hasClass('new')){
            $(this).find('.regDate').addClass("today");
            $('#todayNewArrival').text($('.today').length);
        }else {
            $(this).find('.regDate').removeClass("today");
            $('#todayNewArrival').text($('.today').length);
        }
    });
    $("#newArrival").text($(".new").length); 
}   
$(document).ready(function(){
    newCount();

    $('.each-row').each(function(){
        $(this).on('click', function(){
            let attr = $(this).attr('data-id');
            updateStatus(attr);
            // remove class
            if($(this).hasClass('new')){
                $(this).removeClass('new');
            }
            $(this).find('.regDate').removeClass("today");
            $("#newArrival").text($(".new").length);
            $("#todayNewArrival").text($(".today").length);
            // newCount();
        });
    });
    
    $("#search_key").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tbody tr:not('.no-records')").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        var trSel =  $("#tbody tr:not('.no-records'):visible")
        // Check for number of rows & append no records found row
        if(trSel.length == 0){
            $("#data-not-found").html('<p>Data not found</p>');
        }
        else{
            $('.no-records').remove();
            $("#data-not-found").html('');
        }
    });

    // page reload
    setInterval(() => {
        location.reload();
    }, 100000);
});

function updateStatus(id){
    newCount();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            console.log(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "update.php?id=" +id, true);
    xmlhttp.send();

}
// edit 
function edit(id){
    window.open('./er-profile-edit.php?id='+id, '_self');
}
function view(id){
    window.open('./view.php?id='+id, '_blank');
}
function del(delId){
    let sure = confirm("Do you want to delete?");
    if (sure == false) {
        return false;
    }
    else {
            $.ajax({
                url: "./er-del.php",
                action: 'delete',
                data: {delId : delId},
                type: "POST",
                success: function(data){
                    // alert('deleted');
                    location.reload();
                },
                error: function(){
                alert('error');
                }
            });
        }
}
</script>
</body>

</html>