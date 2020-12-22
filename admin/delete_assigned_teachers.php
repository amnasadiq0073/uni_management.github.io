<?php 

   include("includes/connection.php");
    
    $id = $_GET['id'];

    $delete = "delete from assigned_teachers where id = '$id'";
    $run_delete = mysqli_query($con,$delete);
    if($run_delete)
    {
        echo "<script>alert('Successfully deleted!!');
             window.open('assigned_teachers.php','_self')
        </script>";
    }

 ?>