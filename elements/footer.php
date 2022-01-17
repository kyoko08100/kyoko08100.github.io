<!DOCTYPE html>
<html>
<head>
<title>RS-1200 Prototype 16 | Portfolio Layouts | 2 Column Grid + Left Sidebar</title>
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
if(!isset($_SESSION['account'])){
    echo "<script>location.href='/rs/elements/login.php';</script>";

}
?>

<div class="wrapper row1">
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

                    //mysqli_close($conn);
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
                        ?></a></li>
                <li> <a href="/rs/elements/ShoppingList.php"> 購物車</a></li>
            </ul>
        </div>
    </header>
</div>
<!-- ################################################################################################ -->

<!-- content -->
<div class="wrapper row3">
  <div id="container">
      <div  id="sidebar">
    <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first" >
          <aside>
              <!-- ########################################################################################## -->
              <h2 style="font-weight:bold"></h2>
              <nav>
                  <ul>
                      <li><a >認識我們</a></li>
                      <ul>
                          <li><a href='#page1'>關於我們</a></li>
                          <li><a href='#page2'>第一次購物</a></li>
                          <li><a href='#page3'>第一次賣二手書</a></li>
                          <li><a href='#page4'>現金回饋</a></li>
                          <li><a href='#page5'>新會員享好禮</a></li>
                          <li><a href='#page6'>工作機會</a></li>
                      </ul>
                      <li><a >顧客服務</a></li>
                      <ul>
                          <li><a href='#page7'>訂購、訂單查詢</a></li>
                          <li><a href='#page8'>取貨方式</a></li>
                          <li><a href='#page8'>付款方式及運費</a></li>
                          <li><a href='#page8'>退換貨須知</a></li>
                          <li><a href='#page8'>常見Q&A</a></li>
                      </ul>







                      <!--<ul>
                          <li><a href="#">Free XHTML Templates</a></li>
                          <li><a href="#">Free Web Templates</a></li>
                      </ul>-->


                  </ul>
              </nav>

              <!-- ########################################################################################## -->
          </aside>
      </div>
      </div>
    <!-- ################################################################################################ -->
    <div id="portfolio" class="three_quarter">
            <div id="page1"><h1 style="font-weight:bold;font-size: 30px">
                關於我們
            </h1></div>
            <style>
                hr.style-two {
                    border: 0;
                    height: 10px;
                    background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
                }
            </style>
            <hr class="style-two" />
        <h4>我們做「網路書店系統」的出發點，是為了讓使用者們能透過這個系統，找到自己中意且喜愛的書籍。
            從一開始的專案規劃，再到現在的網站系統初步建置，或許一開始的規劃我們少考慮了很多因素，但在一次次的報告和檢討中，我們也慢慢的讓整個專案、甚至系統使用起來更佳的完善！
        </h4>

        <div id="page2"><h1 style="font-weight:bold;font-size: 30px">
                第一次購物
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />

        <h4>第一步：加入會員</h4>
        <img src="/rs/images/demo/buy-1.png">
        <h4>第二步：選購商品</h4>
        <img src="/rs/images/demo/buy-2.png">
        <h4>第三步：購物車結帳</h4>
        <img src="/rs/images/demo/buy-3.png">
        <div id="page3"><h1 style="font-weight:bold;font-size: 30px">
                第一次賣二手書
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>第一步：申請賣家權限</h4>
        <img src="/rs/images/demo/sell-1.png">
        <h4>第二步：上架書籍</h4>
        <img src="/rs/images/demo/sell-2.png">
        <div id="page4"><h1 style="font-weight:bold;font-size: 30px">
                現金回饋
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>現在在XX網路書店消費，能享「1%」的現金回饋！<br>
            每50點回饋能折抵1元的書費！<br>
            同時我們將不定期進行回饋活動，詳情請見本站公告！
        </h4>
        <div id="page5"><h1 style="font-weight:bold;font-size: 30px">
                新會員享好禮
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>現在加入書店的新會員將贈予90元的購物回饋金作使用！<br>
            快來揪團一起買書！獲得更多的購書回饋金！<br>
            (回饋金僅適用於部分實體書籍，詳情請見訊息公告。)
        </h4>
        <div id="page6"><h1 style="font-weight:bold;font-size: 30px">
                工作機會
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>站內人才大！招！募！<br>
            對網路書店或行銷策劃有興趣嗎？對書籍資訊管理有其他想法嗎？<br>
            歡迎加入我們！讓我們一起為書店盡一份心力、共創佳績！<br>
            (徵才詳情請見人才招募網站。)
        </h4>
        <div id="page7"><h1 style="font-weight:bold;font-size: 30px">
                訂購、訂單查詢
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>登入後可至會員中心的訂單查詢確認訂單情況</h4>
        <div id="page8"><h1 style="font-weight:bold;font-size: 30px">
                取貨方式
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>本店提供超商到店取貨及郵寄到府等服務。</h4>
        <div id="page9"><h1 style="font-weight:bold;font-size: 30px">
                付款方式及運費
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>本站提供線上刷卡、ATM付款、超商取貨付款等方式。</h4>
        <div id="page10"><h1 style="font-weight:bold;font-size: 30px">
                退換貨須知
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>進行退換貨的商品須具備未拆封、外觀保留完整、且從取貨日至今不超過7天等條件，方可進行退換貨事宜。</h4>
        <div id="page11"><h1 style="font-weight:bold;font-size: 30px">
                常見Q&A
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h5>
            Q：購物流程？送貨天數？<br>
            A：現貨商品下單後，約2-3個工作天內出貨。<br>
            (工作天不含假日及訂購當天)<br>
            Q：可以貨到付款嗎？<br>
            A：目前僅提供7-11超商取貨付款，宅配則不提供貨到付款服務。<br>
            Q：如何確認是否購買成功？<br>
            A：下單成功後可至訂單頁面進行查詢。<br>
            若未查詢到，請盡速聯繫客服！<br>
            Q：商品沒有出貨，可以加購/更改嗎？<br>
            A：目前僅提供訂單更改的部分。若該筆交易使用優惠券或本站回饋點數進行下單，更改或取消訂單將不返還任何優惠券和回饋點數！<br>
            Q：我有訂單問題要如何聯絡你們？<br>
            A：詳情見【客服聯繫】。
        </h5>
        <div id="page12"><h1 style="font-weight:bold;font-size: 30px">
                客服聯繫
            </h1></div>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <h4>
            客服聯繫專線：0800-000-000<br>
            客服時間：周一至周五9:00~17:00(國定例假日除外)<br>
            客服信箱：xxolbs@gmail.com

        </h4>

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
<script>window.jQuery || document.write('<script src="../layout/scripts/jquery-latest.min.js"><\/script>\
<script src="../layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="../layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="../layout/scripts/custom.js"></script>

</body>
</html>