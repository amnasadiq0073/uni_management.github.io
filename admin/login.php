<?php
    
    include("includes/connection.php");
    session_start();
    if(isset($_SESSION['admin_email'])){
            header("location: index.php");
    }
    
    $err_msg = "";
    if(isset($_POST['login'])){ 
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        
        
        $get_admin = "select * from admins where admin_email = '$admin_email' AND admin_pass = '$admin_pass' " ;
        $run_admin = mysqli_query($con,$get_admin);
        $row_admin = mysqli_fetch_array($run_admin);
        
        $check = mysqli_num_rows($run_admin);
        if($check==1){

            $_SESSION['admin_email']=$admin_email;
            
                echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            $err_msg =  "<div class='alert alert-danger'>Password or email is incorrect!!</div>";
            
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
    <title>Admin Login | Climax Student Management system</title>
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
                                <h4>Admin Login</h4>
                                <form method="post" action="">
                                    <?php echo $err_msg; ?>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="text" name="admin_email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="admin_pass" class="form-control" placeholder="Password" required>
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