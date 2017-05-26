<?php


	/*The API Key, Secret, & URL will be used in every function.*/
		$api_key = '88MFWDVhSKmfo58d24ZJxw';
		$api_secret = '3R13SzMNCd6NKjp4exgHvDUCcUWUkGKsx6Bs';
		$api_url = 'https://api.zoom.us/v1/';

		$data = array();

		$data['email'] = 'salman.saeed786921@gmail.com';
		// $data['host_id'] = '1T0mYZAmQGu6Cl8da9p91g';
		$data['type'] = '1';

		$data['password'] = 'salman123';



		$request_url = $api_url.'user/autocreate';

		/*Adds the Key, Secret, & Datatype to the passed array*/
		$data['api_key'] = $api_key;
		$data['api_secret'] = $api_secret;
		$data['data_type'] = 'JSON';

		$postFields = http_build_query($data);
		
		echo '<pre>';
		print_r($postFields);
		echo '</pre><br>';

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
		var_dump($data);
		var_dump($response);
		if(!$response){
			return false;

			echo '<pre>';
			print_r($response);
			echo '</pre>';
		}
		else {
			echo '<pre>';
			print_r($response);
			echo '</pre>';
		}


		
?> 