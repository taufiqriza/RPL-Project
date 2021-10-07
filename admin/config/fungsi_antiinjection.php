<?php	
	// fungsi untuk mencegah seseorang menyisipkan Cross-site dan HTML injection
	function anti_injection($data){
	  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	  return $filter;
	}
?>