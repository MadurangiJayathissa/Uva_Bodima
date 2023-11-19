<?php
include "config.php";


$query_show_emp= "select * from boarding_details ";
$result_show_emp= mysqli_query($conn, $query_show_emp);

?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>UVA-BODIMA.lk</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">UvaBodima.LK</span>
            </a>
          </div>

          <ul class="sidebar-menu">
            <li class="dropdown active">
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              <a href="details.php" class="nav-link"><i data-feather="info"></i><span>Boarding Details</span></a>       
              <a href="payments.php" class="nav-link"><i data-feather="dollar-sign"></i><span>Payments</span></a> 
              <a href="message.php" class="nav-link"><i data-feather="message-circle"></i><span>Message</span></a>
              <a href="user.php" class="nav-link"><i data-feather="users"></i><span>Users</span></a>
              
              </li>
              </ul>
         
            </aside>
       </div>

 <!-- Main Content|table|-->

 <div class="main-content">
    <section class="section">
      <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Boarding Details</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center">
                            
                          </th>
                          <th>Owner Name</th>
                          <th>Boarding Address</th>
                          <th>Girls or Boys</th>
                          <th>Home Type</th>
                          <th>Bathroom Type</th>
                          <th>Number of Students</th>
                          <th>Price</th>
                          <th>Key Money</th>
                          <th>Contact Number</th>
                          <th>Boarding Pictures</th>
                          <th>Payment</th>
                          <th>Add</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                        <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `boarding_details`");
                        if(mysqli_num_rows($select_products) > 0){
                        while($row = mysqli_fetch_assoc($result_show_emp))
                        {
                        ?> 
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['owner_name']; ?></td>
                        <td><?php echo $row['boarding_address']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['home_types']; ?></td>
                        <td><?php echo $row['bathroom_types']; ?></td>
                        <td><?php echo $row['students_count']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['k_price']; ?></td>
                        <td><?php echo $row['contact_number']; ?></td>
                        <td><img src="../home/uploaded_img/<?php echo $row['boardingPictures']; ?>" height="100" alt=""></td>
                        <td><img src="../home/uploaded_img/<?php echo $row['payment']; ?>" height="100" alt=""></td>

                        <td>
                        <a href='save_data.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-sm'>Add</a>

                        </td>


                        <!-- ... Your existing HTML table code ... -->
                        <td>
                          <a href="update_form.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            Update
                          </a>
                        </td>
                        <!-- ... Rest of your HTML table code ... -->

                        <td>
                            <form method="post" action="delete_row.php">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this row?')">
                                Delete
                              </button>
                            </form>
                        </td>
                        </tr>
                        <?php
                        
                      };    
                      }else{
                         echo "<div class='empty'>no product added</div>";
                      };

                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </section>

        <!--start setting bar -->
        <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
              <div class=" fade show active">
                <div class="setting-panel-header">Setting Panel
                </div>
                <div class="p-15 border-bottom">
                  <h6 class="font-medium m-b-10">Select Layout</h6>
                  <div class="selectgroup layout-color w-50">
                    <label class="selectgroup-item">
                      <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                      <span class="selectgroup-button">Light</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                      <span class="selectgroup-button">Dark</span>
                    </label>
                  </div>
                </div>
                <div class="p-15 border-bottom">
                  <h6 class="font-medium m-b-10">Sidebar Color</h6>
                  <div class="selectgroup selectgroup-pills sidebar-color">
                    <label class="selectgroup-item">
                      <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                      <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                        data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                      <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                        data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                    </label>
                  </div>
                </div>
                <div class="p-15 border-bottom">
                  <h6 class="font-medium m-b-10">Color Theme</h6>
                  <div class="theme-setting-options">
                    <ul class="choose-theme list-unstyled mb-0">
                      <li title="white" class="active">
                        <div class="white"></div>
                      </li>
                      <li title="cyan">
                        <div class="cyan"></div>
                      </li>
                      <li title="black">
                        <div class="black"></div>
                      </li>
                      <li title="purple">
                        <div class="purple"></div>
                      </li>
                      <li title="orange">
                        <div class="orange"></div>
                      </li>
                      <li title="green">
                        <div class="green"></div>
                      </li>
                      <li title="red">
                        <div class="red"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="p-15 border-bottom">
                  <div class="theme-setting-options">
                    <label class="m-b-0">
                      <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                        id="mini_sidebar_setting">
                      <span class="custom-switch-indicator"></span>
                      <span class="control-label p-l-10">Mini Sidebar</span>
                    </label>
                  </div>
                </div>
                <div class="p-15 border-bottom">
                  <div class="theme-setting-options">
                    <label class="m-b-0">
                      <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                        id="sticky_header_setting">
                      <span class="custom-switch-indicator"></span>
                      <span class="control-label p-l-10">Sticky Header</span>
                    </label>
                  </div>
                </div>
                <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                  <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                    <i class="fas fa-undo"></i> Restore Default
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--end setting bar -->  

</div><!--End  Main Content -->

<!-- footer start-->
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">UVA-BODIMA.LK</a></a>
        </div>
        <div class="footer-right">
          <a href="#">BADULLA - SRI LANKA</a></a>
        </div>
      </footer>
          <!-- footer start-->
      </div>
     </div>

     <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>


    </body>
</html>
        




