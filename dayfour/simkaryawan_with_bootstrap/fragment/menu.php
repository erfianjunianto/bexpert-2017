<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SIMK</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?=$active_home;?> ><a href="<?=BASEPATH?>/index.php">Home</a></li>
        <li <?=$active_divisi;?> ><a href="<?=BASEPATH?>/divisi">Divisi</a></li>
        <?php 
        cek_session();
        if($_SESSION['islogin'] == true){          
          if(!is_admin()){
            echo'<li '.$active_karyawan.'><a href="'.BASEPATH.'/karyawan">Karyawan</a></li>';
            echo'<li '.$active_user.' ><a href="'.BASEPATH.'/users/ubah_password.php">Ubah Password</a></li>';
          }else{
            echo'<li '.$active_karyawan.'><a href="'.BASEPATH.'/karyawan">Karyawan</a></li>';
            echo '<li '.$active_user.' ><a href="'.BASEPATH.'/users">User</a></li>';
          }
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
        if($_SESSION['islogin'] == true){
        ?>
        <li><a href="<?=BASEPATH?>/logout.php">Logout</a></li>
        <?php 
        }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">