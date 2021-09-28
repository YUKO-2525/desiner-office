<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // フォームの送信時にエラーをチェックする
    if ($post['companyname'] === '') {
      $error['companyname'] = 'blank';
   }

    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['phone'] === '') {
      $error['phone'] = 'blank';
  }

    if ($post['contact'] === '') {
        $error['contact'] = 'blank';
    }

    if (count($error) === 0) {
        // エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
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
    <link rel="stylesheet" href="styles/form-style.css" class="css">
 </head>
 <body>
 <div id="global-container">
     <div class="contact-page__header">
              <div class="header">
                <img src="images/contactimg-min.jpg" class="contact-img">
                   <div class="header-line">
                     <a href="index.html">
                     <span class="logo__yk">YK</span>
                     <span class="logo__design">Design</span>
                   　</a>
                   </div>
             </div>  
  　　 </div>
    
　　　 <div class="Form">
　　　　　　<form action="" method="POST" novalidate>
              <h1> Contact</h1>
                <div class="Form-Item">
                  <p class="Form-Item-Label">
                    <span class="Form-Item-Label-Required">必須</span>会社名
                  </p>

                  <div class="form-inner">
                    <input type="text" class="Form-Item-Input" name="companyname" placeholder="例）株式会社YK Design" value="<?php echo htmlspecialchars($post['companyname']);?>"required>
                   <?php if ($error['companyname'] === 'blank'): ?>
                    <div><p class="error-msg">※会社名をご記入ください。</p></div>
                    <?php endif; ?>
                  </div>
               </div>
              

              <div class="Form-Item">
                  <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>氏名</p>
                  <div class="form-inner">
                    <input type="text" class="Form-Item-Input" name="name" placeholder="例）佐藤太郎" value="<?php echo htmlspecialchars($post['name']);?>"required>
                    <?php if ($error['name'] === 'blank'): ?>
                      <p class="error-msg">※お名前をご記入ください。</p>
                    <?php endif; ?>
                 </div>
                </div>
              <div class="Form-Item">
                  <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>電話番号</p>
                  <div class="form-inner">
                <input type="text" class="Form-Item-Input" name="phone" placeholder="例）080-1234-1234"value="<?php echo htmlspecialchars($post['phone']);?>">
                <?php if ($error['phone'] === 'blank'): ?>
                  <p class="error-msg">※電話番号をご記入ください。</p><?php endif; ?>
                </div>
              </div>
              <div class="Form-Item">
                  <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
                <div class="form-inner">
                  <input type="email" class="Form-Item-Input" name="email" placeholder="例）example@gmail.com" value="<?php echo htmlspecialchars($post['email']);?>">
                  <?php if ($error['email'] === 'blank'): ?>
                     <p class="error-msg">※メールアドレスをご記入ください。</p><?php endif; ?>
                </div>
              </div>

              <div class="Form-Item">
                  <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
                <div class="form-inner">
                  <textarea class="Form-Item-Textarea" name="contact" rows="10" required><?php echo htmlspecialchars($post['contact']);?></textarea>
                  <?php if ($error['contact'] === 'blank'): ?>
                    <p class="error-msg">※お問い合わせ内容をご記入ください。</p><?php endif; ?>
                </div>
              </div>


                 <div class="submit-btn">
                <input type="submit" class="btn filled" value="確認する">
                　</div>
              

           </form>   
      </div>
   
    <footer>
    <p>©︎YK Design 2021</p>
     </footer>
</div>
</body>
</html>