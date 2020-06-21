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

// Q1.sex出力////////////////
$ary_sex = array_column($aryCsv, 0);
// var_dump($ary_sex);
// exit();
$sum1 = array_count_values($ary_sex);
// echo $sum1["女"];

// Q2.age出力////////////////
$ary_age = array_column($aryCsv, 1);
$sum2 = array_count_values($ary_age);
// echo $sum2["70代"];

// Q3.recent出力////////////////
$ary_recent = array_column($aryCsv, 2);
$sum3 = array_count_values($ary_recent);
// echo $sum3["半年以内"];

// Q4.want出力////////////////
$ary_want = array_column($aryCsv, 3);
$sum4 = array_count_values($ary_want);
// echo $sum4["はい"];

// Q5.yes出力////////////////
$ary_yes = array_column($aryCsv, 4);
$sum5 = array_count_values($ary_yes);
// echo $sum5["行くのが面倒だ"];

// Q6.no出力////////////////
$ary_no = array_column($aryCsv, 5);
$sum6 = array_count_values($ary_no);
// echo $sum6["忙しくて暇がない"];

// Q7.problem出力////////////////
$ary_problem = array_column($aryCsv, 6);
$sum7 = array_count_values($ary_problem);
// echo $sum7["ない"];


// Q8.text出力////////////////
$ary_text = array_column($aryCsv, 7);

