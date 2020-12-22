<?php 

   include("includes/connection.php");
    
    $admin_id = $_GET['admin_id'];

    $delete_admin = "delete from admins where admin_id = '$admin_id'";
    if($run_delete = mysqli_query($con,$delete_admin)){
    	echo "<script>
    	      alert('Admin Deleted Successfully !!');
    	      window.open('admin_details.php','_self');
         </script>

    	";
    }



 ?>