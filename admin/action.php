
<?php
require_once('config/db.php');
//$act = $_GET['act'];

 //upload
if (isset($_POST['upload'])){

  // attribut lainnya
  $program  = $_POST['program'];
  $nim      = $_POST['nim'];
  $judul    = addslashes($_POST['judul']);
  $nama     = addslashes($_POST['nama']);
  $angkatan = $_POST['angkatan'];
  $tahun    = $_POST['tahun'];
  $kampus   = $_POST['kampus'];
  $fakultas = $_POST['fakultas'];
  $prodi    = $_POST['prodi'];
  $email    = $_POST['email'];
  $kontak   = $_POST['kontak'];
  date_default_timezone_set("Asia/Bangkok");
  $uploadtime = date ("Y-m-d H:i:s");

  //query untuk cek record sudah ada apa belum
  $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM bebaspustaka WHERE nim='$nim'"));
  if ($cek > 0){
    echo "<script>window.alert('NIM yang anda masukan sudah ada')
    window.location='index.php'</script>";
  }
  else {
    
        $create = "INSERT INTO bebaspustaka (program,angkatan,tahun,nama,nim,kampus,fakultas,prodi,judul,email,
        kontak,uploadtime) VALUES('$program','$angkatan','$tahun','$nama','$nim','$kampus','$fakultas','$prodi',
        '$judul','$email','$kontak','$uploadtime')";
        
        $query = mysqli_query($connect,$create);

        echo "<script>alert('Data Berhasil Disimpan'); 
               window.location = 'index.php'</script>";

  }
}

?>