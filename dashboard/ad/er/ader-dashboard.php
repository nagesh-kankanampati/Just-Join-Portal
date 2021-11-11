<?php
include '../../../snippets/conn.php';
session_start(); // start session

header("Pragma: no-cache");
header("cache-Control: no-cache, must-revalidate");

// do check
$roleAccess = $_SESSION["role"];
if ($roleAccess != 0) {
  header("location: ../../../admin/login.php");
  exit; // prevent further execution, should there be more code that follows
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Just Join -Employee  Dashboard</title>
    <meta 
    content="Just Join (JJ) is a multi-services corporate entity established in 2021 by a visionary entrepreneur with prowess in recruitment and staffing solutions, realestate, and pre-owned cars segment. We are a multi-service provider from facilitating the white-collar and blue-collar staffing needs, real-estate requirements viz. open plots, villas, apartments, or independent houses to people desiring to purchase second-hand cars, Just Join (JJ) multi-services, would meet their needs and accomplish them in a professional nature and in a trust-worthy manner.Just Join (JJ) multi-services are a corporate entity administered by Mr. Kankanampati Nageswara Rao, a visionary entrepreneur. He has an immense prowess in recruitment and staffing solutions to schools, colleges, hospitals, shopping malls and others. To facilitate recruitment and staffing solutions, Just Join (JJ) will do all the pre-screening process which includes securing the resumes, verifying the credentials, twice conducts the pre-screening interview to the candidates to assess their attitude and aptitude, before developing a final database, which is updated monthly. Mr.Nageswara Rao is a most versatile resource to seek his advice's in staffing requirements, staff planning and policy, business expansion plans. With his prowess, he would be glad to extend support in the aforesaid needs and advice's in a professional manner."
    name="description">
  <meta
    content="Just Join, JJ, Searching Jobs in Narasaraopet, Narasaraopet Jobs, Manpower, Real estate, Car sale, car buyer, Looking second hand cars, Job Consultancy, Job Agency"
    name="keywords">

    <!-- Favicons -->
    <link href="../../../assets/img/fav-jj.png" rel="icon">
    <link href="../../../assets/img/fav-jj.png" rel="apple-touch-icon">

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
            padding-right: 5px
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
          
            <nav class="nav-menu d-none d-xl-block">
                <ul>                
                    <li class="drop-down scrolltoDrop"><a href="#">Staffing Solutions</a> 
                        <ul>
                            <li><a href="../ep/adep-dashboard.php" class="btn btn-danger btn-block">Employee</a></li>
                            <li><a href="../er/ader-dashboard.php" class="btn btn-block employee">Employer</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Realestate</a> 
                        <ul>
                            <li><a href="../rb/adrb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../rs/adrs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                      <li class="drop-down scrolltoDrop"><a href="#">Pre-Owned Cars</a> 
                        <ul>
                            <li><a href="../cb/adcb-dashboard.php" class="employee">Buyer</a></li>
                            <li><a href="../cs/adcs-dashboard.php" class="employer">Seller</a></li>
                          </ul>
                      </li>
                  <!--  <li><a href="../ep/adep-dashboard.php" class="btn btn-block">Employee</a></li>
                    <li><a href="../er/ader-dashboard.php" class="btn  btn-danger btn-block employee">Employer</a></li>-->
                    <li class="pt-0 pl-0"> <a href="javascript:void(0)" class="employer-btn scrollto"><?php echo $_SESSION["username"]?></a></li>
                    <li class="pt-0 pl-0"><a href = "../../../snippets/logout.php" class="employee-btn scrollto">Logout</a></li>
                </ul>
              </nav>
        </div>
    </header>

    <!-- ======= Hero Section ======= -->
    <!-- <section class="container">
    <div class="row block" id="hero">
    <div class="col-lg-12 p-0"><a href="../ep/adep-dashboard.php" class="btn btn-block employee">Go to Employee</a></div>
        </div>
    </section> -->
    <?php       
        
        $dataSchools = array();
        $dataSchoolsCat = array();
        $sqlSchool = "SELECT * FROM employer  WHERE emp_category = 'School' && (employer_status='Active' || employer_status='In Active') ORDER BY id DESC";
        $resultSchool = $conn->query($sqlSchool);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultSchool){
            while($rowSchool = $resultSchool->fetch_assoc()) {
                $dataSchoolsCat[] = $rowSchool['emp_category'];
                $dataSchools[] = $rowSchool['employer_status'];
            }
        }
        // foreach($dataSchools as $s){ 
        //     $dataSchools =  $s;
        // } 
        foreach($dataSchoolsCat as $ss){ 
            $dataSchoolsCat =  $ss;
        } 

        $dataColleges = array();
        $dataCollegesCat = array();
        $sqlCollege = "SELECT * FROM employer  WHERE emp_category = 'College' && (employer_status='Active' || employer_status='In Active') ORDER BY id DESC";
        $resultCollege = $conn->query($sqlCollege);
        // $rowsCountCollege = mysqli_num_rows($resultCollege);
        if($resultCollege){
            while($rowCollege = $resultCollege->fetch_assoc()) {
                $dataCollegesCat[] = $rowCollege['emp_category'];
                $dataColleges[] = $rowCollege['employer_status'];
            }
        }
        // foreach($dataColleges as $c){ 
        //     $dataColleges =  $c;
        // } 
        foreach($dataCollegesCat as $cc){ 
            $dataCollegesCat =  $cc;
        } 

        $dataHospitals = array();
        $dataHospitalsCat = array();
        $sqlHospital = "SELECT * FROM employer WHERE emp_category = 'Hospital' && (employer_status='Active' || employer_status='In Active') ORDER BY id DESC";
        $resultHospital = $conn->query($sqlHospital);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultHospital){
            while($rowHospital = $resultHospital->fetch_assoc()) {
                $dataHospitalsCat[] = $rowHospital['emp_category'];
                $dataHospitals[] = $rowHospital['employer_status'];
            }
            // $dataHospital[0]['emp_category'];
        }
        // foreach($dataHospitals as $h){ 
        //     $dataHospitals =  $h;
        //     echo $dataHospitals;
        // } 
        
        foreach($dataHospitalsCat as $hh){ 
            $dataHospitalsCat =  $hh;
        } 

        $dataSuperMarketss = array();
        $dataSuperMarketssCat = array();
        $sqlSuperMarkets = "SELECT * FROM employer WHERE emp_category = 'Super Markets' && (employer_status='Active' || employer_status='In Active') ORDER BY id DESC";
        $resultSuperMarkets = $conn->query($sqlSuperMarkets);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultSuperMarkets){
            while($rowSuperMarkets = $resultSuperMarkets->fetch_assoc()) {
                $dataSuperMarketssCat[] = $rowSuperMarkets['emp_category'];
                $dataSuperMarketss[] = $rowSuperMarkets['employer_status'];
            }
            // $dataSuperMarkets[0]['emp_category'];
        }
        // foreach($dataSuperMarketss as $sm){ 
        //     $dataSuperMarketss =  $sm;
        // } 
        foreach($dataSuperMarketssCat as $smm){ 
            $dataSuperMarketssCat =  $smm;
        } 

        $dataMallss = array();
        $dataMallssCat = array();
        $sqlMalls = "SELECT * FROM employer WHERE emp_category = 'Malls' && (employer_status='Active' || employer_status='In Active') ORDER BY id DESC";
        $resultMalls = $conn->query($sqlMalls);
        // $rowsCount = mysqli_num_rows($resultSchool);
        if($resultMalls){
            while($rowMalls = $resultMalls->fetch_assoc()) {
                $dataMallssCat[] = $rowMalls['emp_category'];
                $dataMallss[] = $rowMalls['employer_status'];
            }
            // $dataMalls[0]['emp_category'];
        }
        // foreach($dataMallss as $m){ 
        //     $dataMallss =  $m;
        // } 
        foreach($dataMallssCat as $dm){ 
            $dataMallssCat =  $dm;
        } 
        
        $sql = "SELECT * FROM employer ORDER BY id DESC";
        $result = $conn->query($sql);
        $rowsCount = mysqli_num_rows($result);
        if ($result->num_rows > 0) {

        // Total Completed
        $sqlActive = "SELECT * FROM employer WHERE employer_status = 'Active'";
        $activeResult = $conn->query($sqlActive);
        $activeTotal = mysqli_num_rows($activeResult);
        if ($activeResult->num_rows > 0){
            $len = $activeTotal;
        }
        else{
            $len = 0;
        }

        // Total In Completed
        $sqlInActive = "SELECT * FROM employer WHERE employer_status = 'In Active'";
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
      <div class="panel-heading">Employer</div>      
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
                                                        if ($dataSchoolsCat == 'School' && $s == 'Active') {
                                                            $schoolInCompleted=mysqli_query($conn, "SELECT count(*) as schoolInCompleteTotal FROM employer WHERE emp_category = 'School' && employer_status = 'Active' GROUP BY emp_category");
                                                            $schoolInCompletedData=mysqli_fetch_assoc($schoolInCompleted);
                                                            echo $schoolInCompletedData['schoolInCompleteTotal'];
                                                            $schoolInCompletedData = implode("", $schoolInCompletedData);
                                                            break;
                                                        }
                                                        // else if ($dataSchoolsCat == 'School' && $s == 'In Active') {
                                                        //     $schoolInCompletedData = 0;
                                                        //     echo $schoolInCompletedData;
                                                        // }
                                                    } 
                                                    if($dataSchoolsCat !== 'School' || $s == 'In Active'){
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
                                                        if ($dataCollegesCat == 'College' && $c == 'Active') {
                                                            $collegeInCompleted=mysqli_query($conn, "SELECT count(*) as collegeInCompleteTotal FROM employer WHERE emp_category = 'College' && employer_status = 'Active' GROUP BY emp_category");
                                                            $collegeInCompletedData=mysqli_fetch_assoc($collegeInCompleted);
                                                            echo $collegeInCompletedData['collegeInCompleteTotal'];
                                                            $collegeInCompletedData = implode("", $collegeInCompletedData);
                                                            break;
                                                        }
                                                        // else if ($dataCollegesCat == 'College' && $c == 'In Active') {
                                                        //     $collegeInCompletedData = 0;
                                                        //     echo $collegeInCompletedData;
                                                        // }
                                                    } 
                                                    if($dataCollegesCat !== 'College' || $c == 'In Active'){
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
                                                        if ($dataHospitalsCat == 'Hospital' && $h == 'Active') {
                                                            $hospitalInCompleted=mysqli_query($conn, "SELECT count(*) as hospitalInCompleteTotal FROM employer WHERE emp_category = 'Hospital' && employer_status = 'Active' GROUP BY emp_category");
                                                            $hospitalInCompletedData=mysqli_fetch_assoc($hospitalInCompleted);
                                                            echo $hospitalInCompletedData['hospitalInCompleteTotal'];
                                                            $hospitalInCompletedData = implode("", $hospitalInCompletedData);
                                                            break;
                                                        }
                                                        // else if ($dataHospitalsCat == 'Hospital' && $h == 'In Active') {
                                                        //     $hospitalInCompletedData = 0;
                                                        //     echo $hospitalInCompletedData;
                                                        // }
                                                    } 
                                                    if($dataHospitalsCat !== 'Hospital' || $h == 'In Active'){
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
                                                        if ($dataSuperMarketssCat == 'Super Markets' && $smm == 'Active') {
                                                            $superMarketsInCompleted=mysqli_query($conn, "SELECT count(*) as superMarketsInCompleteTotal FROM employer WHERE emp_category = 'Super Markets' && employer_status = 'Active' GROUP BY emp_category");
                                                            $superMarketsInCompletedData=mysqli_fetch_assoc($superMarketsInCompleted);
                                                            echo $superMarketsInCompletedData['superMarketsInCompleteTotal'];
                                                            $superMarketsInCompletedData = implode("", $superMarketsInCompletedData);
                                                            break;
                                                        }
                                                        // else if ($dataSuperMarketssCat == 'Super Markets' && $smm == 'In Active') {
                                                        //     $superMarketsInCompletedData = 0;
                                                        //     echo $superMarketsInCompletedData;
                                                        // }
                                                    } 
                                                    if($dataSuperMarketssCat !== 'Super Markets' || $smm == 'In Active'){
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
                                                        if ($dataMallssCat == 'Malls' && $dm == 'Active') {
                                                            $mallsInCompleted=mysqli_query($conn, "SELECT count(*) as mallsInCompleteTotal FROM employer WHERE emp_category = 'Malls' && employer_status = 'Active' GROUP BY emp_category");
                                                            $mallsInCompletedData=mysqli_fetch_assoc($mallsInCompleted);
                                                            echo $mallsInCompletedData['mallsInCompleteTotal'];
                                                            $mallsInCompletedData = implode("", $mallsInCompletedData);
                                                            break;
                                                        }
                                                        // else if ($dataMallssCat == 'Malls' && $dm == 'In Active') {
                                                        //     $mallsInCompletedData = 0;
                                                        //     echo $mallsInCompletedData;
                                                        // }
                                                    } 
                                                    if($dataMallssCat !== 'Malls' || $dm == 'In Active'){
                                                        $mallsInCompletedData = 0;
                                                        echo $mallsInCompletedData;
                                                    }
                                                    
                                                    // $mallsInCompletedData = '';
                                                    // if ($dataMallssCat == 'Malls' && $dataMallss == 'Active') {
                                                    //     $mallsInCompleted=mysqli_query($conn, "SELECT count(*) as mallsInCompleteTotal FROM employer WHERE emp_category = 'Malls' && employer_status = 'Active' GROUP BY emp_category");
                                                    //     $mallsInCompletedData=mysqli_fetch_assoc($mallsInCompleted);
                                                    //     echo $mallsInCompletedData['mallsInCompleteTotal'];
                                                    //     $mallsInCompletedData = implode("", $mallsInCompletedData);
                                                    // }
                                                    // else{
                                                    //     $mallsInCompletedData = 0;
                                                    //     echo $mallsInCompletedData;
                                                    // }
                                                
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
            <div class="col-lg-4">
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
        </div>
        <div class="row block">
            <div class="col-lg-12" id="table_container">
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
                                    // echo $row["id"];  
                                    echo ' <tr>
                                        <td>JJIN'.$row["id"].'</td>
                                        <td>'.$row["name"].'</td>
                                        <td>'.$row["organization_type"].'</td>
                                        <td>'.$row["phone_number"].'</td>
                                        <td>'.$row["address"].'</td>
                                        <td>'.$row["employer_status"].'</td>
                                        <td><a href="javascript:void(0)" class="pr-3" onclick="return edit('.$row["id"].');"><span class="glyphicon glyphicon-edit blue-color"></span></a></td>
                                        </tr>';
                                }
                            } else {
                                echo "0 results";
                            }
                                $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <div id="data-not-found"></div>
                </div>
            </div>
        </section>

    <!-- ======= Footer ======= -->
   <!-- <footer id="footer">

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
              
                Designed by <a href="https://just-join.in/">Just Join</a>
            </div>
        </div>
    </footer>-->
    <!-- End Footer -->
    
    <!-- <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div> -->
  <!-- Vendor JS Files-->
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <!-- <script src="../../../assets/vendor/php-email-form/validate.js"></script> -->
 <!-- <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>-->

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
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
        });
        // view 
        // function view(id){
        //     window.open('./ep-profile-edit.php?id='+id, '_self');
        // }
        function edit(id){
            window.open('./er-profile-edit.php?id='+id, '_self');
        }
</script>
</body>

</html>