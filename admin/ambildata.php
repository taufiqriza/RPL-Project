 <?php
 require "config/db.php";

 if($_POST['rowid']) {
      $id = $_POST['rowid'];
      // mengambil data berdasarkan id
      $sql    = "SELECT * FROM bebaspustaka WHERE id_bp = '$id' ";
      $result = mysqli_query($connect, $sql);
      $row    = mysqli_fetch_array($result); 
      $date   = date_create($row['uploadtime']);
      
      if (!$result) {
          printf("Error: %s\n", mysqli_error($connect));
          exit();
      }
            
?>

    <!-- Data Diri -->
    <h2 class="page-header">Data Diri</h2>
    <table class="table table-bordered table-hover table-striped">
      <tr>
        <th width="150px">Muhafidz</th>
        <td><?php echo $row['program']; ?></td>
      </tr>
      <tr>
        <th>Jumlah Hafalan</th>
        <td><?php echo "$row[angkatan] / $row[tahun]"; ?></td>
      </tr>
      <tr>
        <th>NIM</th>
        <td><?php echo $row['nim']; ?></td>
      </tr>
      <tr>
        <th>Nama Lengkap</th>
        <td><?php echo $row['nama']; ?></td>
      </tr>
      <tr>
        <th>No Handphone</th>
        <td><?php echo $row['kontak']; ?></td>
      </tr>
      <tr>
        <th>Kampus</th>
        <td><?php echo $row['kampus']; ?></td>
      </tr>
      <tr>
        <th>Fakultas / Prodi</th>
        <td><?php echo "$row[fakultas] / $row[prodi]"; ?></td>
      </tr>
      <tr>
        <th>Catatan</th>
        <td><?php echo $row['judul']; ?></td>
      </tr>               
    </table>
    
    <!-- Validasi Data -->
    <h2 class="page-header">Validasi Kelulusan</h2>
    <table class="table table-bordered table-hover table-striped">
      <tr>
        <th width="10px">No</th>
        <th>Kelengkapan</th>
        <th colspan="2">Jumlah</th>
        <th>Check</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Menyelesaikan Hafalan Sesuai Ketentuan (5 Lembar)</td>
        <td><?php echo "$row[ktr_hard]"; ?> 
        </td>
        <td>Lembar</td>
        <td align="center">
          <?php 
            if($row['hardcopy']=='ya'){
              echo "<img src='../dist/img/correct.png'>";
            }
            else{
              echo "<img src='../dist/img/close.png'>";
            }
          ?> 
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td colspan="3">Memenuhi Syarat Minimum  <b>Diskusi Islamisasi</b></td>
        <td align="center">
          <?php 
            if($row['softcopy']=='ya'){
              echo "<img src='../dist/img/correct.png'>";
            }
            else{
              echo "<img src='../dist/img/close.png'>";
            }
          ?> 
        </td>
      </tr>
      <tr>
        <td>3</td>
        <td colspan="3">Memenuhi Syarat Minimum Absensi</td>
        <td align="center">
          <?php 
            if($row['receipt2']=='ada'){
              echo "<img src='../dist/img/correct.png'>";
            }
            else{
              echo "<img src='../dist/img/close.png'>";
            }
          ?> 
        </td>
      </tr>
      <?php
      if ($row['kampus']=='Siman') {
        // Disabled
      }
      else {
      ?>
      <tr>
        <td>4</td>
        <td colspan="3">Menyerahkan Surat Bebas Pustaka <br><small>(Khusus kampus Cabang)</small></td>
        <td align="center">
          <?php 
            if($row['bp_cabang']=='ada'){
              echo "<img src='../dist/img/correct.png'>";
            }
            else{
              echo "<img src='../dist/img/close.png'>";
            }
          ?> 
        </td>
      </tr>
      <?php
      }
      ?>
    </table>

    <!-- <div>
      Apakah Wisudawan/ti tersebut <b>SUDAH</b> benar-benar <b>Bebas Tanggungan</b> ?<br>
      <input type="checkbox" class="minimal">
      Sudah di Cek
    </div>
    <br> -->
    
    <div class="row">
      <div class="col-md-6">
        <a class="btn btn-success btn-sm btn-block" href="?module=data-bebas-pustaka&act=edit&id=<?php echo $row['id_bp']; ?>"><i class="fa fa-edit"></i> Edit</a>
      </div>
      <div class="col-md-6">
        <?php
          if($row['no_surat']=='' || $row['nama_staf']==''){
              echo "<a class='btn btn-default btn-sm btn-block'><i class='fa fa-print'></i> Print</a>";
            }
          else{
            echo "<a class='btn btn-primary btn-sm btn-block' target='_blank' href='modules/bebas-pustaka/print-sk.php?id=$row[id_bp]'><i class='fa fa-print'></i> Print</a>"; 
          }
        ?>
        
      </div>
    </div>
    
<?php  
}   
?>
   