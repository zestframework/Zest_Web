<?php

namespace App\Controllers;
use \Zest\View\View;

class Reader extends \Zest\Controller\Controller
{
    public function index ()
    {

    }
    public function image()
    {
        $file = $this->route_params['image'];
        $path = "../Storage/Data/";
        $image = $path . $file;
		header('Content-Type: image/png');
		header('Content-Type: image/jpeg');
		header('Content-Type: image/jpg');
        header('Content-Type: image/gif');
        readfile($image);
    }
    public function zip()
    {
        $file = $this->route_params['zip'];
        $path = "../Storage/Data/";
        $zip = $path . $file;
		// http headers for zip downloads);
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"".$file."\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($zip));
		readfile($zip);
		redirect('prev');
    } 
}    