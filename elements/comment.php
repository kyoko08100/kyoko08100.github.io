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
session_start();
$hn = "127.0.0.1";
$un = "root";
$pw = "";
$conn = @mysqli_connect($hn,$un,$pw,"book");
if(!$conn)
{
    //die("資料庫連結錯誤");
}

?>
<div class="wrapper row1">
    <header id="header" class="full_width clear">
        <div id="hgroup">
            <h1><a href="/rs/index.php">XX網路書店</a></h1>
            <h2>
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


                    ?></a></li>
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
        <span style="font-weight:bold;font-size: 30px">評價</span>
        <!-- ################################################################################################ -->
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" /><br><br>
        <div style="width: 100%;height: 100%;font-size: 30px;line-height: normal;">
            <?php

            //        $sql = "select * from `shoppingcart` WHERE member_id=$_SESSION[account]";
            //        $result = mysqli_query($conn, $sql);
            //        $row = mysqli_fetch_all($result);
            echo "<form style='width: 100%' action='/rs/elements/MemberCenter.php?bookname=$_GET[bookname]' method='post' enctype='multipart/form-data'>";
            echo "<span style='font-size: 30px;color: #000000;'>購買的商品：".$_GET["bookname"]."</span><br>";
            echo "<span style='font-size: 30px;color: #000000;'>評價星數：</span>";
            echo "1星<input type='radio' name='comment_stars' value='1' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "2星<input type='radio' name='comment_stars' value='2' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "3星<input type='radio' name='comment_stars' value='3' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "4星<input type='radio' name='comment_stars' value='4' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "5星<input type='radio' name='comment_stars' value='5' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "<br><span style='font-size: 30px;color: #000000;'>評價內容：</span><br>";
            echo "<textarea name='content' rows='10' cols='300' style='font-size: 20px; padding: 0px;width: 80%;' ></textarea>";
            $sql ="UPDATE `orderbuy` SET status= 2 WHERE  member_id = $_SESSION[account] and bookname = '".$_GET["bookname"]."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($result);
            echo "<br><br><input class='button small gradient blue' type='submit' name='book_comment' value='確定' style='font-size: 20px;'>";
            echo "</form>";



            ?>

        </div>
        <!--<div  style="width: 100%;background-color: #BDC0BA;margin-top: 10px;">
          123456
        </div>-->

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