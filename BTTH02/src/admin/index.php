 <?php
    session_start();
    if (!$_SESSION['login']) {
        header('Location:../login/index.php');
    }
    if ($_SESSION['login'] && $_SESSION['login'] != 'admin' && $_SESSION['login'] != 'student') {
        header('Location: ../user/Teacher/index.php');
    }
    if ($_SESSION['login'] && $_SESSION['login'] != 'admin' && $_SESSION['login'] != 'teacher') {
        header('Location: ../user/Student/index.php');
    }


    ?>
 <!-- Sidebar/menu -->
 <?php //include 'sidebar.php' 
    ?>
 <nav class="w3-sidebar w3-collapse bg-black w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
     <div class="w3-container w3-row">
         <div class="w3-col s8 w3-bar">
             <span>Welcome, <strong>Admin</strong></span><br>
         </div>
     </div>
     <hr>
     <div class="w3-container">
         <h5>Dashboard</h5>
     </div>
     <div class="w3-bar-block ">
         <a href="../admin/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>  Overview</a>
         <a href="../admin/admin_Student/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i> Sinh viên</a>
         <a href="../admin/admin_Teacher/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-user fa-fw"></i>  Giáo viên</a>
         <a href="../admin/admin_Course/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-book fa-fw"></i>  Khóa học</a>
         <a href="../admin/admin_Class/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-diamond fa-fw"></i>  Lớp học phần</a>
         <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bell fa-fw"></i>  News</a>
         <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bank fa-fw"></i>  Thống kê</a>
         <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-history fa-fw"></i>  404 Page</a>
         <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
     </div>
 </nav>
 <!-- Overlay effect when opening sidebar on small screens -->
 <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 <!-- !PAGE CONTENT! -->
 <?php include '../../public/template/header.html' ?>
 <!-- Header -->
 <div class="w3-row-padding w3-margin-bottom mt-5">
     <div class="w3-quarter">
         <div class="w3-container w3-red w3-padding-16">
             <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
             <div class="w3-right">
                 <h3>52</h3>
             </div>
             <div class="w3-clear"></div>
             <h4>Messages</h4>
         </div>
     </div>
     <div class="w3-quarter">
         <div class="w3-container w3-blue w3-padding-16">
             <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
             <div class="w3-right">
                 <h3>99</h3>
             </div>
             <div class="w3-clear"></div>
             <h4>Views</h4>
         </div>
     </div>
     <div class="w3-quarter">
         <div class="w3-container w3-teal w3-padding-16">
             <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
             <div class="w3-right">
                 <h3>23</h3>
             </div>
             <div class="w3-clear"></div>
             <h4>Shares</h4>
         </div>
     </div>
     <div class="w3-quarter">
         <div class="w3-container w3-orange w3-text-white w3-padding-16">
             <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
             <div class="w3-right">
                 <h3>50</h3>
             </div>
             <div class="w3-clear"></div>
             <h4>Users</h4>
         </div>
     </div>
 </div>

 <?php
    include '../../public/template/footer.html';
    ?> <!-- End page content -->