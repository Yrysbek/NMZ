<?php

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
        $unique_name = uniqid('img_');
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$unique_name)){
		echo '{"status":"success", "image_name":"'.$unique_name.'"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;