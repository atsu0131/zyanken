<?php
// 40 じゃんけんを作成しよう！
// 下記の要件を満たす「じゃんけんプログラム」を開発してください。
// 要件定義
// ・使用可能な手はグー、チョキ、パー
// ・勝ち負けは、通常のじゃんけん
// ・PHPファイルの実行はコマンドラインから。
// ご自身が自由に設計して、プログラムを書いてみましょう！


    const STONE = 0;
    const SCISSORS = 1;
    const HAND = 2;
    
    // 手のリスト
    const HAND_LIST = array(
      STONE => 'グー',
      SCISSORS => 'チョキ',
      HAND => 'パー',
    );
    
    const WIN = 2;
    const LOSE = 1;
    const DRAW = 0;
    
    // 結果
    const RESULT_LIST = array(
      WIN => 'あなたの勝ちです',
      LOSE => 'あなたの負けです',
      DRAW => 'あいこです',
    );

    const NEXT = 0;
    const STOP = 1;


choose();


function continuousGameValidate($continue){
    if($continue == null){
        echo "空です"."\n";
        return false;
    }
    if($continue !=  NEXT && $continue != STOP){
        echo "0か1で入れてください"."\n";
        return false;
    }
    return true;
}

function continuous(){
    echo "ゲームを続けますか？ "."\n"."続ける場合は0を止める場合は1を押してください";
    $continue = trim(fgets(STDIN));
    if(!continuousGameValidate($continue)){
        echo "異なる番号が押されました";
        return continuous();
    }
    return $continue;
}

function show($result){
        // 結果リスト
    echo RESULT_LIST[$result]."\n";
    echo ""."\n";
}

function myhandValidate($myhand){
    if($myhand == null){
        echo "空です"."\n";
        return false;
    }
    if($myhand != STONE && $myhand != SCISSORS && $myhand != HAND){
        echo "0〜2で入れてください"."\n";
        return false;
    }
    return true;
}

function inputMyhand(){
    $myhand = trim(fgets(STDIN));
    if(myhandValidate($myhand)){
        return $myhand;
    }else{
        return inputMyhand();
    }
}

function getComhand(){

    $comhand = array_rand(HAND_LIST);
    return $comhand;
}

// 勝敗判定関数
function battle($myhand, $comhand) {
    return ($myhand - $comhand + 3) % 3;
}

function choose (){
    echo "ジャンケンポン"."\n";
    echo "グー：0,チョキ：1,パー：2"."\n";

    $myhand = inputMyhand();
    $comhand = getComhand();
    $result = battle($myhand, $comhand);
    show($result);
    if($result == DRAW){
        return choose();
    }else{
        if(continuous() == NEXT){
            return choose();
        }else{
            return false;
        }
    }
}
?>
