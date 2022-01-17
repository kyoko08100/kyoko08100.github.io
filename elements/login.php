<!DOCTYPE html>
<html>
<head>
<title>RS-1200 Prototype 16 | Elements | Columns</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<!--[if lt IE 9]>
<link href="../layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="../layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="../layout/scripts/ie/html5shiv.min.js"></script>
<![endif]-->
</head>
<body class="">
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <h1><a href="/rs/index.php">XX網路書店</a></h1>
      <h2>歡迎來到本網頁</h2>
    </div>
    <div id="header-contact">
      <ul class="list none">
        <li><span class="icon-envelope"></span> <a href="login.php">登入/註冊</a></li>
        <li><!--<span class="icon-phone"></span>--> <a href="/rs/elements/ShoppingList.php"> 購物車</a></li>
      </ul>
    </div>
  </header>
</div>
<!-- ################################################################################################ -->


<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <h1>登入/註冊</h1>
    <!-- ################################################################################################ -->

    <div class="clear columncolor"><form method="post" action="/rs/index.php" style="text-align: center;">
      <p class="emphasise" >登入會員<br><br>
        會員帳號:<input type="text" name="account" size="1" ><br>
        會員密碼:<input type="text" name="password" size="1" ><br>
        <input type="button" value="回首頁"  name="bookhome" onclick="javascript:location.href='/rs/index.php'"><br>
        <input type="button" value="註冊" name="register" onclick="javascript:location.href='/rs/elements/register01.php'"><br>
        <input type="submit" value="登入" name="login"></p>
      </form>
    </div>
      <?php
      session_start();
      $mode=$_SESSION['mode'];
      //$account=$_SESSION['account'];

      $hn = "127.0.0.1";
      $un = "root";
      $pw = "";
      $conn = @mysqli_connect($hn,$un,$pw,"book");
      if(!$conn)
      {
          die("資料庫連結錯誤");
      }


      ?>





    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- Footer -->
<div class="wrapper row2">
    <div id="footer" class="clear">
        <div class="one_quarter first">
            <h2 class="footer_title">認識我們</h2>
            <nav class="footer_nav">
                <ul class="nospace">
                    <li><a href="/rs/elements/footer.php">關於我們</a></li>
                    <li><a href="/rs/elements/footer.php">第一次購物</a></li>
                    <li><a href="/rs/elements/footer.php">第一次賣二手書</a></li>
                    <li><a href="/rs/elements/footer.php">現金回饋</a></li>
                    <li><a href="/rs/elements/footer.php">新會員好禮</a></li>
                    <li><a href="/rs/elements/footer.php">工作機會</a></li>
                </ul>
            </nav>
        </div>

        <div class="one_quarter">
            <h2 class="footer_title">顧客服務</h2>
            <div class="tweet-container">
                <ul  class="nospace spacing clear">
                    <li><a href="/rs/elements/footer.php">訂購、訂單查詢</a></li>
                    <li><a href="/rs/elements/footer.php">取貨方式</a></li>
                    <li><a href="/rs/elements/footer.php">付款方式及運費</a></li>
                    <li><a href="/rs/elements/footer.php">退換貨須知</a></li>
                    <li><a href="/rs/elements/footer.php">常見Q&A</a></li>
                    <li><a href="/rs/elements/footer.php">客服聯繫</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </div>
</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="../layout/scripts/jquery-latest.min.js"><\/script>\
<script src="../layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="../layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="../layout/scripts/custom.js"></script>


</body>
</html>