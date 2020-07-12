<?php
ini_set('log_errors','on');
ini_set('error_log','php.log');
session_start();


// 自分のHP
define("MY_HP",500);
// モンスター達格納用
$monsters = array();

$monsters[] = array(
    'name' => 'フランケン',
    'hp' => 100,
    'img' => 'img/monster01.png',
    'attack' => mt_rand(20,40)
);
$monsters[] = array(
    'name' => 'フランケンNEO',
    'hp' => 300,
    'img' => 'img/monster02.png',
    'attack' => mt_rand(20,60)
);
$monsters[] = array(
    'name' => 'ドラキュリー',
    'hp' => 200,
    'img' => 'img/monster03.png',
    'attack' => mt_rand(30,50)
);
$monsters[] = array(
    'name' => 'ドラキュリー男爵',
    'hp' => 400,
    'img' => 'img/monster04.png',
    'attack' => mt_rand(50,100)
);
$monsters[] = array(
    'name' => 'スカルフェイス',
    'hp' => 150,
    'img' => 'img/monster05.png',
    'attack' => mt_rand(30,60)
);
$monsters[] = array(
    'name' => '毒ハンド',
    'hp' => 100,
    'img' => 'img/monster06.png',
    'attack' => mt_rand(20,30)
);
$monsters[] = array(
    'name' => '泥のハンド',
    'hp' => 120,
    'img' => 'img/monster07.png',
    'attack' => mt_rand(20,30)
);
$monsters[] = array(
    'name' => '血のハンド',
    'hp' => 180,
    'img' => 'img/monster08.png',
    'attack' => mt_rand(30,50)
);

function createMonster(){
    global $monsters;
    $viewMonster = $monster[mt_rand(0,7)];
    unset($_SESSION['name']);
    unset($_SESSION['hp']);
    unset($_SESSION['img']);
    $_SESSION['name'] = $viewMonster['name'];
    $_SESSION['hp'] = $viewMonster['hp'];
    $_SESSION['img'] = $viewMonster['img'];
    $_SESSION['attack'] = $viewMonster['attack'];
    $_SESSION['history'] = $viewMonster['name'].'が現れた!';
}
function init(){
    $_SESSION['history'] = '初期化します！<br>';
    $_SESSION['knockDownCount'] = 0;
    $_SESSION['myhp'] = MY_HP;
    createMonster();
}
function gameOver(){
    $_SESSION = array();
}
// 1.post送信されていた場合
if(!empty($_POST)){
    $attackFlg = (!empty($_POST['attack'])) ? true : false;
    $startFlg = (!empty($_POST['start'])) ? true : false;
    error_log('POSTされた！');
}
?>