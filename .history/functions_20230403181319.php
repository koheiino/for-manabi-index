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

<!-- 
このコードは、CSRF（Cross-Site Request Forgery）攻撃を防止するためのトークンを生成する関数です。
CSRF攻撃は、悪意のあるサイトから不正なリクエストを送信されることで、セッションなどの権限を奪われたユーザーが勝手に操作を行ってしまうという攻撃です。
この関数は、その攻撃を防止するための対策として、以下の手順でトークンを生成しています。

1. session_start() によってセッションを開始し、セッション変数を使用できるようにします。
2. bin2hex(random_bytes(32)) によって、32バイトのランダムなバイト列を生成します。
3. 生成されたバイト列を16進数の文字列に変換して、CSRFトークンとしてセッション変数 $_SESSION['csrf_token'] に保存します。
4. 生成されたトークンを返します。
この関数を使用する場合は、フォームの送信時に生成されたトークンを含めて送信し、送信後にトークンを照会する必要があります。
また、一度使用されたトークンは削除する必要があります。
 -->