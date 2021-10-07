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


    $module = $_GET['module'];
  	$act	= $_GET['act'];

	// Update
	if ($module=='data-bebas-pustaka' AND $act=='update'){
		// text hidden
		$id        = $_POST['id'];
		$kampus	   = $_POST['kampus'];

		// attribut yg diupdate
		$hardcopy  = $_POST['hardcopy'];
		$ktr_hard  = $_POST['ktr_hard'];
		$softcopy  = $_POST['softcopy'];
		//$ktr_soft  = $_POST['ktr_soft'];
		$receipt2  = $_POST['receipt2'];
		
		$staf	   = $_POST['staf'];

		if ($kampus=='Siman') {
			$bp_cabang = 'tidak';
		}
		else {
			$bp_cabang = $_POST['bp_cabang'];
		}	

		$no1 = $_POST['no1'];
		$no2 = $_POST['no2'];
		$no3 = $_POST['no3'];
		$no4 = $_POST['no4'];

		if ($no1=='') {
			$no_surat = '';
		}
		else {
			$no_surat = $no1.$no2.$no3.'/'.$no4;
		}		
		
		date_default_timezone_set("Asia/Bangkok");
		$updatetime = date ("Y-m-d H:i:s");

		
		$update = "UPDATE bebaspustaka SET hardcopy   = '$hardcopy',
			    					       ktr_hard   = '$ktr_hard',
			    					       softcopy   = '$softcopy',
			    					       receipt2   = '$receipt2',
			    					       bp_cabang  = '$bp_cabang',
			    					       no_surat   = '$no_surat',
			    					       nama_staf  = '$staf',
			    					       updatetime = '$updatetime'

			                         WHERE id_bp = '$id'";
		mysqli_query($connect, $update);
		?>
		
		<script>
	        var yakin = confirm("Apakah mahasiswa terkait SUDAH benar-benar LULUS TAHFIDZ?");

	        if (yakin) {
	            window.location = "../../media.php?module=data-bebas-pustaka";
	        } else {
	            window.history.back();
	        }
	    </script>
		<!-- <script>alert('Data Berhasil Di Update'); 
                window.location = '../../media.php?module=data-bebas-pustaka'</script>"; -->
<?php
	}

	// Delete 
	elseif($module=='data-bebas-pustaka' AND $act=='delete'){
	    mysqli_query($connect, "DELETE FROM bebaspustaka WHERE id_bp='$_GET[id]'");
    	header("location:../../media.php?module=".$module);
	}
}
?>