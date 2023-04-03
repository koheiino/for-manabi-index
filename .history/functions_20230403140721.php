<?php


/**
 * xss対策：エスケープ処理
 * 
 *  @param string $str 対象の文字列
 *  @return string 処理された文字列
 */

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UFT-8');
}



/**
 * csrf対策
 * 
 *  @param void
 *  @param string $csrf_token
 */
function setToken()
{
    //トークンを生成
    //フォームからそのトークンを送信
    //送信後の画面でそのトークンを照会
    //トークン削除
    session_start();
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    return $csrf_token;
}
?>>