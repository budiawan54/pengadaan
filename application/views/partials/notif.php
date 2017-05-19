<?php
	
    if($this->session->flashdata('pesan') != null) {
        
		$pesan      = $this->session->flashdata('pesan');
		$isi_pesan  = $pesan['isi'];
		$tipe_pesan = $pesan['tipe'];

?>


		<script type="text/javascript">
			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": true,
			  "positionClass": "toast-bottom-left",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}

		    $(function(){
		    	toastr.<?php echo $tipe_pesan ?>('<?php echo $isi_pesan ?>');
		    });
		</script>
<?php

    }
	
?>