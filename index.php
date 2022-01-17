<!DOCTYPE html>
<html>
<head>
<title>二手書交易系統</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<!--[if lt IE 9]>
<link href="layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<script src="layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="layout/scripts/ie/html5shiv.min.js"></script>

<![endif]-->
</head>
<body class="">
<?php
session_start();
$hn = "127.0.0.1";
$un = "root";
$pw = "";
$conn = @mysqli_connect($hn,$un,$pw,"book");
if(!$conn)
{
    //die("資料庫連結錯誤");
}
//更改密碼

if(isset($_POST["update_password"]))
{
    if($_POST["password1"]==""||$_POST["password2"]=="")
    {
        echo "<script>alert('請輸入密碼');window.location='/rs/elements/MemberCenter.php?page=2'</script>";
    }
    elseif($_POST["password1"]!=$_POST["password2"])
    {
        echo "<script>alert('新密碼與確認密碼不符');window.location='/rs/elements/MemberCenter.php?page=2';</script>";
    }
    else
    {
        echo "<script>alert('更改密碼成功，請重新登入');</script>";
        $query="UPDATE `user` SET `password`= '$_POST[password2]' WHERE account='$_SESSION[account]'";
        $result = mysqli_query($conn, $query);
        session_destroy();
        echo "<script>window.location='/rs/elements/login.php';</script>";
    }

}
//更改密碼結束
//登入
if($_POST["login"] == "登入") {
    $sql = "select * from `user` where account='$_POST[account]'and password='$_POST[password]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($_POST["account"] == null) {
        echo "<script>alert('請輸入會員帳號');window.location.href='/rs/elements/login.php'</script>";
    } else if ($_POST["password"] == null) {
        echo "<script>alert('請輸入會員密碼');window.location.href='/rs/elements/login.php'</script>";
    } else if ($row["account"] != $_POST["account"] || $row["password"] != $_POST["password"]) {
        echo "<script>alert('使用者帳號或密碼有誤');window.location.href='/rs/elements/login.php'</script>";
    } else {
        echo "<script>alert('登入成功');window.location.href='/rs/index.php'</script>";
        $mode = 1;
        $_SESSION['mode'] = $mode;
        $_SESSION['account'] = "$_POST[account]";
        $_SESSION['token'] = $row['token'];


    }
}
    //登入結束
//會員資料更新

