<!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label"><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>
                        

                        
                        
                        


                        <li class="nav-label">Other Options</li>

                        <li class="nav-label"><a href="search_results.php"> <i class="fa fa-book"></i> See Results</a></li>


                        <li class="nav-label"><a href="inbox.php"> <i class="fa fa-envelope"></i> Messages <i class="badge badge-danger" style="color: white;">1</i></a></li>
                        <li class="nav-label"><a href="send_message.php"> <i class="fa fa-send"></i> Send Message</a></li>
                         <?php 
                            $get_all_notifications = "select * from notifications where reciever_id = '".$row_student['student_id']."' and send_to = 'student' and seen = '0' order by 1 desc";
                                         $run_all_notifications = mysqli_query($con,$get_all_notifications);
                                         $count_all_notifications = mysqli_num_rows($run_all_notifications);
                         ?>
                        <li class="nav-label"><a href="notifications.php"> <i class="fa fa-bell"></i> Notification <?php if($count_all_notifications>0): ?><i class="badge badge-danger" style="color: white;"><?php echo $count_all_notifications; ?></i><?php endif; ?></a></li>
                      
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Attendence Options</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li> <a href="search_previous_attendence.php" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu"> Search Attendence</span></a>
                               </li>
                            </ul>
                        </li>
                        
                        

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->