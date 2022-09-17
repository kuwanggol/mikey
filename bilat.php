<?php
//Facebook Api Updater
ini_set('max_execution_time', 0);

function mikey(){
$gatherup = "https://m.facebook.com/messages/read/?tid=cid.g.5592784830743877";
$user_cookie = "c_user=100078652545571; xs=48%3AdARW_BzuqSk47Q%3A2%3A1663367534%3A-1%3A7863";
$curl = curl_init($gatherup);
curl_setopt($curl, CURLOPT_URL, $gatherup);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"Cookie: ".$user_cookie,
"User-Agent: ".$_SERVER['HTTP_USER_AGENT'],
"Content-Type: application/x-www-form-urlencoded",
"Origin: https://www.facebook.com",
"Referer: https://www.facebook.com",
"Upgrade-Insecure-Requests: 1",
"Sec-Fetch-Dest: document",
"Sec-Fetch-Mode: navigate",
"Sec-Fetch-Site: same-origin",
"Sec-Fetch-User: ?1",
"Te: trailers"
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$gatherresp = curl_exec($curl);
//echo $gatherresp;
$tocount = explode("div class=&quot;_34ej&quot;&gt;",htmlentities($gatherresp));
$fb_dtsg = "fb_dtsg=".explode("&quot;",explode("name=&quot;fb_dtsg&quot; value=&quot;",htmlentities($gatherresp))[1])[0];
$jazoest = "jazoest=".explode("&quot;",explode("name=&quot;jazoest&quot; value=&quot;",htmlentities($gatherresp))[1])[0];
$prevchat = explode("&lt;/div&gt;",$tocount[count($tocount) - 1])[0];
if($prevchat == "test"){
$msgbody = "Working test";
}elseif($prevchat == "Hi"){
$msgbody = "Hello?";
}else{
//$msgbody = "Error!";
mikey();
exit();
}
$data = $fb_dtsg."&".$jazoest."&body=".$msgbody."&send=Send&tids=cid.g.5592784830743877";

$url = "https://mbasic.facebook.com/messages/send/?icm=1&refid=12";




$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"Cookie: ".$user_cookie,
"User-Agent: ".$_SERVER['HTTP_USER_AGENT'],
"Accept: */*",
"Referer: https://mbasic.facebook.com/",
"X-Response-Format: JSONStream",
"X-Requested-With: XMLHttpRequest",
"X-Fb-Lsd: Zjsqla9pVRcP2EjDQtnxQ6",
"X-Msgr-Region: PNB",
"Content-Type: application/x-www-form-urlencoded",
"Origin: https://mbasic.facebook.com/",
"Sec-Fetch-Dest: empty",
"Sec-Fetch-Mode: cors",
"Sec-Fetch-Site: same-origin",
"Te: trailers"
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, 0);
$resp = curl_exec($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
//echo $httpcode;
//mikey();
}
mikey();
?>
