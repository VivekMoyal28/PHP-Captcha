<?php
session_start();
define('CAPTCHA_WIDTH', 150);
define('CAPTCHA_HEIGHT', 40);
define('CAPTCHA_NUMCHARS',6);
$pass_phrase="";
for($i=0;$i< CAPTCHA_NUMCHARS;$i++)
{
    $pass_phrase.=chr(rand(97,122));
}
$_SESSION["captcha"]=$pass_phrase;
$img=  imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
$bgcolor=imagecolorallocate($img, 225, 225, 225);
$textcolor=imagecolorallocate($img, 0, 0, 0);
$graphiccolor=imagecolorallocate($img, 64, 64, 64);
imagefilledrectangle($img, 0, 0,CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bgcolor);
$font = dirname(__FILE__) . '/ARIALN.TTF';
for($i=0;$i< 4;$i++)
{
    imageline($img,0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphiccolor);
}
for($i=1;$i< 50;$i++)
{
    imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphiccolor);
}
    imagettftext($img, 24, 0, 20, CAPTCHA_HEIGHT-10, $textcolor, $font, $pass_phrase);
    header("Content-type:image/png");
    imagepng($img);
    imagedestroy($img);
?>
