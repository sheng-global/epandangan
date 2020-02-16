<?php 
include_once("include/config.php");
include_once("model/Pandangan.php");
include_once("model/Auth.php");

header("Content-type: text/JSON"); 

$user_id = $_POST['user_id'];
if (empty($user_id)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid user id['.$user_id.']'));
	return;
}

$borang_id = $_POST['borang_id'];
if ($borang_id == null || $borang_id == "" || $borang_id < 0) {
	echo json_encode(Array('error' => '404','message' => 'Invalid borang id['.$borang_id.']'));
	return;
}

$hadir = $_POST['hadir'];
if (empty($hadir)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid hadir'));
	return;
}

$kategori = $_POST['kategori'];
if (empty($kategori)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid kategori'));
	return;
}

$nama_organisasi = $_POST['nama_organisasi'];
if ($kategori != 'Individu' &&  empty($nama_organisasi)) {
	echo json_encode(Array('error' => '404','message' => 'Sila masukkan nama organisasi'));
	return;
}

$jumlah_nama = $_POST['jumlah_nama'];
if (empty($jumlah_nama)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid jumlah nama['.$jumlah_nama.']'));
	return;
}

$bentuk_kandungan = $_POST['bentuk_kandungan'];
/*
if (empty($bentuk_kandungan)) {
	echo json_encode(Array('error' => '404','message' => 'Sila masukkan komen bentuk kandungan['.$bentuk_kandungan.']'));
	return;
}*/

$lain_lain = $_POST['lain_lain'];
/*
if (empty($lain_lain)) {
	echo json_encode(Array('error' => '404','message' => 'Sila masukkan komen lain lain['.$lain_lain.']'));
	return;
}*/

$matlamat_id = $_POST['matlamat_id'];
if ($matlamat_id == null || $matlamat_id == "" || $matlamat_id < 0) {
	echo json_encode(Array('error' => '404','message' => 'Invalid matlamat id'));
	return;
}

$halatuju_id = $_POST['halatuju_id'];
if ($halatuju_id == null || $halatuju_id == "" || $halatuju_id < 0) {
	echo json_encode(Array('error' => '404','message' => 'Invalid halatuju id'));
	return;
}

$tindakan_id = $_POST['tindakan_id'];
if ($tindakan_id == null || $tindakan_id == "" || $tindakan_id < 0) {
	echo json_encode(Array('error' => '404','message' => 'Invalid tindakan id'));
	return;
}

$cadangan = $_POST['cadangan'];
if (empty($cadangan)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid cadangan'));
	return;
}

$justifikasi = $_POST['justifikasi'];
if (empty($justifikasi)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid justifikasi'));
	return;
}

$object=new Pandangan($dbHostname, $dbUsername, $dbPassword, $dbName);
$result = $object->getForm($borang_id);

// START JSON
if($result != 'false' && $result != '') {
	$formId = $result['id'];
	$data = Array('id' => $formId,
				'user_id' => $user_id,
				'hadir' => $hadir,
				'kategori' => $kategori,
				'nama_organisasi' => $nama_organisasi,
				'jumlah_nama' => $jumlah_nama,
				'bentuk_kandungan' => $bentuk_kandungan,
				'lain_lain' => $lain_lain
				);
	//var_dump($data);

	$result = $object->updateForm($data);
	//var_dump($result);
	if($result == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Update form['.$formId.'] failed'));
		return;
	}/* else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'form_id' => $result, 'message' => 'Update form successful'));
	}*/
} else {
	$data = Array('user_id' => $user_id,
				'hadir' => $hadir,
				'kategori' => $kategori,
				'nama_organisasi' => $nama_organisasi,
				'jumlah_nama' => $jumlah_nama,
				'bentuk_kandungan' => $bentuk_kandungan,
				'lain_lain' => $lain_lain
				);
	$formId = $object->addForm($data);
	//var_dump($result);
	if($formId == 'false' || $formId == 0) {
		echo json_encode(Array('code' => '404','message' => 'Add form['.$formId.'] failed'));
		return;
	}/* else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'form_id' => $result, 'message' => 'Update form successful'));
	}*/
}

//echo json_encode(Array('code' => '200', 'form_id' => $formId, 'itemid' => $itemId, 'result' => $result, 'message' => 'Add form item['.$formId.'|'.$itemId.'] successful'));
//return;

$result = $object->getItemByIds($formId, $matlamat_id, $halatuju_id, $tindakan_id);

// START JSON
if($result != 'false' && $result != '') {
	$itemId = $result['id'];
	$data = Array('id' => $itemId,
				'borang_id' => $formId,
				'matlamat_id' => $matlamat_id,
				'halatuju_id' => $halatuju_id,
				'tindakan_id' => $tindakan_id,
				'cadangan' => $cadangan,
				'justifikasi' => $justifikasi
				);
	//var_dump($data);

	$result = $object->updateItem($data);
	//var_dump($result);
	if($result == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Update item['.$itemId.'] failed'));
	} else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'id' => intval($formId), 'item_id' => intval($itemId), 'message' => 'Update form item['.$formId.'|'.$itemId.'] successful'));
	}
} else {
	$data = Array('borang_id' => $formId,
				'matlamat_id' => $matlamat_id,
				'halatuju_id' => $halatuju_id,
				'tindakan_id' => $tindakan_id,
				'cadangan' => $cadangan,
				'justifikasi' => $justifikasi
				);
	$itemId = $object->addItem($data);

	//var_dump($result);
	if($itemId == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Add item['.$itemId.'] failed'));
	} else {
		//$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'id' => intval($formId), 'item_id' => intval($itemId), 'message' => 'Add form item['.$itemId.'|'.$itemId.'] successful'));
	}
}

return;
// END JSON


?>