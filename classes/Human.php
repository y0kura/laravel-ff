<?php


class Human
{
    //    プロパティ
    const MAX_HITPOINT = 100; // 最大HPの定義 定数
    private $name; // キャラ名
    private $hitPoint; // 現在のHP
    private $attackPoint; // 攻撃力

    //コンストラクタ
    public function __construct($name, $hitPoint=100, $attackPoint=20)
    {
        $this->name = $name;
        $this->hitPoint=$hitPoint;
        $this->attackPoint=$attackPoint;
    }

    // メソッド
    public function doAttack($enemy)
    {
        echo "『".$this->getName()."』の攻撃!\n";
        echo "【".$enemy->getName()."】に".$this->attackPoint."のダメージ!\n";
        $enemy->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }

    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;
        if($this->hitPoint > $target::MAX_HITPOINT){
            $this->hitPoint = $target::MAX_HITPOINT;
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