<?php 

   include("includes/connection.php");
    
    $class_id = $_GET['class_id'];

    $delete_class = "delete from classes where class_id = '$class_id'";
    if($run_delete = mysqli_query($con,$delete_class)){
    	echo "<script>
    	      alert('Class Deleted Successfully !!');
    	      window.open('all_classes.php','_self');
         </script>

    	";
    }



 ?>