// こちらも可
// foreach ($aryCsv as $value) {
//    echo $value[7]."<br>";
// }

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
      <thead>
         <tr>
            <th>質問</th>
            <th>人数</th>
            <th>比率</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td>性別</td>
            <?php
            // 男女の比率計算
            $male_rate   = round($sum1["男"] / $count * 100);
            $female_rate = round($sum1["女"] / $count * 100);

            echo '  <td>男性：' . $sum1["男"] . '人 女性：' . $sum1["女"] . '人</td>';
            echo '  <td>男性：' . $male_rate . '% 女性：' . $female_rate . '%</td>';
            ?>
         </tr>
         <tr>
            <td>年齢</td>
            <?php
            $age10_rate = round($sum2["10代"] / $count * 100);
            $age20_rate = round($sum2["20代"] / $count * 100);
            $age30_rate = round($sum2["30代"] / $count * 100);
            $age40_rate = round($sum2["40代"] / $count * 100);
            $age50_rate = round($sum2["50代"] / $count * 100);
            $age60_rate = round($sum2["60代"] / $count * 100);
            $age70_rate = round($sum2["70代"] / $count * 100);
            $age80_rate = round($sum2["80代"] / $count * 100);

            echo '  <td>10代：' . $sum2["10代"] . '人<br>' .
               '20代：' . $sum2["20代"] . '人<br>' .
               '30代：' . $sum2["30代"] . '人<br>' .
               '40代：' . $sum2["40代"] . '人<br>' .
               '50代：' . $sum2["50代"] . '人<br>' .
               '60代：' . $sum2["60代"] . '人<br>' .
               '70代：' . $sum2["70代"] . '人<br>' .
               '80代以上：' . $sum2["80代"] . '人</td>';
            echo '  <td>10代：' . $age10_rate . '%<br>' .
               '20代：' . $age20_rate . '%<br>' .
               '30代：' . $age30_rate . '%<br>' .
               '40代：' . $age40_rate . '%<br>' .
               '50代：' . $age50_rate . '%<br>' .
               '60代：' . $age60_rate . '%<br>' .
               '70代：' . $age70_rate . '%<br>' .
               '80代以上：' . $age80_rate . '%</td>';
            ?>
         </tr>
         <tr>
            <td>最近歯医者に行ったのはいつですか？</td>
            <?php
            $recent1_rate = round($sum3["現在治療中"] / $count * 100);
            $recent2_rate = round($sum3["3ヶ月以内"] / $count * 100);
            $recent3_rate = round($sum3["半年以内"] / $count * 100);
            $recent4_rate = round($sum3["1年以内"] / $count * 100);
            $recent5_rate = round($sum3["覚えていない"] / $count * 100);

            echo '  <td>現在治療中：' . $sum3["現在治療中"] . '人<br>' .
               '3ヶ月以内：' . $sum3["3ヶ月以内"] . '人<br>' .
               '半年以内：' . $sum3["半年以内"] . '人<br>' .
               '1年以内：' . $sum3["1年以内"] . '人<br>' .
               '覚えていない：' . $sum3["覚えていない"] . '人</td>';
            echo '  <td>現在治療中：' . $recent1_rate . '%<br>' .
               '3ヶ月以内：' . $recent2_rate . '%<br>' .
               '半年以内：' . $recent3_rate . '%<br>' .
               '1年以内：' . $recent4_rate . '%<br>' .
               '覚えていない：' . $recent5_rate . '%</td>';
            ?>
         </tr>

         <tr>
            <td>近々歯医者に行きたいと思っていますか？</td>
            <?php
            $want1_rate = round($sum4["はい"] / $count * 100);
            $want2_rate = round($sum4["いいえ"] / $count * 100);

            echo '  <td>はい：' . $sum4["はい"] . '人<br>' .
               'いいえ：' . $sum4["いいえ"] . '人</td>';
            echo '  <td>はい：' . $want1_rate . '%<br>' .
               'いいえ：' . $want2_rate . '%</td>';
            ?>
         </tr>

         <tr>
            <td>行きたいけど行っていない理由</td>
            <?php
            $yes1_rate = round($sum5["行くのが面倒だ"] / $count * 100);
            $yes2_rate = round($sum5["忙しくて暇がない"] / $count * 100);
            $yes3_rate = round($sum5["お金がかかる"] / $count * 100);
            $yes4_rate = round($sum5["その他"] / $count * 100);

            echo '  <td>行くのが面倒だ：' . $sum5["行くのが面倒だ"] . '人<br>' .
               '忙しくて暇がない：' . $sum5["忙しくて暇がない"] . '人<br>' .
               'お金がかかる：' . $sum5["お金がかかる"] . '人<br>' .
               'その他：' . $sum5["その他"] . '人</td>';
            echo '  <td>行くのが面倒だ：' . $yes1_rate . '%<br>' .
               '忙しくて暇がない：' . $yes2_rate . '%<br>' .
               'お金がかかる：' . $yes3_rate . '%<br>' .
               'その他：' . $yes4_rate . '%</td>';
            ?>
         </tr>

         <tr>
            <td>行きたくない理由</td>
            <?php
            $no1_rate = round($sum6["現在悪いところがないから"] / $count * 100);
            $no2_rate = round($sum6["忙しくて暇がない"] / $count * 100);
            $no3_rate = round($sum6["歯医者が嫌い"] / $count * 100);
            $no4_rate = round($sum6["その他"] / $count * 100);

            echo '  <td>現在悪いところがないから：' . $sum6["現在悪いところがないから"] . '人<br>' .
               '忙しくて暇がない：' . $sum6["忙しくて暇がない"] . '人<br>' .
               '歯医者が嫌い：' . $sum6["歯医者が嫌い"] . '人<br>' .
               'その他：' . $sum6["その他"] . '人</td>';
            echo '  <td>現在悪いところがないから：' . $no1_rate . '%<br>' .
               '忙しくて暇がない：' . $no2_rate . '%<br>' .
               '歯医者が嫌い：' . $no3_rate . '%<br>' .
               'その他：' . $no4_rate . '%</td>';
            ?>
         </tr>

         <tr>
            <td>歯に関するお悩み</td>
            <?php
            $problem1_rate = round($sum7["ない"] / $count * 100);
            $problem2_rate = round($sum7["虫歯の悩み"] / $count * 100);
            $problem3_rate = round($sum7["歯周病の悩み"] / $count * 100);
            $problem4_rate = round($sum7["審美的な悩み（歯並び、色など）"] / $count * 100);
            $problem5_rate = round($sum7["その他"] / $count * 100);

            echo '  <td>ない：' . $sum7["ない"] . '人<br>' .
               '虫歯の悩み：' . $sum7["虫歯の悩み"] . '人<br>' .
               '歯周病の悩み：' . $sum7["歯周病の悩み"] . '人<br>' .
               '審美的な悩み（歯並び、色など）：' . $sum7["審美的な悩み（歯並び、色など）"] . '人<br>' .
               'その他：' . $sum7["その他"] . '人</td>';
            echo '  <td>ない：' . $problem1_rate . '%<br>' .
               '虫歯の悩み：' . $problem2_rate . '%<br>' .
               '歯周病の悩み：' . $problem3_rate . '%<br>' .
               '審美的な悩み（歯並び、色など）：' . $problem4_rate . '%<br>' .
               'その他：' . $problem5_rate . '%</td>';
            ?>
         </tr>
         <tr>
            <td>歯医者のイメージ</td>
            <td>
               <?php
               foreach ($aryCsv as $value) {
                  echo $value[7] . "<br>";
               }
               ?>
            </td>
         </tr>

   </table>

   <canvas id="myPieChart"></canvas>

   <footer>
      <p>05kadai.hirono.baba</p>
   </footer>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
   <script>
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
         type: 'pie',
         data: {
            labels: ["男", "女"],
            datasets: [{
               backgroundColor: [
                  "#BB5179",
                  "#FAFF67",
               ],
               data: [50, 50]
            }]
         },
         options: {
            title: {
               display: true,
               text: '男女比'
            }
         }
      });
   </script>


   <style>
      body {
         font-size: 15px;
         line-height: 2em;
         width: 85%;
         margin: 0 auto;
         color: #4D648D;
         background-color: #fcfdfd;
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