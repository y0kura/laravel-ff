<?php
// echo "処理のはじまりはじまり～！\n\n"; // ここをコメントアウト
// ファイルのロード
require_once('./classes/Lives.php');
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Message.php');

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
$messageObj = new Message();

//終了条件の判定
function isFinish($objects){
    $deatuCnt = 0;
    foreach ($objects as $object){
        if($object->getHitPoint() > 0){
            return false;
        }
        $deatuCnt++;
    }
    //仲間の数が死亡数（HPが0以下の数）と同じであればtrueを返す
    if($deatuCnt === count($objects)){
        return true;
    }
}

//どちらかのHPが0になるまで繰り返す
while(!$isFinishFlg){
    echo "*** $turn ターン目 ***\n\n"; // ここを追加

    //仲間の表示
    $messageObj->displayStatusMessage($members);

    //敵の表示
    $messageObj->displayStatusMessage($enemies);

    //仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);

    //敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);

    //仲間の全滅チェック
    $isFinishFlg = isFinish($members);
    if($isFinishFlg){
        $message = "GAME OVER ....\n\n";
        break;
    }

    //敵の全滅チェック
    $isFinishFlg = isFinish($enemies);
    if($isFinishFlg){
        $message = "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $message;

//仲間の表示
$messageObj->displayStatusMessage($members);

//敵の表示
$messageObj->displayStatusMessage($enemies);

