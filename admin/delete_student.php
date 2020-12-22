<?php 

   include("includes/connection.php");
    
    $student_id = $_GET['student_id'];

    $delete_student = "delete from students where student_id = '$student_id'";
    if($run_delete = mysqli_query($con,$delete_student)){
    	echo "<script>
    	      alert('Student Deleted Successfully !!');
    	      window.open('all_students.php','_self');
         </script>

    	";
    }



 ?>