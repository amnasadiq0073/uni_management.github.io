<?php
    include("includes/connection.php");
    session_start();
    if(!isset($_SESSION['identification_code'])){
            header("location: login.php");

    }
    $student = $_SESSION['identification_code'];
    $get_student = "select * from students where identification_code = '$student'";
    $run_student = mysqli_query($con,$get_student);
    $row_student = mysqli_fetch_array($run_student);

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
    <title>Parent | Climax Student Management</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                        <?php include("includes/parts/profile-header.php"); ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <?php include('includes/parts/sidebar.php'); ?>
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Send Message</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Send Message</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    
                    <div class="col-12">
                       <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <!-- Left sidebar -->
                                    <div class="inbox-leftbar">

                                        <a href="inbox.php" class="btn btn-danger btn-block waves-effect waves-light">Inbox</a>
                                       
                                        <div class="mail-list mt-4">
                                            <a href="inbox.php" class="list-group-item border-0 text-danger"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span class="label label-danger float-right ml-2">1</span></a>
                                            <a href="sent_messages.php" class="list-group-item border-0"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                            
                                        </div>

                                        
                                    </div>
                                    <!-- End Left sidebar -->
                                    <div class="inbox-rightbar">


                                        <div class="mt-4">

                                            <form method="post" action="">
                                                
                                                <h4>Send Message</h4>
                                                <?php 
                                                    
                                                    $get_student_class = "select * from classes where class_name = '".$row_student['class']."'";
                                                    $run_student_class = mysqli_query($con,$get_student_class);
                                                    while($row_student_class =  mysqli_fetch_array($run_student_class)){
                                                        $get_assigned_teacher = "select * from assigned_teachers where class_id = '".$row_student_class['class_id']."'";
                                                        $run_assigned_teacher = mysqli_query($con,$get_assigned_teacher);
                                                        $row_assigned_teacher = mysqli_fetch_array($run_assigned_teacher);

                                                        $get_class_teacher = "select * from teachers where teacher_id = '".$row_assigned_teacher['teacher_id']."'";
                                                        $run_class_teacher = mysqli_query($con,$get_class_teacher);
                                                        $row_class_teacher = mysqli_fetch_array($run_student_class);



                                                    }

                                                 ?>
                                                <input type="radio" name="message_options" required>Send Message to Class Teacher (<?php echo $row_class_teacher['teacher_name']; ?>)
                                                <br>
                                                <br>
                                                <input type="radio" name="message_options" required>Send Message to Principle
                                                <br>
                                                <br>
                                               <div class="form-group">
                                                   <p>Write Message :</p>
                                                   <textarea name="message" class="input form-control" placeholder="Write Message ..." rows="50" required></textarea>
                                               </div>
                                                <div class="form-group m-b-0">
                                                    <div class="text-right">
                                                        <button name="send" class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                                    </div>
                                                </div>

                                            </form>
                                            
                                        </div>
                                        <!-- end card-->

                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>


                </div>


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