<?php
session_start();
	if (empty($_SESSION['user_id']) || $_SESSION['user_id'] == '')
	{
	    header("Location: index.php?validation=3");
	    die();
	} 
include('db_con.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>4 CRUD Operations</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->  
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>  
  <?php
  include("header.php");
  ?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Form</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">          
          <li>
            <a href="crud.php" class="active">
              <i class="bi bi-circle"></i><span>Create Operation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Table</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">          
          <li>
            <a href="main/index.php">
              <i class="bi bi-circle"></i><span>User Listing</span>              
            </a>
          </li>
          <li>
            <a href="property_listing.php">
              <i class="bi bi-circle"></i><span>Property Listing</span>              
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Property Listing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>          
          <li class="breadcrumb-item active">Property Listing</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
    $sql = "SELECT * FROM tb_property";		
		$result = $conn->query($sql);			
			if ($result->num_rows > 0) 
			{					
				while ($row = $result->fetch_assoc()) 
				{
			    	$title = $row["title"];					
					  $property_type = $row["property_type"];					
					  $bedrooms = $row["bedrooms"];
					  $address = $row["address"];					 
            $price = $row["price"];					 
            $details = $row["details"];			
            $image = $row["image"];			
        ?>
          <section class="section">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Property Detail</h5>                
                    <!-- Horizontal Form -->
                    <form action="#" method="POST">
                      <div class="row mb-12">
                        <img src="assets/img/<?=$image?>">                 
                      </div>
                      <br>                
                      <div class="row mb-12" align="center">
                        <label class="col-sm-12 col-form-label"><h4><?=$title?></h4></label>                  
                      </div>
                      <br>                
                      <div class="row mb-4">
                        <label class="col-sm-4 col-form-label">Property Type:</label>
                        <div class="col-sm-8 col-form-label">
                          <strong>For <?=$property_type?></strong>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-4 col-form-label">Number of Bedrooms:</label>
                        <div class="col-sm-8 col-form-label">
                          <strong><?=$bedrooms?></strong>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-4 col-form-label">Price:</label>
                        <div class="col-sm-8 col-form-label">
                          <strong><?=$price?> USD</strong>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-8 col-form-label">
                          <strong><?=$address?></strong>
                        </div>
                      </div>
                    </form><!-- End Horizontal Form -->

                  </div>
                </div>
            </div>    
            </div>
          </section>
        <?php    		 
			  }
			}
    ?>
    
    

  </main><!-- End #main -->
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong></strong>. All Rights Reserved
    </div>    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>