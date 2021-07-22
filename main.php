<?php
// echo "処理のはじまりはじまり～！\n\n"; // ここをコメントアウト
// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

// インスタンス化
$members = array();
$members[] = new Brave("ティーダ");
$members[] = new BlackMage("ユウナ");
$members[] = new WhiteMage("ルールー");

$enemies = array();
$enemies[] = new Enemy("ゴブリン", 20);
$enemies[] = new Enemy("ボム",25);
$enemies[] = new Enemy("モルボル", 30);

$turn = 1;
$isFinishFlg = false;
//どちらかのHPが0になるまで繰り返す
while(!$isFinishFlg){
    echo "*** $turn ターン目 ***\n\n"; // ここを追加

    //現在のHPを表示
    foreach ($members as $member){
        echo $member->getName().":".$member->getHitPoint()."/".$member::MAX_HITPOINT."\n";
    }
    echo "\n";
    foreach ($enemies as $enemy){
        echo $enemy->getName().":".$enemy->getHitPoint()."/".$enemy::MAX_HITPOINT."\n";
    }
    echo "\n";

    //攻撃
    //味方
    foreach ($members as $member){
        //白魔道士の場合、味方のオブジェクトも渡す
        if(get_class($member) == "WhiteMage"){
            $member->doAttackWhiteMage($enemies, $members);
        }else{
            $member->doAttack($enemies);
        }
        echo "\n";
    }
    //敵
    foreach ($enemies as $enemy){
        $enemy->doAttack($members);
        echo "\n";
    }

    //仲間の全滅チェック
    $deatuCnt = 0;
    foreach ($members as $member){
        if($member->getHitPoint() > 0){
            $isFinishFlg = false;
            break;
        }
        $deatuCnt++;
    }
    if($deatuCnt === count($members)){
        $isFinishFlg = true;
        echo "GAME OVER ....\n\n";
        break;
    }

    //敵の全滅チェック
    $deatuCnt = 0;
    foreach ($enemies as $enemy){
        if($enemy->getHitPoint() > 0){
            $isFinishFlg = false;
            break;
        }
        $deatuCnt++;
    }
    if($deatuCnt === count($enemies)){
        $isFinishFlg = true;
        echo "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
// 現在のHPの表示
foreach ($members as $member) {
    echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";
foreach ($enemies as $enemy) {
    echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
}

