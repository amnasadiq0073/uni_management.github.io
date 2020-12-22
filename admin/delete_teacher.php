<?php 

   include("includes/connection.php");
    
    $teacher_id = $_GET['teacher_id'];

    $delete_teacher = "delete from teachers where teacher_id = '$teacher_id'";
    if($run_delete = mysqli_query($con,$delete_teacher)){
    	echo "<script>
    	      alert('Teacher Deleted Successfully !!');
    	      window.open('teacher_details.php','_self');
         </script>

    	";
    }



 ?>