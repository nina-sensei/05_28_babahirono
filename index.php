<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>歯科に関するアンケート</title>
</head>

<body>
   <div class="page01">
      <h1>歯科に関する<br>アンケート</h1>
      <p>ご回答よろしくお願いします</p>
      <button id="enter">ENTER</button>
   </div>
   <div class="page02" style="display: none;">
      <h2>歯科に関するアンケート</h2>
      <form action="create.php" method="POST">

         <!-- Q1 -->
         <p>Q1. 性別を選んでください</p>
         <laber><input type="radio" name="sex" value="男">男</laber>
         <laber><input type="radio" name="sex" value="女">女</laber>

         <!-- Q2 -->
         <p>Q2. 年代を選んでください</p>
         <select name="age">
            <option value="未選択">選択してください</option>
            <!-- 年代増やす -->
            <?php
            for ($i = 10; $i <= 80; $i += 10) {
               echo "<option value={$i}代>{$i}代</option>";
            }
            ?>
            <option value="それ以上">それ以上</option>
         </select>

         <!-- Q3 -->
         <p>Q3. 最近歯医者に行ったのはいつですか？</p>
         <p><input type="radio" name="recent" value="現在治療中">現在治療中</p>
         <p><input type="radio" name="recent" value="3ヶ月以内">3ヶ月以内</p>
         <p><input type="radio" name="recent" value="半年以内">半年以内</p>
         <p><input type="radio" name="recent" value="1年以内">1年以内</p>
         <p><input type="radio" name="recent" value="覚えていない">覚えていない</p>

         <!-- Q4 -->
         <p>Q4. 現在治療中でない方にお聞きします。<br>近々歯医者に行きたいと思っていますか？</p>
         <label><input type="radio" name="want" value="はい">はい</label>
         <label><input type="radio" name="want" value="いいえ">いいえ</label>

         <!-- Q5 -->
         <p>Q5. はいと答えた方にお聞きします。<br>行きたいけど行っていない理由を教えてください。</p>
         <p><input type="radio" name="yes" value="行くのが面倒だ">行くのが面倒だ</p>
         <p><input type="radio" name="yes" value="忙しくて暇がない">忙しくて暇がない</p>
         <p><input type="radio" name="yes" value="お金がかかる">お金がかかる</p>
         <laber><input type="radio" name="yes" value="その他">その他</laber>

         <!-- Q6 -->
         <p>Q6. いいえと答えた方にお聞きします。<br>行きたくない理由を教えてください。</p>
         <p><input type="radio" name="no" value="現在悪いところがないから">現在悪いところがないから</p>
         <p><input type="radio" name="no" value="忙しくて暇がない">忙しくて暇がない</p>
         <p><input type="radio" name="no" value="歯医者が嫌い">歯医者が嫌い</p>
         <p><input type="radio" name="no" value="その他">その他</p>

         <!-- Q7 -->
         <p>Q7. 歯に関するお悩みはありますか？<br>（複数回答可）</p>
         <p><input type="checkbox" name="problem" value="ない">ない</p>
         <p><input type="checkbox" name="problem" value="虫歯の悩み">虫歯の悩み</p>
         <p><input type="checkbox" name="problem" value="歯周病の悩み">歯周病の悩み</p>
         <p><input type="checkbox" name="problem" value="審美的な悩み（歯並び、色など）">審美的な悩み（歯並び、色など）</p>
         <p><input type="checkbox" name="problem" value="その他">その他</p>

         <!-- Q8 -->
         <p>Q8. 最後に、歯医者のイメージを教えてください。</p>
         <textarea name="text" id="" cols="40" rows="10"></textarea>

         <!-- 送信ボタン -->
         <button type="submit">送信する</button>
      </form>
   </div>

   <footer>
      <p>05kadai.hirono.baba</p>
   </footer>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script>
      $("#enter").on("click", function() {
         $(".page01").remove();
         $(".page02").fadeIn();
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

      .page01 {
         height: 100vh;
         line-height: 3em;
         text-align: center;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
      }

      textarea {
         border-radius: 5px;
         background: #EBECF0;
         box-shadow: inset 5px 5px 20px #c8c9cc,
            inset -5px -5px 20px #ffffff;
         border: none;
      }

      button {
         display: block;
         margin: 0 auto;
         border: none;
         padding: 15px 25px;
         background: #efefef;
         border: none;
         border-radius: .5rem;
         color: #444;
         font-size: 1rem;
         font-weight: 700;
         letter-spacing: .2rem;
         text-align: center;
         outline: none;
         cursor: pointer;
         transition: .2s ease-in-out;
         box-shadow: -6px -6px 14px rgba(255, 255, 255, .7),
            -6px -6px 10px rgba(255, 255, 255, .5),
            6px 6px 8px rgba(255, 255, 255, .075),
            6px 6px 10px rgba(0, 0, 0, .15);
      }

      button:hover {
         box-shadow: -2px -2px 6px rgba(255, 255, 255, .6),
            -2px -2px 4px rgba(255, 255, 255, .4),
            2px 2px 2px rgba(255, 255, 255, .05),
            2px 2px 4px rgba(0, 0, 0, .1);
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