<?php
session_start();


// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'y2525ijp@yahoo.co.jp';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
会社名：{$post['companyname']}
名前： {$post['name']}
電話番号: {$post['phone']}
メールアドレス： {$post['email']}
内容：{$post['contact']}
EOT;
     //var_dump($body);
     //exit();
    //mb_send_mail($to, $subject, $body, "From: {$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: thanks.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&family=Poppins:wght@100;400&display=swap" rel="stylesheet">
  　<link rel="stylesheet" href="styles/vendors/bootstrap-reboot.css">
    <link rel="stylesheet" href="styles/confirm-style.css" class="css">
</head>
<body>
    <div id="global-container">


<div class="Form">

  <h1>
    Contact
   </h1>
   <form action="" method="POST">
    <div class="Form-Item">
      <p class="Form-Item-Label">
        <span class="Form-Item-Label-Required">必須</span>会社名 </p>
        <p><?php echo htmlspecialchars($post['companyname']); ?></p>
      
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>氏名</p>
      <p><?php echo htmlspecialchars($post['name']); ?></p>
      
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>電話番号</p>
      <p><?php echo htmlspecialchars($post['phone']); ?></p>
    
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
      <p><?php echo htmlspecialchars($post['email']); ?></p>
      
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
      <p><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>
    
    </div>
    <div class="btn-container">
    <div class="return-btn">
        <button class="btn filled" ><a href="contact.php" >戻る</a></button>
  </div>
  <div class="submit-btn">
  <input type="submit" class="btn filled" value="送信する">
  </div>
</form>
</div>


<footer>
<p>©︎YK Design 2021</p>
</footer>


</div>

<script src="scripts/main.js"></script>
</body>
</html>