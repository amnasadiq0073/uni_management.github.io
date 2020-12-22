<?php
    include("includes/connection.php");
    session_start();
    if(!isset($_SESSION['admin_email'])){
            header("location: login.php");

    }
    $admin = $_SESSION['admin_email'];
    $get_admin = "select * from admins where admin_email= '$admin'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);

    $admin_email = $row_admin['admin_email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico">
    <title>Admin | climax student management system</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->

</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="images/favicon.ico" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="images/logo-img.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        
                        <!-- Messages -->
                        
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    
                                   
                                    <li><a href="form-submissions.php"><i class="fa fa-wpforms"></i>Submissions</a></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php include('includes/parts/sidebar.php'); ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Student Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="all_students.php">All Students</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit Student</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                

                <div class="row">
                    
                     <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php

                                    $student_id = $_GET['student_id'];
                                    $get_student_data = "select * from students where student_id = '$student_id'";
                                    $run_student_data = mysqli_query($con,$get_student_data);
                                    $row_student_data = mysqli_fetch_array($run_student_data);


                                 ?>
                                <h4 class="card-title">Edit Student '<?php echo $row_student_data['student_name']; ?>'</h4>
                                <h6 class="card-subtitle">You can edit this Students here</h6>
                                
                                <form method="post" action="">
                                    <center>
                                    <img width="100" src="../student_images/<?php echo $row_student_data['student_image']; ?>">
                                    </center>
                                    <p>Select New Image (only select if you want to change)</p>
                                    <input class="input form-control" type="file" name="student_image">
                                    <br>
                                    <p>Student Name</p>
                                    <input class="input form-control" value="<?php echo $row_student_data['student_name']; ?>" placeholder="Enter Student Name" type="text" name="student_name" required>
                                    <br>
                                    <p>Father Name</p>
                                    <input class="input form-control" value="<?php echo $row_student_data['father_name']; ?>" placeholder="Enter Father Name" type="text" name="father_name" required>
                                    <br>
                                   
                                    <p>Class</p>
                                    <select class="input form-control" name="class" required>
                                        <option><?php echo $row_student_data['class']; ?></option>
                                        <?php 
                                              $get_class = "select * from classes where class_name != '".$row_student_data['class']."' ";
                                              $run_class = mysqli_query($con,$get_class);
                                              while($row_class = mysqli_fetch_array($run_class))
                                              {

                                         ?>
                                         <option><?php echo $row_class['class_name']; ?></option>
                                     <?php } ?>
                                    </select>
                                    <br>
                                    <p>Identification Code</p>
                                    <input class="input form-control" value="<?php echo $row_student_data['identification_code']; ?>" placeholder="Identification Code" type="text" name="identification_code" disabled>
                                    <br>
                                    <input class="btn btn-block btn-success" type="submit" name="update" value="Update">

                                </form>
                            </div>
                    
                </div>
</div>

                

<?php 
      if(isset($_POST['update']))
      {
        $student_name = $_POST['student_name'];
        $father_name = $_POST['father_name'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        $identification_code = $_POST['identification_code'];
        $register_date = $_POST['register_date'];

        if($_FILES['student_image']['name'] == '')
       {
           $student_image = $row_student_data['student_image'];
       }
       else{
            
        $student_image = $_POST['student_image'];
            $student_image = $_FILES['student_image']['name'];
            $student_image = preg_replace("/\s+/","_",$student_image);
            $image_tmp = $_FILES['student_image']['tmp_name'];
            $student_image_ext = pathinfo($student_image,PATHINFO_EXTENSION);
      $student_image = pathinfo($student_image,PATHINFO_FILENAME);
      
      $student_image = $student_image."_".date("mjYHis").".".$student_image_ext;
      
            move_uploaded_file($image_tmp,"../student_images/$student_image");
       }

        $update_student = "update students set student_name = '$student_name' , father_name ='$father_name',class = '$class' , section = '$section' , identification_code = '$identification_code' , student_image = '$student_image' , register_date = '$register_date' where student_id = '$student_id'";
        if($run_update_student = mysqli_query($con,$update_student)){
            echo "<script>
                alert('Student Edited Successfully !!');
                window.open('all_students.php','_self')
            </script>";
        }
      }

 ?>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>

</body>

</html>