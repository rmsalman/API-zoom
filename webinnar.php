<?php

include 'header.php';
echo '<h1 class="text-center">Click to create urgent meeeting as</h1>
  <div class="jumbotron">';
if(isset($_GET['id']) && !empty($_GET['id'])){
	/*The API Key, Secret, & URL will be used in every function.*/
		$api_key = '88MFWDVhSKmfo58d24ZJxw';
		$api_secret = '3R13SzMNCd6NKjp4exgHvDUCcUWUkGKsx6Bs';
		$api_url = 'https://api.zoom.us/v1/';

		$data = array();

		$data['host_id'] = $_GET['id'];
		// $data['host_id'] = '1T0mYZAmQGu6Cl8da9p91g';
		$data['topic'] = 'testing';

		$data['type'] = '5';


		$request_url = $api_url.'meeting/create';

		/*Adds the Key, Secret, & Datatype to the passed array*/
		$data['api_key'] = $api_key;
		$data['api_secret'] = $api_secret;
		$data['data_type'] = 'XML';

		$postFields = http_build_query($data);
		
		// echo '<pre>';
		// print_r($postFields);
		// echo '</pre><br>';

		/*Preparing Query...*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$response = curl_exec($ch);

		/*Check for any errors*/
		$errorMessage = curl_exec($ch);
		// echo $errorMessage;
		curl_close($ch);

		/*Will print back the response from the call*/
		/*Used for troubleshooting/debugging		*/
		// echo $request_url;
		// var_dump($data);
		// var_dump($response);
		if(!$response){
			return false;

			echo '<pre>';
			print_r($response);
			echo '</pre>';
		}
		else {

			// echo '<pre>';
			// print_r($response);
			// echo '</pre>';
$xmls = simplexml_load_string($response);
// foreach($xmls as $xml)
// {
// }

    echo '<div class="text-center"><a target="_blank" href="'. (string)$xmls->start_url  .'">Download the Your own Shell</a>' . '<br>';
    echo '<a target="_blank" href="'. (string)$xmls->join_url  .'">Link for other user to Join Meeting</a>' . '<br></div>';
		}
}

else {
	echo '<h1>Please choose a user to create meeting as</h1>';
}
		
?> 