<?php
    include("includes/connection.php");
    session_start();
    if(!isset($_SESSION['teacher_email'])){
            header("location: login.php");

    }

    $teacher = $_SESSION['teacher_email'];
    $get_teacher = "select * from teachers where teacher_email= '$teacher'";
    $run_teacher = mysqli_query($con,$get_teacher);
    $row_teacher = mysqli_fetch_array($run_teacher);

    $teacher_email = $row_teacher['teacher_email'];
    
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
    <title>Previous Attendence | climax student management system</title>
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
                    <h3 class="text-primary">Search Previous Attendence</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Previous Attendence</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                
                <div class="row" style="background-color: white;padding: 20px;">
                                <div class="col-md-3">
                                    <form action="search_previous_attendence.php" method="get">
                                    <h3>Search Attendence</h3>
                                </div>
                                <div class="col-md-3">
                                    <select class="input form-control" name="attendence_class" required>
                                        <option value="">Select Class</option>
                                        <?php 
                         

                         $get_assigned_teachers = "select * from assigned_teachers where teacher_id = '".$row_teacher['teacher_id']."' and is_incharge = 'yes'";
                         $run_assigned_teachers = mysqli_query($con,$get_assigned_teachers);
                         while($row_assigned_teachers = mysqli_fetch_array($run_assigned_teachers)){
                                $teacher_class_id = $row_assigned_teachers['class_id'];

                                $get_teacher_classes = "select * from classes where class_id = '$teacher_class_id'";
                                $run_teacher_classes = mysqli_query($con,$get_teacher_classes);
                                $today = date('Y-m-d');
                                
                                    
                                while($row_teacher_classes = mysqli_fetch_array($run_teacher_classes))
                                {

                                    $class_name = $row_teacher_classes['class_name'];
                                    $class_id = $row_teacher_classes['class_id'];
                                    
                                   
                     ?>
                     <option value="<?php echo $class_id; ?>"><?php echo $class_name; ?></option>
                 <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="input form-control" type="date" name="attendence_date" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-success btn-block" name="search" value="Search Attendence">
                                    </form>
                                </div>
                </div>
                <div class="row">

                    <?php 
                            if(isset($_GET['attendence_class']) && isset($_GET['attendence_date']))
                            {
                                $get_class = "select * from classes where class_id = '".$_GET['attendence_class']."'";
                                $run_class = mysqli_query($con,$get_class);
                                $row_class = mysqli_fetch_array($run_class);

                                ?>
                      <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Attendence of <?php echo $row_class['class_name']; ?></h4>
                                <h6 class="card-subtitle">Here you can make attendence of <?php echo $row_class['class_name']; ?> (<?php echo $_GET['attendence_date']; ?>)</h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Student Name</th>
                                                <th>Student Image</th>
                                                <th>Attendence</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $get_attendence = "select * from attendence where class_id = '".$_GET['attendence_class']."' and date = '".$_GET['attendence_date']."'";
                                                $run_attendence = mysqli_query($con,$get_attendence);
                                                $i = 0;
                                                while($row_attendence = mysqli_fetch_array($run_attendence))
                                                {
                                                    $i++;
                                                    $get_students = "select * from students where student_id = '".$row_attendence['student_id']."' ";
                                                    $run_students =  mysqli_query($con,$get_students);
                                                    $row_students = mysqli_fetch_array($run_students);

                                                    $student_name = $row_students['student_name'];
                                                    $student_image = $row_students['student_image'];
                                           
                                             ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $student_name; ?></td>
                                                <td>
                                                    <a href="../student_images/<?php echo $student_image; ?>">
                                                    <img src="../student_images/<?php echo $student_image; ?>" width="50"></a>
                                                </td>
                                                <td><?php echo $row_attendence['attendence']; ?></td>
                                                <td><?php echo $row_attendence['date']; ?></td>
                                                
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    
                </div>
</div>
                                <?php
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