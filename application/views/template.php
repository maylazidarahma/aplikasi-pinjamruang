
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SAPRA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/img/logo/logo1.png">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/morrisjs/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css">
    <script src="<?php echo base_url(); ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
</head>

<body>
    
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <?php if($this->session->userdata('level')=='admin'){
                    ?><a href="<?php echo base_url();?>index.php/dashboard/index/admin"><img class="main-logo text-left" style="width:120px;heigth:90px;margin-top:20px;margin-bottom:30px;" src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="" /></a>
                <?php }else{
                    ?>
                <a href="<?php echo base_url();?>index.php/dashboard/index/indoor"><img class="main-logo text-left" style="width:120px;heigth:90px;margin-top:20px;margin-bottom:30px;" src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="" /></a>
                <?php } ?>
                
                <strong><img src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    <?php
		                if($this->session->userdata('level') == 'admin'){
                            echo $this->session->userdata('nama_lvl');
	                ?>
                        <li class="active">
                            <a class="" href="<?php echo base_url() ?>index.php/dashboard/index/admin">
                                   <i class="fa big-icon fa-home icon-wrap"></i>
                                   <span class="mini-click-non">Beranda</span>
                                </a>
                        </li>
                        <li>
                            <a class="has-arrow" aria-expanded="false"><i class="fa big-icon fa-table icon-wrap"></i> <span class="mini-click-non">Tabel Data</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Data table" href="<?php echo base_url() ?>index.php/Admin"><i class="fa fa-th sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Admin</span></a></li>
                            <li><a title="Data Table" href="<?php echo base_url() ?>index.php/Kategori"><i class="fa fa-th sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Kategori</span></a></li>
                            <li><a title="Data Table" href="<?php echo base_url() ?>index.php/Ruang"><i class="fa fa-th sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Ruang</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url() ?>index.php/Peminjaman" aria-expanded="false"><i class="fa big-icon fa-line-chart icon-wrap"></i> <span class="mini-click-non">Peminjaman</span></a>
                            <a class="" href="<?php echo base_url() ?>index.php/History" aria-expanded="false"><i class="fa big-icon fa-history icon-wrap"></i> <span class="mini-click-non">Riwayat</span></a>

                        </li>
                        <?php
		                    } else {
                               
                        ?>
                        <li class="active">
                            <a class="" href="<?php echo base_url() ?>index.php/dashboard/index/indoor">
                            <i class="fa big-icon fa-home icon-wrap"></i>
                        <span class="mini-click-non">Ruangan dalam</span>
                            </a>
                        </li>
                        <li>
                        <a class="" href="<?php echo base_url() ?>index.php/dashboard/index/outdoor" aria-expanded="false"><i class="fa big-icon fa-home icon-wrap"></i> <span class="mini-click-non">Ruangan terbuka</span></a>
                        </li>
                        <li>
                        <a class="" href="<?php echo base_url() ?>index.php/History/index" aria-expanded="false"><i class="fa big-icon fa-history icon-wrap"></i> <span class="mini-click-non">Riwayat</span></a>
                        </li>
                        <?php
		                    }
	                    ?>
                        </ul>
                </nav>
            </div>
        </nav>
    </div>
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro" style="margin-top: 70px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav" >
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading" style="padding-top: 10px;">
                                            <form action="http://localhost/Sapra/index.php/Search/index_post" role="search" class="search-unit" method="post">
                                                <input type="text" placeholder="Cari..." class="form-control" name="nama_ruang" style="float:left; border-top-left-radius: 20px;
    border-bottom-left-radius: 20px; border:none;" >
                                                <button type="submit" style="float:left; padding:7px 10px; border:none; border-top-right-radius: 20px; margin-left:-20px; margin-top:10px;
    border-bottom-right-radius: 20px; background: #fff;"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <?php if($this->session->userdata('level')=='siswa'){
                                                   $id_user = $this->session->userdata('id_user');
                                                   ?>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell" aria-hidden="true"></i><span id="bunder" class=""></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1 style="color:white;">Notifikasi</h1>
                                                        </div>
                                                        <ul class="notification-menu" style="height:70%;">
                                                            <li>
                                                                <a href="<?php echo base_url();?>index.php/history">
                                                                    <div class="" id="centang">
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <h5 id="notif"></h5>
                                                                        <p style="margin-top:-5px;" id="isi"></p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                               <?php } else{?>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                                        <span id="bunderadmin" class=""></span>     
                                                    </a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1 style="color:white;">Notifikasi</h1>
                                                        </div>
                                                        <ul class="notification-menu" style="height:70%;">
                                                            <li>
                                                                <a href="<?php echo base_url();?>index.php/peminjaman">
                                                                    <div class="" id="centangadmin">
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <h5 id="notifadmin"></h5>
                                                                        <p style="margin-top:-5px;" id="isiadmin"></p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <?php
		                                            }
	                                            ?>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                            <span class="admin-name"><?php echo $this->session->userdata('username');?></span>
                                                            <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?php echo base_url(); ?>index.php/Login/logout"><span class="fa fa-lock author-log-ic"></span>Keluar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        

                                                        
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
			if($this->session->userdata('nama_lvl') == 'admin'){
			?>
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
		    } else {
                ?>
                <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
			    }
			?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <!-- MAIN CONTENT -->
            <?php
                $this->load->view($content_view);
            ?>
            <!-- END MAIN CONTENT -->
        </div>

    <!-- jquery
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/morrisjs/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/morrisjs/morris.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/calendar/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
    <script type="text/javascript">
        function notif(id_user) {
      $.getJSON("http://localhost/rest-api/index.php/notif/"+id_user, function(data){
          if(data['0'].nama_ruang !=""){
            $("#notif").html("Permintaan anda telah diterima");
            $("#isi").html(data['0'].nama_ruang+" dapat digunakan silahkan lihat history anda");
            $("#centang").html(
                "<i class='fa fa-check adminpro-checked-pro admin-check-pro' aria-hidden='true'></i>"
            )
            $('#centang').addClass('notification-icon');
            $('#bunder').addClass('indicator-nt');
          }
        })
        }
        function notifadmin(){
      $.getJSON("http://localhost/rest-api/index.php/NotifAdmin", function(data){
          if(data['0'].jml == 0){
            $("#notifadmin").html(" ");
            $("#isiadmin").html(" ");
            $("#centangadmin").html(" ");  
          }else{
            $("#notifadmin").html("Terima Konfirmasi");
            $("#isiadmin").html(data['0'].jml+ " permintaan menunggu untuk dikonfirmasi");
            $("#centangadmin").html(
                "<i class='fa fa-check adminpro-checked-pro admin-check-pro' aria-hidden='true'></i>"
            );
            $('#centangadmin').addClass('notification-icon');
            $('#bunderadmin').addClass('indicator-nt');
          }
        })}
        $(document).ready(function(){
            notif(<?php echo $this->session->userdata('id_user')?>);
            notifadmin();
        })
        </script>
</body>


</html>