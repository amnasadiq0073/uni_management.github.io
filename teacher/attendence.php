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
    <title>Class Attendence | climax student management system</title>
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
                    <h3 class="text-primary">Make Attendence of Class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Class Attendence</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                

                <div class="row">
                    <?php 
                        $class_id = $_GET['class_id'];
                        $get_class_data = "select * from classes where class_id = '$class_id'";
                        $run_class_data = mysqli_query($con,$get_class_data);
                        $row_class_data = mysqli_fetch_array($run_class_data);

                    ?>
                     <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo " Attendence of ".$row_class_data['class_name']; ?></h4>
                                <h6 class="card-subtitle">Here you can make attendence of <?php echo $row_class_data['class_name']; ?> (<?php echo date('Y-m-d'); ?>)</h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Student Name</th>
                                                <th>Student Image</th>
                                                <th>Attendence</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="post" action="">
                                            <?php 
                                                  $get_students = "select * from students where class = '".$row_class_data['class_name']."'";
                                                  $run_students = mysqli_query($con,$get_students);
                                                  $i = 0;
                                                  while($row_students = mysqli_fetch_array($run_students))
                                                  {
                                                    $i++;
                                             ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row_students['student_name']; ?></td>
                                                <td><a href="../student_images/<?php echo $row_students['student_image']; ?>" target="_blank"><img src="../student_images/<?php echo $row_students['student_image']; ?>" style="border-radius: 50%;" width="50"></a></td>
                                                <td>
                                                    <input type="radio" name="attendence_<?php echo $row_students['student_id']; ?>" value="present" required> Present
                                                    <input type="radio" name="attendence_<?php echo $row_students['student_id']; ?>" value="absent" required> Absent
                                                </td>
                                                
                                            </tr>
                                            
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4">
                                                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit Attendence">
                                            </td>
                                        </tr>
                                        <?php 
                                        if(isset($_POST['submit']))
                                        {
                                                  $get_students = "select * from students where class = '".$row_class_data['class_name']."'";
                                                  $run_students = mysqli_query($con,$get_students);

                                                 $today = date('Y-m-d');
                                                 
                                                  while($row_students = mysqli_fetch_array($run_students))
                                                  {
                                                    $student_id = $row_students['student_id'];
                                                    $attendence = $_POST['attendence_'.$student_id];
                                                    $insert_attendence = "insert into attendence (class_id,student_id,teacher_id,attendence,date) values('$class_id','".$row_students['student_id']."','".$row_teacher['teacher_id']."','$attendence','$today')";
                                                    $run_attendence = mysqli_query($con,$insert_attendence);
                                                     
                                                     if($attendence == 'absent'){
                                                     $notification = $row_students['student_name']." was absent today in $class_name !!";
                                                      $insert_notification = "insert into notifications(reciever_id,notification,link,seen,send_to,time) values('$student_id','$notification','#','0','student',NOW())";
                                                      $run_insert_notification = mysqli_query($con,$insert_notification);

                                                     }

                                                   }
                                                   if($run_attendence)
                                                   {

                                                    echo "<script>alert('Attendence Added Successfully');
                                                    window.open('index.php','_self');
                                                    </script>";
                                                   }

                                               }
                                             ?>
                                    </form>
                                        </tbody>
                                    </table>
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