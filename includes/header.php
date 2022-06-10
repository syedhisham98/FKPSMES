<!-- Start Header Area -->
<header class="htc__header bg--white">
         
                <div class="col-lg-2 col-sm-4 col-md-6 order-1 order-lg-1">
                    <div class="logo">
                        
                    </div>
                </div>
                
            <ul>
                            <?php
                                if ($_SESSION['usertype'] == 1) { ?>
                                <li><a href="../../ApplicationLayer/ManageUser/index.php">Home</a></li>
                                <li class="dropdown"><a href="../../#">Menu</a>
                                   <div class="dropdown-content">
                                        <a href="../../ApplicationLayer/ManageRubric/rubricStudent.php">Rubric</a>
                                        <a href="../../ApplicationLayer/ManageProgressReport/ViewProgress.php">Progress and Report</a>
                                        <a href="../../ApplicationLayer/ManageSchedule/stdSchedule.php">Schedule</a>
                                        <a href="../../ApplicationLayer/ManageEvaluation/petAsistHome.php">Evaluation</a>
                                    </div>
                                </li>
                                <?php
                             } ?>
                
                <?php
                                if ($_SESSION['usertype'] == 2) { ?>
                                <li><a href="../../ApplicationLayer/ManageUser/index.php">Home</a></li>
                                <li class="dropdown"><a href="../../#">Menu</a>
                                   <div class="dropdown-content">
                                        <a href="../../ApplicationLayer/ManageRubric/foodHome.php">Rubric</a>
                                        <a href="../../ApplicationLayer/ManageProgressReport/goodHome.php">Progress and Report</a>
                                        <a href="../../ApplicationLayer/ManageSchedule/medicalHome.php">Schedule</a>
                                        <a href="../../ApplicationLayer/ManageEvaluation/petAsistHome.php">Evaluation</a>
                                    </div>
                                </li>
                                <?php
                             } ?>

                    
                        
                <?php
                if ($_SESSION['usertype'] == 3) { ?>
                    <div class="col-lg-9 col-sm-4 col-md-2 order-3 order-lg-2">
                    <div class="main__menu__wrap">
                        <nav class="main__menu__nav d-none d-lg-block">
                            <ul class="mainmenu">
                                <li class="drop"><a href="../../ApplicationLayer/ManageUser/index.php">Home</a></li>
                                    </ul>
                                </li>                                    
                                <li class="dropdown"><a href="../../#">Menu</a>
                                   <div class="dropdown-content">
                                        <a href="../../ApplicationLayer/ManageRubric/foodHome.php">Rubric</a>
                                        <a href="../../ApplicationLayer/ManageProgressReport/goodHome.php">Progress and Report</a>
                                        <a href="../../ApplicationLayer/ManageSchedule/medicalHome.php">Schedule</a>
                                        <a href="../../ApplicationLayer/ManageEvaluation/petAsistHome.php">Evaluation</a>
                                    </div>
                                </li>
                        </nav>

                    </div>
                </div>
                <?php
                } ?>         
              
                                <?php 
                                if ($_SESSION['usertype'] == 1) {
                                    $id = "student_id";
                                }
                                else if ($_SESSION['usertype'] == 2) {
                                    $id = "lecturer_id";
                                }
                                else if ($_SESSION['usertype'] == 3) {
                                    $id = "secretariat_id";
                                }

                                if(isset($_SESSION['username']))
                                {  

                                    echo '<li class="dropdown"><a>'.$_SESSION['username'].'</a>
                                    <ul>
                                    <div class="dropdown-content">
                                    <a href="../../ApplicationLayer/ManageUser/profile.php?'.$id.'='.$_SESSION['userid'].'">Profile</a>
                                    <a href="../../ApplicationLayer/ManageUser/login.php">Logout</a>
                                    </div>
                                    </ul>
                                    </li>';
                                    echo "</ul>";

                                } ?>

            </ul>
                   
                
                



<!-- Mobile Menu -->
<div class="mobile-menu d-block d-lg-none"></div>
<!-- Mobile Menu -->
</div>
</div>
<!-- End Mainmenu Area -->
</header>
        <!-- End Header Area -->