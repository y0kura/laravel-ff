<?php


class Enemy extends Lives
{
    // プロパティ
    const MAX_HITPOINT =50;

    //コンストラクタ
    public function __construct($name, $attackPoint)
    {
        $hitPoint=50;
        $intelligence = 0;
        parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
    }

}