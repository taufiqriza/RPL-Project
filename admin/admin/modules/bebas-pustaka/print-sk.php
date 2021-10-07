<?php
session_start(); 
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo  "<script>window.alert('Untuk mengakses modul, Anda harus login dulu.');
        window.location = 'index.php'</script>";  
}
    // Apabila user sudah login dengan benar, maka terbentuklah session
else{
	require_once "../../../config/db.php";
	require_once "../../../config/fungsi_antiinjection.php";
	require_once "../../../config/tgl_indo.php";


	$query  = "SELECT * FROM bebaspustaka WHERE id_bp='$_GET[id]'";
    $print 	= mysqli_query($connect, $query);
    $data   = mysqli_fetch_array($print);

    $tglNow = tgl_indo(date('Y-m-d'));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SK Bebas Pustaka | Perpustakaan UNIDA Gontor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">

 

  <!-- Custom CSS -->
  <style type="text/css">
  	.sk{
  		font-family: Times New Roman;
  		font-size: 11pt;
  		text-align: justify;
  	}
  	.pagelayout{
  		margin-top: 4.5cm;
  		margin-right: 1.5cm;
  		margin-left: 1.5cm;
  		margin-bottom: 2cm;
  	}

  	.td{
  		text-align: center;
  	}

  	.b{
  		font-weight: bold;
  	}

	.kotakk{
  		right: 70%;
	    width: 600px;
	    height: 70px;
	    position: relative;
	}
	.kotakk p{
	    position: absolute;
	}
	.line{
		left: 2%;
		margin-bottom:20px;
	    width: 600px;
	    position: relative;
	}
	.right{
		text-align: right;
	}
	.kotak{
  		right: 25%;
	    width: 600px;
	    height: 70px;
	    position: relative;
	}
	.kotak img{
	    width: 180px;
	    right: 35%;
	    bottom: 15%;
	    position: absolute;
	}
	.kotak p{
	    position: absolute;
	}
	

  	.tengah{
	    left: 50%;
	    top: 40%;
	    transform: translate(-50%);
	    -webkit-transform: translate(-50%);
	    -moz-transform: translate(-50%);
	    -o-transform: translate(-50%);
	}

  	@page {
		/* size: A4; */
		size: A4 Portrait;
		margin: 2mm;
		/* margin: 1; */
		-webkit-print-color-adjust: exact;
		color-adjust: exact; /*firefox & IE */
	   
	}
  </style>
</head>
<body onload="window.print();">
<div class="wrapper">
    <div class="container">
  	<!-- Main content -->
	   	<section class="content">
		   	<div class="row">
	        	<div class="col-md-12">
	        		<div class="box-body sk">
	        			<div class="pagelayout">
			          		<table border="0">
			          			<tr>
			          				<td>Nomor</td>
			          				<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
			          				<td><?php echo $data['no_surat'];?></td>
			          			</tr>
			          			<tr>
			          				<td>Perihal</td>
			          				<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
			          				<td><b><u>KETERANGAN BEBAS TANGGUNGAN</u></b></td>
			          			</tr>
			          		</table>
			          		<br>

			          		<p>
			          			<i>
			          				Bismillahiramanirahim<br>
									Assalamualaikum Wr. Wb.
								</i>
								<br><br>
								&emsp;&emsp;Dengan bertawakal kepada Allah <i>Subhanahu wa Ta'ala</i>, 
								<b>Perpustakaan	Pusat Universitas Darussalam Gontor</b> menyatakan bahwa mahasiswa/i yang tercantum di bawah ini:
								<br>
								<table class="b">
									<tr>
				          				<td width="140px">Nama</td>
				          				<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				          				<td>&nbsp;&nbsp;<?php echo $data['nama'];?></td>
				          			</tr>
				          			<tr>
				          				<td>NIM</td>
				          				<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				          				<td>&nbsp;&nbsp;<?php echo $data['nim'];?></td>
				          			</tr>
				          			<tr>
				          				<td>Fakultas</td>
				          				<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				          				<td>&nbsp;&nbsp;<?php echo $data['fakultas'];?></td>
				          			</tr>
				          			<tr>
				          				<td>Program Studi</td>
				          				<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				          				<td>&nbsp;&nbsp;<?php echo $data['prodi'];?></td>
				          			</tr>
								</table>
								<br>
								&emsp;&emsp;Telah melalui proses pemeriksaan pada sistem informasi perpustakaan dan	dinyatakan <b>bebas dari segala tanggungan</b> pada Perpustakaan Pusat Universitas Darussalam Gontor serta <b>telah menyerahkan salinan cetak dan digital Tugas Akhir (TA)</b> milik yang bersangkutan.
								<br>
								&emsp;&emsp;Demikian surat keterangan dibuat demi memenuhi persyaratan Wisuda yang bersangkutan. Apabila dikemudian hari ditemukan kesalahan, akan diperbaiki
								sebagaimana mestinya.
								<br><br>
								<i>Wassalamu'alaikum Wr. Wb.</i>
								<br>
			          		</p>

			          		<p class="right">
			          		Siman, <?php echo $tglNow; ?>
							<br><br>
							<b>
							Perpustakaan Perguruan Tinggi<br>
							Universitas	Darussalam Gontor<br>
							Siman Ponorogo<br>
							</p>
							</b>
							<br>
							<table border="0" class="td">
								<tr>
									<td colspan="3"><div class="line">Mengetahui,</div></td>
								</tr>
								<tr>
									<td><div class="kotak">Direktur Perpustakaan</div></td>
									
									<td colspan="2"><div class="kotakk">Staf Perpustakaan</div></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td width="280px">
										<div class="kotak">
											<!-- <img src="../../../dist/img/ttd-ust.png"> -->
											<p class="tengah"><b><u>(H. Syamsul Hadi Untung, M.A., M.L.S)</u></b></p>
										</div>
									</td>
									
									<td colspan="2">
										<div class="kotakk">
											<p class="tengah"><b><u>(<?php echo $data['nama_staf'];?>)</u></b></p>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
	          	</div>
          		<!-- /.col -->
	        </div>
	        <!-- /.row -->
	    </section>
	  	<!-- /.content -->
	</div>
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
}
?>
