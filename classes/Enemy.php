<?php


class Enemy
{
    // プロパティ
    const MAX_HITPOINT =50;
    private $name;
    private $hitPoint=50;
    private $attackPoint=10;

    //コンストラクタ
    public function __construct($name, $attackPoint)
    {
        $this->name = $name;
        $this->attackPoint = $attackPoint;
    }

    // メソッド
    public function doAttack($human)
    {
        echo"『{$this->getName()}』の攻撃!\n";
        echo"【{$human->getName()}】に{$this->attackPoint}のダメージ!\n";
        $human->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }

    //アクセサーメソッド
    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
}