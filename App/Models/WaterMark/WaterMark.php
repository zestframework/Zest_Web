<?php

namespace App\Models\WaterMark;

class WaterMark
{	

	/**
     * @source http://talkerscode.com/webtricks/add-watermark-to-an-image-using-php.php
    */
    public function add($slug)
    {
        // Set the thumbnail name
        $thumbnail = route()->storage_data.$slug; 

        $uploadImage = route()->storage_data.$slug;

        $source = imagecreatefromstring(file_get_contents($uploadImage));

        // load the image you want to you want to be watermarked
        $watermark = imagecreatefrompng(route()->models.'WaterMark/zest.png');

        //WaterMark opacity
        $opacity = 0.5;
        imagealphablending($watermark, false); // imagesavealpha can only be used by doing this for some reason
        imagesavealpha($watermark, true); // this one helps you keep the alpha. 
        $transparency = 1 - $opacity;
        imagefilter($watermark, IMG_FILTER_COLORIZE, 0,0,0, (127 * $transparency)); // the fourth parameter is alpha



        // get the width and height of the watermark image
        $waterWidth = imagesx($watermark);
        $waterHeight = imagesy($watermark);

        // get the width and height of the main image image
        $mainWidth = imagesx($source);
        $mainHeight = imagesy($source);

        // Set the dimension of the area you want to place your watermark we use 0
        // from x-axis and 0 from y-axis 
        $dimeX = (int) round(($mainWidth - $waterWidth) / 2);
        $dimeY = (int) round(($mainHeight - $waterHeight) / 2);

        /*var_dump($mainWidth);
        var_dump($mainHeight);
        var_dump($dimeX);
        var_dump($dimeY);*/

        // copy both the images
        imagecopy($source, $watermark, $dimeX, $dimeY, 0, 0, $waterWidth, $waterHeight);

        // Final processing Creating The Image
        imagepng($source, $thumbnail, 9);
       
    }
}
