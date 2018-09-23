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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
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
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">account_circle</i>
                                    </div>
                                    <p class="card-category">Total Users</p>
                                    <?php 
                                    $query=mysqli_query($con,"SELECT COUNT(id) FROM users");
                                    $row=mysqli_fetch_array($query); 
                                    ?>
                                    <h3 class="card-title"><?php echo $row['COUNT(id)']; ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons text-danger">warning</i>
                                        <a href="#pablo">Get More Space...</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">block</i>
                                    </div>
                                    <p class="card-category">Closed Users</p>
                                    <?php 
                                    $query=mysqli_query($con,"SELECT COUNT(user_closed) FROM users WHERE user_closed='yes'");
                                    $row=mysqli_fetch_array($query); 
                                    ?>
                                    <h3 class="card-title">
                                    <?php echo $row['COUNT(user_closed)']; ?>   
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons">date_range</i> Last 24 Hours -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">person_add_disabled</i>
                                    </div>
                                    <p class="card-category">New Users</p>
                                    <?php 
                                    $query=mysqli_query($con,"SELECT COUNT(id) FROM users WHERE signup_date BETWEEN '2018-06-01' and '2018-07-01'");
                                    $row=mysqli_fetch_array($query); 
                                    ?>
                                    <h3 class="card-title">
                                    <?php echo $row['COUNT(id)']; ?>      
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons">local_offer</i> Tracked from Github -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">library_books</i>
                                    </div>
                                    <p class="card-category">Total Posts</p>
                                    <?php 
                                    $query=mysqli_query($con,"SELECT COUNT(id) FROM posts");
                                    $row=mysqli_fetch_array($query); 
                                    ?>
                                    <h3 class="card-title">
                                    <?php echo $row['COUNT(id)']; ?>      
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats"><!-- 
                                        <i class="material-icons">update</i> Just Updated -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-success">
                                    
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Pages</h4>
                                    <p class="card-category">Page Requests : None</p>
                                    <p class="card-category">Pages Created : None</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons">access_time</i> updated 4 minutes ago -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-warning">
                                    
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">User Groups</h4>
                                    <p class="card-category">Group Requests : None</p>
                                    <p class="card-category">Group Created : None</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <!--  <i class="material-icons">access_time</i> updated 4 minutes ago -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-danger">
                                    
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Events</h4>
                                    <p class="card-category">Events Created : None</p>
                                    <p class="card-category">Events Details : <a href="#">View</a></p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons">access_time</i> updated 4 minutes ago -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12" style="margin-left: auto;margin-right: auto;">
                            <div class="card">
                                <div class="card-header card-header-tabs card-header-primary">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span>Trending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    
                                    <div id="chart">
                                        <?php
                                        $query=mysqli_query($con,"SELECT * FROM trends");
                                        $chart_data = '';
                                        while($row = mysqli_fetch_array($query))
                                        {
                                            $chart_data .= "{ title:'".$row['title']."', hits:".$row['hits']."}, ";
                                            // $chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
                                        }
                                        // $chart_data = substr($chart_data, 0, -2);
                                    ?>
                                    </div>
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
<script type="text/javascript">
    $(document).ready(function() {

        //init wizard

        // demo.initMaterialWizard();

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initCharts();

    });
</script>
<script>
        Morris.Bar({
             element : 'chart',
             data:[<?php echo $chart_data; ?>],
             xkey:'title',
             ykeys:['hits'],
             labels:['Hits'],
             hideHover:'auto',
             stacked:true
        });
    </script>
</html>
