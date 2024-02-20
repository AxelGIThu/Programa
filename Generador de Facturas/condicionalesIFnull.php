<?php
if ($TImputacion2 != null) {
        $TImputacion = $TImputacion2;
    }

    if ($neto10y5 == null) {
        $neto10y5= $neto10y5 - ($neto10y5 * 0.105);
        $IVA10y5 = $neto10y5 * 0.105;
    }
    if ($neto21 == null) {
        $neto21= $neto21 - ($neto21 * 0.21);
        $IVA21   = $neto21   * 0.21;
    }
    if ($neto27 == null) {
        $neto27= $neto27 - ($neto27 * 0.27);
        $IVA27   = $neto27   * 0.27;
    }
    if ($PercDGR == null) {
        $PercDGR = 0;
    }
    if ($PercIVA == null) {
        $PercIVA = 0;
    }
    if ($PercMuni == null) {
        $PercMuni = 0;
    }
?>