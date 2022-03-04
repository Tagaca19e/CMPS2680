<html>
  <head>
    <title>PROJECT 1</title>
    <link rel="stylesheet" href="style.css" >
  </head>
  <style>
    * {
      font-size: 20px;
      font-family: sans-serif;
    }
    body {
      background-color: #ff7700;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 900'%3E%3Cpolygon fill='%23cc0000' points='957 450 539 900 1396 900'/%3E%3Cpolygon fill='%23aa0000' points='957 450 872.9 900 1396 900'/%3E%3Cpolygon fill='%23d6002b' points='-60 900 398 662 816 900'/%3E%3Cpolygon fill='%23b10022' points='337 900 398 662 816 900'/%3E%3Cpolygon fill='%23d9004b' points='1203 546 1552 900 876 900'/%3E%3Cpolygon fill='%23b2003d' points='1203 546 1552 900 1162 900'/%3E%3Cpolygon fill='%23d3006c' points='641 695 886 900 367 900'/%3E%3Cpolygon fill='%23ac0057' points='587 900 641 695 886 900'/%3E%3Cpolygon fill='%23c4008c' points='1710 900 1401 632 1096 900'/%3E%3Cpolygon fill='%239e0071' points='1710 900 1401 632 1365 900'/%3E%3Cpolygon fill='%23aa00aa' points='1210 900 971 687 725 900'/%3E%3Cpolygon fill='%23880088' points='943 900 1210 900 971 687'/%3E%3C/svg%3E");
      background-attachment: fixed;
      background-size: cover;
    }
    .list {
      list-style: none;
      margin: 10px;
    }
    .main {
      display: flex;
      justify-content: center;
      color: white;
    }
    .bot {
      display: flex;
      margin: auto;
      justify-content: center;
    }
    .item {

    }
    .input {
      border: 3px black solid;
      padding: 5px;
      margin: 5px;
      border-radius: 10px;
    }
    .question {
      border: 4px #ffe0e0 solid;
      padding: 10px;
      border-radius: 10px;
      font-weight: 600;
      color: white;
    }
    .quiz {
      padding: 10px 30px;
      border-radius: 20px;
    }
    .child{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 700px;
      text-align: center;
      padding: 20px;
      border-radius: 40px;
      background: #ffffff;
      border: 5px black solid;
      color: black;
      display: none;
      animation: slide-up 1s ease;
    }
    @keyframes slide-up {
      0% {
          opacity: 0;
      }
      100% {
          opacity: 1;
      }
    }
  </style>
  <body>
    <div class="main">
      <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
      <label for="name"> Name: </label>
      <input type="text" id="name" name="name" value="<?php if(isset($_POST["name"])){echo $_POST["name"];}?>"required> <br>
 
        <?php
        //MAIN DATA
        $question_main_data = [
          "PHP was created in 1995" => ["True", "False"],
          "PHP is a client side language" => ["True", "False"],
          "PHP still to this day is used by many" => ["True", "False"],
          "PHP's original name was Personal Home Page" => ["True", "False"],
          "PHP was originally written in C" => ["True", "False"],
          "What does PHP stand for?" => ["Private Home Server", "Pre Health Processor", "PHP: Hypertext Processor"], 
          "What is the animal that is in the logo of PHP?" => ["Horse", "Kangaroo", "Elephant", "Fish"], 
          "How do you declare a variable in PHP?" => ["var = 0", "int var = 0", "let var = 0", '$var = 0'], 
          "What are the two types of String operators" => ["Concatenation", "Addition", "Multiplication", "Expansion"], 
          "PHP can be mixed with?" => ["Javascript", "HTML", "CSS", "Python"],
        ];
        //ANSWER KEY
    
        $show = "";
        $price = "";
        $percent = ($total_score / 10) * 100;
        $percent = round($percent, 2);
        if (isset($_POST["quiz"])) {
          $show = "display: block !important";
        }
        if ($total_score == 10) {
          $price = "HERE IS YOUR PRICE FOR BEING AWESOME! <img src='price.png' style='margin: 20px; border-radius: 10px' width='400' height='400'>";
        }
        echo "<p style='$show' class='child score'>NAME: $name <br> SCORE: $total_score/10 $percent%<br> $price <br> <button class='quiz' style='margin: 20px' > START AGAIN </button></p></div></div> <br> <div class='bot'><input class='quiz' name='quiz' type='submit'>";
        ?> 
      </form>
    </div>
  </body>
</html>
