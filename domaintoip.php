<?php
echo"===================[ domain to ip ]======================";
echo "\r\n";  
echo"\n";
$input_file = readline('0axz- input target: ');
$c_name = readline('0axz- save target: ');
$save = fopen($c_name,'w');
if (file_exists($input_file)){

    $baca = fopen($input_file,"r");
    while(!feof($baca)){
        $line = fgets($baca);
        if ($line === null)break;
        $string = trim(preg_replace('/\s\s+/', ' ', $line));   
        $ipaddres = gethostbyname($string);
        if( filter_var($ipaddres, FILTER_VALIDATE_IP)){
            // echo ' Hostname is an IP address already'. PHP_EOL;
            echo $ipaddres. PHP_EOL;
            fwrite($save,$ipaddres. PHP_EOL); 
        }elseif($ipaddres==$string){
            echo  'time out - '.$string. PHP_EOL;
        }
    }
    fclose($baca);   
    fclose($save);
}else{
    echo 'file not found';
}
?>