if(isset($_POST["member_update"]))
{

    if($_POST["bookmembername"] == null)
    {
        echo "<script>alert('請輸入姓名');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else if($_POST["bookmemberbirthday"] == null)
    {
        echo "<script>alert('請輸入出生年份');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else if($_POST["city"] == "begincity")
    {
        echo "<script>alert('請選擇居住縣市');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else if($_POST["address"] == null)
    {
        echo "<script>alert('請輸入地址');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else if($_POST["phone"] == null)
    {
        echo "<script>alert('請輸入電話號碼');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else if($_POST["pay"] == "beginpay")
    {
        echo "<script>alert('請選擇付款方式');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else if($_POST["email"] == null)
    {
        echo "<script>alert('請輸入電子郵件');window.location.href='/rs/elements/MemberCenter.php?page=3'</script>";
    }
    else {
        echo "<script>alert('213');</script>";
        $query="UPDATE `user` SET `name`= '$_POST[bookmembername]', `birthday`= '$_POST[bookmemberbirthday]', `city`= '$_POST[city]', `address`= '$_POST[address]', `phone`= '$_POST[phone]', `pay`= '$_POST[pay]', `email`= '$_POST[email]' WHERE account='$_SESSION[account]'";
        $result = mysqli_query($conn, $query);
        echo "<script>window.location='/rs/index.php';</script>";
    }

}
//會員資料更新結束
//申請賣家權限

if(isset($_POST["seller"]))
{
    if ($_POST["name"]=="")
    {
        echo "<script>alert('請輸入名稱');</script>";
    }
    elseif ($_POST["type"]=="")
    {
        echo "<script>alert('請點選屬性');</script>";
    }
    elseif ($_POST["id_number"]=="")
    {
        echo "<script>alert('請輸入身分證字號');</script>";
    }
    else
    {
        echo "<script>alert('申請成功，請等待審核');</script>";
        $sql = "select * from `user` where account='$_SESSION[account]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
//        $query="insert into seller values(".$row[0].",'".$_POST["name"]."','".$_POST["type"]."','".$_POST["id_number"]."',1)";
//        $query = "insert into `user` values(".$row[0].",'".$_POST["name"]."','".$_POST["type"]."','".$_POST["id_number"]."',1,'".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."')";
        $query = "insert into seller values(".(integer) $row[id].",'".$_POST["name"]."','".$_POST["type"]."','".$_POST["id_number"]."',1)";
        $rresult = mysqli_query($conn, $query);
        echo "<script>window.location.href='/rs/elements/MemberCenter.php?page=1';</script>";


    }


}
//申請賣家權限結束

//結帳
if($_GET["orderbuy"]==1)
{
    for($i=0;$i<count($_GET["product"]);$i++)
    {
        $sql = "select * from `shoppingcart` where member_id='$_SESSION[account]'and book_name='".$_GET["product"][$i]."' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $ssql ="insert into `orderbuy` values(NULL ,'".$_SESSION["account"]."',10,'".$row[book_name]."','".$row[price]."','".$row[quantity]."',0)";
        $rresult = mysqli_query($conn, $ssql);

        $sssql ="DELETE FROM `shoppingcart` where member_id='$_SESSION[account]'and book_name='".$_GET["product"][$i]."' ";
        $rrresult = mysqli_query($conn, $sssql);
    }
    echo "<script>alert('訂購成功');window.location='/rs/index.php';</script>";


}
//結帳結束
?>
<div class="wrapper row1">
<?php

?>
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <h1><a href="/rs/index.php">XX網路書店</a></h1><h2>
        <?php

        if(!isset($_SESSION['account'])){
            echo "歡迎來到本網頁";
        }
        else {
          echo "歡迎".$_SESSION['account'];
        }

        ?></h2>

    </div>
    <div id="header-contact">
        <ul class="list none">
            <li><span class="icon-envelope"></span>

                    <?php
                    if(!isset($_SESSION['account'])){
                        echo "<a href='/rs/elements/login.php'>登入/註冊";
                    }
                    else{
                        echo "<a href='/rs/index.php?a=1'>登出";
                    }
                    if($_GET['a']==1){
                        session_destroy();
                        header('Location:/rs/index.php');
                    }


                    ?>
                </a></li>
        <li> <a href="/rs/elements/MemberCenter.php">
                <?php
                if($_SESSION['token']==3){
                    echo "管理者中心";
                }
                else{
                    echo "會員中心";
                }
                ?>
            </a></li>
        <li> <a href="/rs/elements/ShoppingList.php"> 購物車</a></li>
      </ul>
    </div>
  </header>
</div>
<!-- ################################################################################################ -->

<!-- content -->
<div class="wrapper row3">
    <div id="container">

        <div id="sidebar_1" class="sidebar one_quarter first">
            <aside>

                <h2 style="font-weight:bold">書籍分類</h2>
                <nav>
                    <ul>
                        <li><a href="#">新書</a></li>
                        <li><a href="#usedbook">二手書</a></li>

                    </ul>
                </nav>




            </aside>
        </div>
        <!-- ################################################################################################ -->
        <div class="three_quarter">


                <h1 style="font-weight:bold;font-size: 30px">新書上架</h1>
                <style>
                    hr.style-two {
                        border: 0;
                        height: 10px;
                        background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
                    }
                </style>
                <hr class="style-two" />
            <div class="clear push80">
                <!-- #################################################################################################### -->
                <?php
                      $sql = "select * from `bookinventory` where type='新書'";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_all($result);
                      for($i=0;$i<mysqli_num_rows($result);$i++)
                      {
                           if($i%4==0)
                           {
                               echo "<div class='one_quarter first'>";
                           }
                           else
                           {
                               echo "<div class='one_quarter'>";
                           }
                           echo "<div class='pricingtable-wrapper rnd10'>
                        <div class='pricingtable'>
                            <div class='pricingtable-title'>
                                <h2 style='font-size: 18px;'>".$row[$i][3]."</h2>
                            </div>
                            <div class='pricingtable-list'>
                                <img src='".$row[$i][2]."' style='object-fit: contain; width: 186px; height: 190px;'><br>
                            </div>
                            <div class='pricingtable-price'><sup>$</sup>".$row[$i][15]."</div>
                            <div class='pricingtable-signup'><a class='button large gradient orange rnd10' href='/rs/elements/productpage.php?page=".$row[$i][0]."'>詳細資訊</a></div>
                        </div>
                    </div>
                </div>";
                      }

                ?>

                <!-- #################################################################################################### -->


            </div>

            <div id="usedbook"><h1 style="font-weight:bold;font-size: 30px">二手書專區</h1></div>
                <style>
                    hr.style-two {
                        border: 0;
                        height: 10px;
                        background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
                    }
                </style>
                <hr class="style-two" />

            <?php
            $sql = "select * from `bookinventory` where type='二手書'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($result);
            for($i=0;$i<mysqli_num_rows($result);$i++)
            {
                if($i%4==0)
                {
                    echo "<div class='one_quarter first'>";
                }
                else
                {
                    echo "<div class='one_quarter'>";
                }
                echo "<div class='pricingtable-wrapper rnd10'>
                        <div class='pricingtable'>
                            <div class='pricingtable-title'>
                                <h2 style='font-size: 18px;'>".$row[$i][3]."</h2>
                            </div>
                            <div class='pricingtable-list'>
                                <img src='".$row[$i][2]."' style='object-fit: contain; width: 186px; height: 190px;'><br>
                            </div>
                            <div class='pricingtable-price'><sup>$</sup>".$row[$i][15]."</div>
                            <div class='pricingtable-signup'><a class='button large gradient orange rnd10' href='/rs/elements/productpage.php?page=".$row[$i][0]."'>詳細資訊</a></div>
                        </div>
                    </div>
                </div>";
            }

            ?>



        </div>
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
<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>