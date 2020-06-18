<?php
// 出力用の文字列（ここに読み込んだデータをタグに入れた形式で追加していく）
$str = "";
// ファイルを開く処理
$file = fopen("data/todo.csv", "r");

// ファイルロックの処理
flock($file, LOCK_EX);

// ファイル書き込み処理
// 1行づつ取り出す
// if ($file) {
//    while ($line = fgets($file)) {
//       $str .= "<tr><td>{$line}</td></tr>";
//    }
// }

// 回答数カウント（csv行数カウント）
$count = count(file("data/todo.csv"));
// var_dump($count);
// exit();


// CSVファイルを連想配列に////////////
//ファイルを変数に入れる
$csv_file = file_get_contents('data/todo.csv');

//変数を改行毎の配列に変換
$aryHoge = explode("\n", $csv_file);

$aryCsv = [];
foreach ($aryHoge as $key => $value) {
   if (!$value) continue; //空白行が含まれていたら除外
   $aryCsv[] = explode(",", $value);
}
// print_r($aryCsv);







// Q8.text出力
// $textArr = 










// ファイルアンロックの処理
flock($file, LOCK_UN);

// ファイル閉じる
fclose($file);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <table>
      <tr>
         <th>性別</th>
         <th>年齢</th>
         <th>最近歯医者に行ったのはいつですか？</th>
         <th>近々歯医者に行きたいと思っていますか？</th>
         <th>行きたいけど行っていない理由</th>
         <th>行きたくない理由</th>
         <th>歯に関するお悩み</th>
         <th>歯医者のイメージ</th>
      </tr>
      <?php foreach ($aryCsv as $value) { ?>
         <tr>
            <td><?php echo $value[0] ?></td>
            <td><?php echo $value[1] ?></td>
            <td><?php echo $value[2] ?></td>
            <td><?php echo $value[3] ?></td>
            <td><?php echo $value[4] ?></td>
            <td><?php echo $value[5] ?></td>
            <td><?php echo $value[6] ?></td>
            <td><?php echo $value[7] ?></td>
         </tr>
      <?php } ?>
   </table>



</body>

</html>