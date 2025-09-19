<?php
// ★ ここを自分の受け取りたいメールアドレスに書き換えてください
$to = "hirotakefu@gmail.com";

// フォームからの入力を受け取る
$name    = $_POST["name"] ?? "";
$email   = $_POST["email"] ?? "";
$subject = $_POST["subject"] ?? "お問い合わせ";
$message = $_POST["message"] ?? "";

// メール本文を作成
$body  = "以下のお問い合わせがありました。\n\n";
$body .= "お名前: $name\n";
$body .= "メール: $email\n";
$body .= "件名: $subject\n\n";
$body .= "内容:\n$message\n";

// 送信元（From ヘッダーにユーザー入力を直接使うのは避ける）
$headers = "From: no-reply@example.com\r\n";
$headers .= "Reply-To: $email\r\n";

// メール送信
if (mail($to, "[Webお問い合わせ] $subject", $body, $headers)) {
    echo "送信が完了しました。ありがとうございました！";
} else {
    echo "送信に失敗しました。もう一度お試しください。";
}
