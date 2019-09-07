<?php

include 'config.php';
// activar imap en php.ini

$authhost="{imap.gmail.com:993/imap/ssl/novalidate-cert}";
$authhost="{imap.gmx.net:993/imap/ssl/novalidate-cert}INBOX";
$authhost="{imap.strato.de:993/imap/ssl/novalidate-cert}INBOX";

if ($mbox=imap_open( $authhost, $user, $pass )){
	echo "<h1>Connected</h1>\n";
	
	for($i=imap_num_msg($mbox);$i>0;$i--){
		$a=imap_fetchheader ( $mbox , $i);
		$a=iconv_mime_decode_headers($a);
		echo '<h2>'.$i.'</h2>';
		echo '<pre>';
		print_r($a);
		echo '</pre>';
	}		
	
	imap_close($mbox);
}
else{
	echo "<h1>FAIL!</h1>\n";
}
?>