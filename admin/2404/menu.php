<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="./dashboardAdmin.php" class="site_title"><i class="fa fa-paw"></i> <span>Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào,</span>
                <h2><?php echo $_SESSION['dangnhap']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="./xulydonhang.php"><i class="fa fa-home"></i> Quản lý đơn hàng <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./xulysanpham.php"><i class="fa fa-edit"></i> Quản Lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./danhmuc.php"><i class="fa fa-desktop"></i> Quản lý danh mục <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./khachhang.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Quản lý khách hàng<span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./xulydanhmucbaiviet.php"><i class="fa fa-external-link-square" aria-hidden="true"></i> Quản lý tin tức<span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./xulybaiviet.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Bài viết<span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./xulylienhe.php"><i class="fa fa-location-arrow" aria-hidden="true"></i> Quản lý liên hệ <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./xulytuyendung.php"><i class="fa fa-file" aria-hidden="true"></i> Tuyển dụng<span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="./xulytaikhoan.php"><i class="fa fa-lock" aria-hidden="true"></i> Quản lý tài khoản<span class="fa fa-chevron-down"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
 <!-- /menu footer buttons -->
 <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>