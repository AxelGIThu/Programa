<?php

if ($neto10y5 == null) {
    $neto10y5 = 0.00;
}
if ($neto21 == null) {
    $neto21 = 0.00;
}
if ($neto27 == null) {
    $neto27 = 0.00;
}
if ($PercDGR == null) {
    $PercDGR = 0.00;
}
if ($PercIVA == null) {
    $PercIVA = 0.00;
}
if ($PercMuni == null) {
    $PercMuni = 0.00;
}

$IVA10y5 = $neto10y5 * 0.105;
$IVA21   = $neto21   * 0.21;
$IVA27   = $neto27   * 0.27;

?>