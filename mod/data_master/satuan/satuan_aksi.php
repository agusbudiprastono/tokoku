<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
?>
   <script>alert('Untuk mengakses halaman admin, Anda harus login terlebih dahulu.'); window.location = './index.php'</script>
<?php
}
else{
  if ($_SESSION['status']=='admin'){
    include "../../../library/koneksi.php";

    $mod  = $_GET['mod'];
    $aksi = $_GET['aksi'];

    //tambah data
    if($mod=='sat' AND $aksi=='tb_dt'){
      mysql_query("INSERT INTO satuan(nama_sat) VALUES ('$_POST[nama_sat]')");
      header('location:../../../mediaweb.php?mod='.$mod);
    }
    //ubah data
    elseif($mod=='sat' AND $aksi=='ubh_dt'){
      mysql_query("UPDATE satuan SET nama_sat = '$_POST[nama_sat]' WHERE id_sat = '$_POST[id_sat]'");
      header('location:../../../mediaweb.php?mod='.$mod);
    }
  }
}
?>
