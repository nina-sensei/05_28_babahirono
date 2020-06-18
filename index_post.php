<?php
// データを受け取ると，受け取ったデータを元に処理を実行し，htmlのデータを返す
// まずデータの受取を確認
// var_dump($_POST);
// exit();

// name属性の値を指定してデータを受け取る
// Q1
$sex = isset($_POST['sex']) ? $_POST['sex'] : NULL;

// Q2
$age = isset($_POST['age']) ? $_POST['age'] : NULL;

// Q3
$recent = isset($_POST['recent']) ? $_POST['recent'] : NULL;

// Q4
$want = isset($_POST['want']) ? $_POST['want'] : NULL;

// Q5
$yes = isset($_POST['yes']) ? $_POST['yes'] : NULL;

// Q6
$no = isset($_POST['no']) ? $_POST['no'] : NULL;

// Q7
$problem = isset($_POST['problem']) ? $_POST['problem'] : NULL;

// Q8
$text = $_POST['text'];

// 上記の変数をhtmlに埋め込んで表示する

?>

<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>アンケート送信</title>
</head>

<body>
   <div>
      <h2>ご協力ありがとうございました</h2>
      <!-- Q1 -->
      <p>Q1. 性別を選んでください</p>
      <p><?= $sex ?></p>

      <!-- Q2 -->
      <p>Q2. 年代を選んでください</p>
      <p><?= $age ?></p>

      <!-- Q3-->
      <p>Q3. 最近歯医者に行ったのはいつですか？</p>
      <p><?= $recent ?></p>

      <!-- Q4 -->
      <p>Q4. 現在治療中でない方にお聞きします。<br>近々歯医者に行きたいと思っていますか？</p>
      <p><?= $want ?></p>

      <!-- Q5 -->
      <p>Q5. はいと答えた方にお聞きします。<br>行きたいけど行っていない理由を教えてください。</p>
      <p><?= $yes ?></p>

      <!-- Q6 -->
      <p>Q6. いいえと答えた方にお聞きします。<br>行きたくない理由を教えてください。</p>
      <p><?= $no ?></p>

      <!-- Q7 -->
      <p>Q7. 歯に関するお悩みはありますか？<br>（複数回答可）</p>
      <p><?= $problem ?></p>

      <!-- Q8 -->
      <p>Q8. 最後に、歯医者のイメージを教えてください。</p>
      <p><?= $text ?></p>

      <a href="read.php">結果を見る</a>
      <footer>
         <p>05kadai.hirono.baba</p>
      </footer>
   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script>



   </script>

   <style>
      body {
         font-size: 15px;
         line-height: 3em;
         width: 85%;
         margin: 0 auto;
         color: #4D648D;
         background-color: #f5f5f5;
      }

      button {
         display: block;
         margin: 0 auto;
      }

      footer {
         background-color: #92AAC7;
         text-align: center;
         color: white;
      }

      footer p {
         margin: 0;
         padding: 5px 0;
         letter-spacing: 5px;
      }
   </style>

</body>

</html>