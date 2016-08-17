<?php
   // require_once "phpqrcode/qrlib.php";    

	$number = "4004";
	$code = "GAME1";
	$name = "Константинова Елена Владимировна";
	$gender = "F";
	$course = "НАНОИГРЫ";
	$qtime = "11 час. 18 мин.";
	$qlessons = "11";
	$study = "разработки простых игровых программ\nна языке программирования C#";
	$url = "http://videosharp.info/4004/certify-".$code;
	
	$image = imagecreatefrompng ( "blank.png" );
	
	$color_black = imagecolorallocate($image,0,0,0);
	$color_brown = imagecolorallocate($image,103,84,51);

	text_center($image, "№ ".$code." - ".$number, 'bookosb.ttf', $color_brown, 0,550,1024,30);
	text_center($image, "подтверждает, что", 'bookos.ttf', $color_black, 0,600,1024,20);	
	text_center($image, $name, 'bookosbi.ttf', $color_black, 0,665,1024,26);
	if($gender === "M")
		$text = "выполнил все задания видеокурса";
	else
		$text = "выполнила все задания видеокурса";
	text_center($image, $text, 'bookos.ttf', $color_black, 0,720,1024,20);	
	text_center($image, "&#171;".$course."&#187;", 'bookosb.ttf', $color_black, 0,790,1024,30);
	if($qtime =="0") $qtime = "";
	if(($qlessons/10)%10 !=1) {
		if($qlessons % 10 == 1) $qlessons = $qlessons." урок"; 
		else if($qlessons % 10 < 5) $qlessons = $qlessons." урока";
		else $qlessons = $qlessons." уроков";
	}
	else $qlessons = $qlessons." уроков";
	$text = "общим объемом ".$qtime." / ".$qlessons."\n";
	if($gender == "M") $text = $text."и овладел практическими навыками\n";
	else $text = $text."и овладела практическими навыками\n";
	$text = $text.$study;
	
 	text_center($image, $text, 'bookos.ttf', $color_black, 0,850,1024,20);	
   
 /*   QRcode::png($url, "test.png");
	$qr = imagecreatefrompng ( "test.png" );
	imagecopyresized ( $image , $qr , 795 , 1025 , 10 , 10 , 160 , 160 , 90 , 90 );*/
	
	imagepng($image,'image.png');

function text_center($im, $str, $font, $textColor, $pad_left, $padTop, $width_text, $font_size) 
{
    $arr = explode(' ', $str); $ret = "";
    foreach($arr as $word){ 
        $tmp_string = $ret.' '.$word;
        $testbox = imagettfbbox($font_size, 0, $font, $tmp_string);
        if($testbox[2] > $width_text) $ret.=($ret==""?"":"\n").$word; 
        else $ret.=($ret==""?"":" ").$word;
     }
    $arr = explode("\n", $ret);
	foreach($arr as $str){
		$testbox = imagettfbbox($font_size, 0, $font, $str);// Размер строки 
		$left_x = round(($width_text - ($testbox[2] - $testbox[0]))/2);
		imagettftext($im, $font_size, 0, $left_x +$pad_left, ($padTop), $textColor, $font, $str);
		$padTop=$padTop+ $font_size*1.5;
    }
}
?>