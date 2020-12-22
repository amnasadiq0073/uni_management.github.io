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
                    <h3 class="text-primary">Assign Teachers to a class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="teacher_details.php">Teacher Details</a></li>
                        <li class="breadcrumb-item active"><a href="assign_teacher.php">Assign teachers to a class</a></li>
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
                                
                                <h4 class="card-title">Assign teachers to a class</h4>
                                <h6 class="card-subtitle">You can assign teachers to a particular class from here , and also can make a teacher incharge to a class</h6>
                                
                                <form method="post" action="">
                                    
                                    <p>Select Teacher</p>
                                    <select name="teacher_id" class="input form-control" required>
                                        <option value="">Select a Teacher</option>
                                        <?php 
                                            $get_teachers = "select * from teachers order by 1 desc";
                                            $run_teachers  = mysqli_query($con,$get_teachers);
                                            while($row_teachers = mysqli_fetch_array($run_teachers))
                                            {
                                        ?> 
                                        <option value="<?php echo $row_teachers['teacher_id']; ?>"><?php echo $row_teachers['teacher_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                    <p>Select Class</p>
                                    <select name="class_id" class="input form-control" required>
                                        <option value="">Select a class</option>
                                        <?php 
                                            $get_class = "select * from classes order by 1 desc";
                                            $run_class  = mysqli_query($con,$get_class);
                                            while($row_class = mysqli_fetch_array($run_class))
                                            {
                                        ?> 
                                        <option value="<?php echo $row_class['class_id']; ?>"><?php echo $row_class['class_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <br>  
                                    <p>Class incharge ?</p>
                                    <select name="is_incharge" class="input form-control" required>
                                        <option value="">Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <br>                                   
                                  
                                    <input class="btn btn-block btn-success" type="submit" name="assign" value="Assign">

                                </form>
                            </div>
                    
                </div>
</div>

                

<?php 
     if(isset($_POST['assign']))
     {
        $teacher_id = $_POST['teacher_id'];
        $class_id = $_POST['class_id'];
        $is_incharge = $_POST['is_incharge'];
        
        $check_previous  = "select * from assigned_teachers where teacher_id = '$teacher_id' and class_id = '$class_id'";
        $run_check_previous = mysqli_query($con,$check_previous);
        $row_check_previous = mysqli_num_rows($run_check_previous);
        if($row_check_previous ==0)
        {
            


            $insert_data = "insert into assigned_teachers (teacher_id,class_id,is_incharge) values('$teacher_id','$class_id','$is_incharge')";

            $run_insert_data = mysqli_query($con,$insert_data);

            $get_class_data = "select * from classes where class_id = '".$_POST['class_id']."'";
            $run_class_data = mysqli_query($con,$get_class_data);
            $row_class_data = mysqli_fetch_array($run_class_data);

            $class_name = $row_class_data['class_name'];
            $notification = "Admin Assigned you ".$class_name;
            if($run_insert_data)
            {
                $insert_notification = "insert into notifications(reciever_id,notification,link,seen,send_to,time)values('$teacher_id','$notification','#','0','teacher',NOW())";
                $run_insert_notification = mysqli_query($con,$insert_notification);

                echo "<script>alert('Teacher Successfully Assigned to Class !!');</script>";
            }
        }
        else{
            echo "<script>alert('Already added in database!!');</script>";
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