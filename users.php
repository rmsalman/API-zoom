<?php



include 'header.php';
echo '<h1 class="text-center">All invited users</h1>
<h2 class="">Click to create urgent meeeting as</h2>
  <div class="jumbotron">';
// if(isset($_POST['email']) && !empty($_POST['email'])){



    $listUsersArray = array();



  /*The API Key, Secret, & URL will be used in every function.*/
   $api_key = '88MFWDVhSKmfo58d24ZJxw';
   $api_secret = '3R13SzMNCd6NKjp4exgHvDUCcUWUkGKsx6Bs';
   $api_url = 'https://api.zoom.us/v1/';




    $data = array();
    // // $data['email'] = $_POST['userEmail'];
    // // $data['type'] = $_POST['userType'];

    // $data['email'] = $_POST['email'];
    // $data['type'] = '1';

    $request_url = $api_url.'user/list';

    /*Adds the Key, Secret, & Datatype to the passed array*/
    $data['api_key'] = $api_key;
    $data['api_secret'] = $api_secret;
    $data['data_type'] = 'XML';

    $postFields = http_build_query($data);
    
    // echo $postFields;

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
    /*Used for troubleshooting/debugging    */
    // echo $request_url;
    // var_dump($data);

    // print_r($response);
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

$xml = simplexml_load_string($response);
foreach($xml->users->user as $item)
{
    echo '<a href="webinnar.php?id='. (string)$item->id  .'">'.(string)$item->first_name. ' ' . (string)$item->last_name .'</a>' . '<br>';
}

    }


    
?> 