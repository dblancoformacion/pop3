<?php

include 'config.php';

echo 'hola mundo';

$authhost="{imap.gmail.com:993/imap/ssl/novalidate-cert}";

if ($mbox=imap_open( $authhost, $user, $pass )){
	echo "<h1>Connected</h1>\n";
	
	for($i=imap_num_msg($mbox);$i>0;$i--){
		$a=imap_fetchheader ( $mbox , $i);
		$a=iconv_mime_decode_headers($a);
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