<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tally APPS</title>
</head>

<body>
<?php

//$strXML="1.xml";

$requestXML = '<ENVELOPE>
<HEADER>
<TALLYREQUEST>Export Data</TALLYREQUEST>
</HEADER>
<BODY>
<EXPORTDATA>
<REQUESTDESC>
<REPORTNAME>List of Companies</REPORTNAME>
</REQUESTDESC>
</EXPORTDATA>
</BODY>
</ENVELOPE>';


$server = "http://127.0.0.1:9090/";
     $headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($requestXML) ,"Connection: close" );

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec($ch);



print_r($server_output);

$xml = new SimpleXMLElement($server_output);
print_r($xml); //giving  SimpleXMLElement Object ( )  empty array


echo '<pre>';
echo htmlspecialchars(print_r($server_output, true));
echo '</pre>';


?>





   <?php

//$json=json_decode($server_output);
//print_r($json);

    if(curl_errno($ch)){
        echo curl_error($ch);
        echo " $server  something went wrong..... try later ";
        if($_GET[counter]==$_GET[total])
        echo 'done###';
    }else{
 


        curl_close($ch);
    }
	
	
	
?>
</body>
</html>
