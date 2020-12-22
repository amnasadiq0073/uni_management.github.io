<?php
    
    include("includes/connection.php");
    session_start();
    if(isset($_SESSION['identification_code'])){
            header("location: index.php");
    }
    
    $err_msg = "";
    if(isset($_POST['login'])){ 
        $identification_code = mysqli_real_escape_string($con,$_POST['identification_code']);
        
        $get_student = "select * from students where identification_code = '$identification_code'" ;
        $run_student = mysqli_query($con,$get_student);
        $row_student = mysqli_fetch_array($run_student);
        
        $check = mysqli_num_rows($run_student);
        if($check==1){

            $_SESSION['identification_code']=$identification_code;
            
                echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            $err_msg =  "<div class='alert alert-danger'>Identification Code is Wrong !!</div>";
            
        }
    }
    
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
    <title>Parent Login | Climax Student Management system</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Parents Login</h4>
                                <form method="post" action="">
                                    <?php echo $err_msg; ?>
                                    <div class="form-group">
                                        <label>Student Identification Code :</label>
                                        <input type="text" name="identification_code" class="form-control" placeholder="Student Identification Code" required>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-warning btn-flat m-b-30 m-t-30">Sign in</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="js/custom.min.js"></script>

</body>

</html>