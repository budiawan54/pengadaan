<?php

	function view($view, $vars=array(), $output = false){
		$CI = &get_instance();
    	return $CI->load->view($view, $vars, $output);
	}

	function enc($string){
		return sha1($string);
		
		$datea = strtotime($date);

		$ar_datea = str_split($datea);
		
		$result = $string;

		foreach ($ar_datea as $key => $value) {
			$max = (int)$value;
			for($i = 0; $i < $max; $i++){
				$result = sha1($result);
			}
		}

		return $result;

	}

	function getPIN(){
		$desired_length = 10;
		$unique = uniqid();
		$your_random_word = substr($unique, 0, $desired_length);
		return $your_random_word;
	}

	function array_exc($ar, $ar_e = array()){
		$arr = array();
		$arr_except = array();

		foreach ($ar_e as $key => $value) {
			$arr_except[$value] = $key;
		}

		foreach ($ar as $key => $value) {
			if (!isset($arr_except[$key])){
				$arr[$key] = $value;
			}
		}

		return $arr;
	}

	function dd($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
		die();
	}


	function tampil_editable($proper, $idPrimary, $isi, $dataType = 'text', $targetClass="editable_kelengkapan"){
		return $isi;
        return '<a href="javascript:void(0)" class="'.$targetClass.'" data-type="'.$dataType.'" data-pk="'.$idPrimary.'" data-url="'.base_url('ppk/Pengajuan/ajaxEdit').'" data-name="'.$proper.'" data-title="">'.$isi.'</a>';
	}

	
	function getDates($date){

	    if ($date == ''){
	        return '';
	    }

	    if ($date != '' || $date != '0000-00-00' || $date != null){

	        $ar_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	        $dates = explode('-', $date);
	        return (int)$dates[2]. ' '.$ar_bulan[(int)$dates[1]]. ' '.$dates[0];
	    }
	    return '';
	}

	function space($i){
		for($a = 0; $a < $i; $a++){
			echo '&nbsp;';
		}
	}


	function statusBukuTamu($d = null){
		$a = array(
				'mengantri' => 'mengantri',
				'pending' => 'pending',
				'batal' => 'batal',
				'selesai' => 'selesai'
			);

		if ($d == null){
			return $a;
		}
		else{
			return $a[$d];
		}
	}


	function renderStatusBukuTamu($id = null){
		$a = array(
				'mengantri' => 'info',
				'pending' => 'warning',
				'batal' => 'danger',
				'selesai' => 'success'
			);

		if ($id == null){
			return $a;
		}
		else{
			return $a[$id];
		}
	}