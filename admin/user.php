<?php 
    require '../config/config.php';
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/images/apple-icon.png">
    <link rel="icon" href="../assets/images/favicon.png">
    <title>
        Admin Page
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/material-dashboard.css?v=2.0.0">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/admin.css" rel="stylesheet" />
    <!-- iframe removal -->
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/images/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                Admin Page
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active ">
                        <a class="nav-link" href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="user.php">
                            <i class="material-icons">person</i>
                            <p>User Profiles</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="table.php">
                            <i class="material-icons">content_paste</i>
                            <p>Trending</p>
                        </a>
                    </li>
                    <li class="nav-item active-pro">
                        <a class="nav-link" href="../includes/handlers/logout.php">
                            <i class="material-icons">unarchive</i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">User Profiles</h4>
                                    <p class="card-category">Below is the complete info grid</p>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-info">
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>SignUp date</th>
                                            <th>Posts</th>
                                            <th>Likes</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT id, username, signup_date, num_posts, num_likes FROM users";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id']."</td>";
                                                    echo "<td>".$row['username']."</td>";
                                                    echo "<td>".$row['signup_date']."</td>";
                                                    echo "<td>".$row['num_posts']."</td>";
                                                    echo "<td>".$row['num_likes']."</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../assets/images/sandalu.jpeg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-gray">Admin</h6>
                                    <h4 class="card-title">Sandalu Kalpanee</h4>
                                    <p class="card-description">
                                        Third Year Undergraduate at Department of Industrial Management, University of Kelaniya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/bootstrap-material-design.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../assets/js/material-dashboard.js?v=2.0.0"></script>
<!-- demo init -->
<script src="../assets/js/plugins/demo.js"></script>

</html>
