<?php


class BlackMage extends Human
{
    //プロパティ
    const MAX_HITPOINT = 80;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 10;
    private $intelligence = 30;

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
    }

    public function doAttack($enemies)
    {

        //自分のHPが0以上か、敵のHPが0以上か
        if(!$this->isEnableAttack($enemies)){
            return false;
        }
        //ターゲットの決定
        $enemy = $this->selectTarget($enemies);

        if(rand(1,2) === 1){
            echo "『" .$this->getName() . "』のスキルが発動した！\n";
            echo "『ファイア』！！\n";
            echo $enemy->getName() . " に " . $this->intelligence * 1.5 . " のダメージ！\n";
            $enemy->tookDamage($this->intelligence * 1.5);
        }else{
            parent::doAttack($enemies);
        }
        return true;
    }
}