<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        use Sabre\VObject;
        
        include 'vendor/autoload.php';
        
        $file = fopen("contacts.vcf", "r") or die("Unable to open file!");
        $file = fread($file, filesize("contacts.vcf"));
        $cons = str_replace('END:VCARD', 'END:VCARD%%%', $file);
        $cons = explode('%%%',$cons);
        //print_r($file);
        foreach ($cons as $value){
            $vcard = VObject\Reader::read($value);
            foreach($vcard->TEL as $tel) {
                echo 'Phone number: ', $tel, "\n";
            }
        }

        ?>
    </body>
</html>
