<!--This page is for downloading all QRcode images in zip form -->

<?php
 session_start();
 require "../../db.php";
if(!isset($_SESSION['userId'])){
 header("location:login.php");
 die();
}
	
    $sql = messagQueue("SELECT * FROM qrcode_image");

    // create zip
    $zip = new ZipArchive();
    $filename = "all-qrcode-image.zip";
    // $zip_file = "../file/all-image.zip";

    if($zip->open($filename, ZipArchive::CREATE)==FALSE){
        die("Can't open $filename.");
    }

    while ($row = $sql->fetch_assoc()){

        $imageName = $row['name'];
        $zip->addFile("$imageName");
    }

        $zip->close();

        //download created zip file
        if(file_exists($filename)){
            ob_clean();
            ob_end_flush();
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename="'.$filename.'"');
            
            readfile($filename); //auto download

            //delete this zip file after download
            unlink($filename);
        }

?>