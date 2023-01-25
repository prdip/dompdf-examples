<?php  
require 'vendor/autoload.php';   
use Dompdf\Dompdf;     

$tmp = $_SERVER['DOCUMENT_ROOT'].'/domdata/fonts/'; 
$html = '
        <!DOCTYPE html>
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            @font-face {
                font-family: "noto";
                font-style: normal;
                font-weight: normal;
                src:url('.$tmp.'noto.ttf) format("truetype");
            }
            .m {
                font-family: noto,sans-serif;
            }
        </style>
        </head>
        <body>
            <p class="m">
                ટેસ્ટ ડેટા ચેક
            </p>
        </body>
        </html> ';
 
$dompdf = new Dompdf([
    'logOutputFile' => '', 
    'isRemoteEnabled' => true, 
    'fontDir' => $tmp,
    'fontCache' => $tmp,
    'tempDir' => $tmp,
    'chroot' => $tmp,
]);

$dompdf->loadHtml($html); //load an html

$dompdf->render();

$dompdf->stream('hello.pdf', [
    'compress' => true,
    'Attachment' => false,
]);