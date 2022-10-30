<?php
$file=$_GET['down'];
// $file_pdf=mysqli_query($conn,"SELECT pdf from `products` where id=$file");

header("content-disposition: attachment; filename=".$_GET['down']);
$fb=fopen($file,"r");
while(!feof($fb)){
    echo fread($fb,1024*8);
    flush();
}
fclose($fb);


?>