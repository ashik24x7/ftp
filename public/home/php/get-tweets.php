<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "IT_RAYS";
$notweets = 30;
$consumerkey = "N9Sl8Uq9caanKlvnEZBSIWLpW";
$consumersecret = "JUS4jMeDPJsEmPXchYKI4zh583RQo31swpSV4ANDQ8riIDYbme";
$accesstoken = "2824230753-sAOfq7PUvM8uoIKDV96vnrPAExFjXZ4EQRhxbYu";
$accesstokensecret = "SYwRqp9o1sCZttAc4Sb9Z6BwYvufm6oQ3vutUG7j8aPKf";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>