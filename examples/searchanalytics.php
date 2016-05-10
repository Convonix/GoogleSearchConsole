<?php

session_start();

include_once '../vendor/autoload.php';
include_once '../config.php';
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$client = new Google_Client();
$client->setClientId($apiConfig['oauth2_client_id']);
$client->setClientSecret($apiConfig['oauth2_client_secret']);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/webmasters");

if (isset($_REQUEST['logout'])) {
  unset($_SESSION);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

?>
<div class="request">
<?php 
    if (isset($authUrl)) {
      echo "<a class='login' href='" . $authUrl . "'>Connect w Google</a>";
    } else {
      echo"<a class='logout' href='?logout'>Logout</a>";
}
?>
</div>
<?php

if ($client->getAccessToken()) {
  $_SESSION['access_token'] = $client->getAccessToken();


  $webmastersService = new Google_Service_Webmasters($client);
  $searchanalytics = $webmastersService->searchanalytics;

    $request = new \Google_Service_Webmasters_SearchAnalyticsQueryRequest();
	/* Request body */
    $request->setStartDate('2016-03-01');
    $request->setEndDate('2016-03-31');
    $request->setRowLimit(10);
    try {
       $response = $searchanalytics->query('<site url>', $request);			/* Enter site url  */
       echo "<pre>";
       print_r($response);
       echo "</pre>";
     } catch(\Exception $e ) {
        echo $e->getMessage();
     }  
}
?>
