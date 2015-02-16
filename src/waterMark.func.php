<?php 
    /**
     * @author litongxue <litonglitong@hotmail.com>
     * @copyright Copyright 2015, litongxue <litonglitong@hotmail.com>
     * @license http://www.opensource.org/licenses/mit-license.php The MIT License
     *
     * 
     * This is a simple function that it supports image apply waterimage and watertext 
     * @param  string  $src       the sourceimage path
     * @param  string  $dst       the targetimage path
     * @param  integer $waterPos  the postion of watermark
     * @param  string  $waterIm   the waterimage path
     * @param  integer $pct       the water image transparent status limit 0 to 100
     * @param  string  $waterText watertext
     * @param  integer $textFont  font of watertext
     * @param  string  $textColor color of watertext
     * @return int         will return error code other than code 0 that means success
     */
    function waterMark($src, $dst, $waterPos=7, $waterIm, $pct=100, $waterText="watertext", $textFont=5, $textColor="#ff0000") {
        if(!extension_loaded('gd')) {
            return 6; // gd extention is not installed
        } 
        $imageFuncMap = array('1'=>'imagecreatefromgif', '2'=>'imagecreatefromjpeg', '3'=>'imagecreatefrompng');
        if(!empty($src) && file_exists($src)) {
            list($srcWidth, $srcHeight, $srcSuffix) = getimagesize($src);
            if(in_array($srcSuffix, array(1, 2, 3))) {
                $srcIm = call_user_func($imageFuncMap[$srcSuffix], $src);
            } else {
                return 1; //$src only supports gif, jpg, png format
            }
        } else {
            return 2; //not exist src file;
        }
        $isWaterIm = false;
        if(!empty($waterIm) && file_exists($waterIm)) {
            list($waterWidth, $waterHeight, $waterSuffix) = getimagesize($waterIm);
            if(in_array($waterSuffix, array(1, 2, 3))) {
                $waterIm = call_user_func($imageFuncMap[$waterSuffix], $waterIm);
                $isWaterIm = true;
            } else {
                return 3; //waterimage only supports gif, jpg, png format
            }
        } else {
            $temp = imagettfbbox(ceil($textFont*5),0,"elephant.ttf",$waterText);//defaulted watertext is elephant 
            $waterWidth = $temp[2] - $temp[6];
            $waterHeight = $temp[3] - $temp[7];
            unset($temp);

        }
        if($waterWidth > $srcWidth || $waterHeight > $srcHeight) {
            return 4; //waterimage is larger than the src;
        }

        switch($waterPos) {
            case 0://random
                $waterPosX = rand(0,($srcWidth - $waterWidth));
                $waterPosY = rand(0,($srcHeight - $waterHeight));
                break;
            case 1://top left
                $waterPosX = 0;
                $waterPosY = 0;
                break;
            case 2://top center
                $waterPosX = ($srcWidth - $waterWidth) / 2;
                $waterPosY = 0;
                break;
            case 3://top right
                $waterPosX = $srcWidth - $waterWidth;
                $waterPosY = 0;
                break;
            case 4://center left
                $waterPosX = 0;
                $waterPosY = ($srcHeight - $waterHeight) / 2;
                break;
            case 5://center
                $waterPosX = ($srcWidth - $waterWidth) / 2;
                $waterPosY = ($srcHeight - $waterHeight) / 2;
                break;
            case 6://center right
                $waterPosX = $srcWidth - $waterWidth;
                $waterPosY = ($srcHeight - $waterHeight) / 2;
                break;
            case 7://footer left
                $waterPosX = 0;
                $waterPosY = $srcHeight - $waterHeight;
                break;
            case 8://footer center
                $waterPosX = ($srcWidth - $waterWidth) / 2;
                $waterPosY = $srcHeight - $waterHeight;
                break;
            case 9://footer right
                $waterPosX = $srcWidth - $waterWidth;   
                $waterPosY = $srcHeight - $waterHeight;  
                break;
            default://random
                $waterPosX = rand(0,($srcWidth - $waterWidth));
                $waterPosY = rand(0,($srcHeight - $waterHeight));
                break;
        }
        if($isWaterIm) {
            imagecopymerge($srcIm, $waterIm, $waterPosX, $waterPosY, 0, 0, $waterWidth, $waterHeight, $pct);
        } else {
            if(!empty($textColor) && (strlen($textColor)==7)) {
                $r = hexdec(substr($textColor, 1, 2));
                $g = hexdec(substr($textColor, 3, 2));
                $b = hexdec(substr($textColor, 5));
            } else {
                return 5; //textColor wrong  fomat
            }
            imagestring($srcIm, $textFont,$waterPosX,$waterPosY,$waterText,imagecolorallocate($srcIm,$r,$g,$b));
        }

        $createImageFuncMap = array('1'=>'imagegif', '2'=>'imagejpeg', '3'=>'imagepng');
        $dst = !empty($dst)?$dst:$src;
        call_user_func_array($createImageFuncMap[$srcSuffix], array($srcIm, $dst));

        if(isset($waterIm) && !empty($waterIm)) {
            imagedestroy($waterIm);
        } 
        imagedestroy($srcIm);
        return 0; //success
    }

?>