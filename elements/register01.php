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
<?php
SESSION_start();
$mode=$_SESSION['mode'];
$account=$_SESSION['account'];

$hn = "127.0.0.1";
$un = "root";
$pw = "";
$conn = @mysqli_connect($hn,$un,$pw,"book");
if(!$conn)
{
    die("資料庫連結錯誤");
}
if($_POST["register"] == "註冊")
{
    if($_POST["account"] == null)
    {
        echo "<script>alert('請輸入會員帳號');</script>";
    }
    else if($_POST["password"] == null)
    {
        echo "<script>alert('請輸入會員密碼');</script>";
    }
    else if($_POST["passwordcheck"] == null)
    {
        echo "<script>alert('密碼不符，請重試');</script>";
    }
    else if($_POST["bookmembername"] == null)
    {
        echo "<script>alert('請輸入姓名');</script>";
    }
    else if($_POST["birthday"] == null)
    {
        echo "<script>alert('請輸入出生年份');</script>";
    }
    else if($_POST["city"] == "begincity")
    {
        echo "<script>alert('請選擇居住縣市');</script>";
    }
    else if($_POST["address"] == null)
    {
        echo "<script>alert('請輸入地址');</script>";
    }
    else if($_POST["phone"] == null)
    {
        echo "<script>alert('請輸入電話號碼');</script>";
    }
    else if($_POST["pay"] == "beginpay")
    {
        echo "<script>alert('請選擇付款方式');</script>";
    }
    else if($_POST["email"] == null)
    {
        echo "<script>alert('請輸入電子郵件');</script>";
    }
    else
    {
        $sqlaccount = "select * from `user` where account='".$_POST["account"]."'";
        $resultaccount = mysqli_query($conn, $sqlaccount);
        $sqlemail = "select * from `user` where email='".$_POST["email"]."'";
        $resultemail = mysqli_query($conn, $sqlemail);
        if($_POST['password'] != $_POST['passwordcheck'])
        {
            echo "<script>alert('密碼不符，請重試');window.location.href='login.php'</script>";
        }
        else if(mysqli_num_rows($resultaccount)!=0)
        {
            echo "<script>alert('使用者帳號重複，註冊失敗');window.location.href='login.php'</script>";
        }
        else if(mysqli_num_rows($resultemail)!=0)
        {
            echo "<script>alert('電子郵件已使用，註冊失敗');window.location.href='login.php'</script>";
        }
        else
        {
            $sql = "insert into `user` values(NULL,'".$_POST["account"]."','".$_POST["password"]."','".$_POST["bookmembername"]."','".$_POST["birthday"]."','".$_POST["city"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["pay"]."','".$_POST["email"]."',1)";
            $result1 = mysqli_query($conn, $sql);
            echo "<script>alert('註冊成功，返回登入畫面');window.location.href='login.php'</script>";
        }
    }
}
?>
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <h1><a href="/rs/index.php">XX網路書店</a></h1>
      <h2>歡迎來到本網頁</h2>
    </div>
    <div id="header-contact">
      <ul class="list none">
        <li><span class="icon-envelope"></span> <a href="login.php">登入/註冊</a></li>
          <li><!--<span class="icon-phone"></span>--><a href="/rs/elements/ShoppingList.php"> 購物車</a></li>
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

    <div class="clear columncolor">	<form method="POST" >
      會員帳號：<input type="text" name="account"><br>
      會員密碼：<input type="text" name="password"><br>
      確認密碼：<input type="text" name="passwordcheck"><br>
      　姓　名：<input type="text" name="bookmembername"><br>
      出生年月日：<input type="date" name="birthday"><br>
      居住縣市：<select name="city">
      <option value="begincity">請選擇</option>
      <option value="Keelung">基隆</option>
      <option value="Taipei">台北</option>
      <option value="NewTaipei">新北</option>
      <option value="Taoyuan">桃園</option>
      　	<option value="Hsinchu">新竹</option>
      　	<option value="Miaoli">苗栗</option>
      　	<option value="Taichung">台中</option>
      　	<option value="Changhua">彰化</option>
      　	<option value="Yunlin">雲林</option>
      　	<option value="Chiayi">嘉義</option>
      　	<option value="Tainan">台南</option>
      　	<option value="Kaohsiung">高雄</option>
      　	<option value="Pingtung">屏東</option>
      　	<option value="Taitung">台東</option>
      　	<option value="Hualien">花蓮</option>
      　	<option value="Yilan">宜蘭</option>
      　	<option value="Nantou">南投</option>
      　	<option value="Lianjiang">連江</option>
      　	<option value="Kinmen">金門</option>
      　	<option value="Penghu">澎湖</option>
    </select><br>
      　地　址：<input type="text" name="address"><br>
      　電　話：<input type="text" name="phone"><br>
      付款方式：<select name="pay">
      <option value="beginpay">請選擇</option>
      <option value="home">貨到付款</option>
      <option value="store">超商付款</option>
      <option value="else">其他</option>
    </select><br>
      電子郵件：<input type="text" name="email"><br>
      <input type="button" value="返回登入" name="register" onclick="javascript:location.href='/rs/login.php'">
      <input type="submit" value="註冊" name="register"></form>
    </div>






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