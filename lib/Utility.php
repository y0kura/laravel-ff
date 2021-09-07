<?php
function isFinish($objects)
{
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($objects as $object) {
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($objects)) {
        return true;
    }
}