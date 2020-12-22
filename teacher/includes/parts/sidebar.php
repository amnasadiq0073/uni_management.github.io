<!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label"><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Today's Attendence</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php 
                         

                         $get_assigned_teachers = "select * from assigned_teachers where teacher_id = '".$row_teacher['teacher_id']."' and is_incharge = 'yes'";
                         $run_assigned_teachers = mysqli_query($con,$get_assigned_teachers);
                         while($row_assigned_teachers = mysqli_fetch_array($run_assigned_teachers)){
                                $teacher_class_id = $row_assigned_teachers['class_id'];

                                $get_teacher_classes = "select * from classes where class_id = '$teacher_class_id'";
                                $run_teacher_classes = mysqli_query($con,$get_teacher_classes);
                                $today = date('Y-m-d');
                                $get_previous_attendence = "select * from attendence where class_id = '$teacher_class_id' and date = '$today'";
                                    $run_get_previous_attendence = mysqli_query($con,$get_previous_attendence);
                                    $count_get_previous_attendence = mysqli_num_rows($run_get_previous_attendence);
                                    if($count_get_previous_attendence == 0)
                                    {

                                while($row_teacher_classes = mysqli_fetch_array($run_teacher_classes))
                                {

                                    $class_name = $row_teacher_classes['class_name'];
                                    
                                   
                     ?>
                               
                               <li> <a href="attendence.php?class_id=<?php echo $teacher_class_id; ?>" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu"> <?php echo $class_name; ?></span></a>
                               </li>

                    <?php } } } ?>

                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Result Options</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <?php 
                         

                         $get_assigned_teachers = "select * from assigned_teachers where teacher_id = '".$row_teacher['teacher_id']."'";
                         $run_assigned_teachers = mysqli_query($con,$get_assigned_teachers);
                         while($row_assigned_teachers = mysqli_fetch_array($run_assigned_teachers)){
                                $teacher_class_id = $row_assigned_teachers['class_id'];

                                $get_teacher_classes = "select * from classes where class_id = '$teacher_class_id'";
                                $run_teacher_classes = mysqli_query($con,$get_teacher_classes);
                                $today = date('Y-m-d');
                                

                                while($row_teacher_classes = mysqli_fetch_array($run_teacher_classes))
                                {

                                    $class_name = $row_teacher_classes['class_name'];
                                    
                                   
                     ?>
                               <li> <a href="add_results.php?class_id=<?php echo $teacher_class_id; ?>" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu"> <?php echo $class_name; ?></span></a>
                               </li>
                           <?php }} ?>
                            </ul>
                        </li>


                        <li class="nav-label">Other Options</li>
                        
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">See Previous Attendence</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li> <a href="search_previous_attendence.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu"> Search Previous Attendence</span></a>
                               </li>
                            </ul>
                        </li>
                        <?php 
                            $get_all_notifications = "select * from notifications where reciever_id = '".$row_teacher['teacher_id']."' and send_to = 'teacher' and seen = '0' order by 1 desc";
                                         $run_all_notifications = mysqli_query($con,$get_all_notifications);
                                         $count_all_notifications = mysqli_num_rows($run_all_notifications);
                         ?>
                        <li class="nav-label"><a href="notifications.php"> <i class="fa fa-bell"></i> Notifications <?php if($count_all_notifications>0): ?> <i class="badge badge-danger" style="color: white;"><?php echo $count_all_notifications; ?></i><?php endif; ?> </a></li>
                        
                        

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->