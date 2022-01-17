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
//加入購物車

//if(isset($_GET["member_id"])&&isset($_GET["bookname"])&&isset($_GET["price"]))
//{

//    else
//    {
//        echo "<script>alert('已加入購物車');</script>";
//        $query="insert into shoppingcart values(NULL ,'".$_GET["member_id"]."','".$_GET["bookname"]."','".$_GET["price"]."',1)";
//        $result = mysqli_query($conn, $query);
//        echo "<script>window.location='/rs/elements/productpage.php?page=$_GET[pages]';</script>";
//    }
//}
if(isset($_POST["add_shoppingcart"]))
{
    if(isset($_SESSION["account"]))
    {
        $sql = "select * from `shoppingcart` where member_id='$_SESSION[account]'and book_name='$_GET[bookname]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)!=0)
        {
            echo "<script>alert('此商品已在購物車中');</script>";
            echo "<script>window.location='/rs/elements/productpage.php?page=$_GET[pages]';</script>";
        }
        else
        {
            echo "<script>alert('加入購物車成功');</script>";
            $query="insert into shoppingcart values(NULL ,'".$_GET["member_id"]."','".$_GET["bookname"]."','".$_GET["price"]."','".$_POST["quantity"]."')";
            $result = mysqli_query($conn, $query);
            echo "<script>window.location='/rs/elements/productpage.php?page=$_GET[pages]';</script>";
        }
    }
    else
    {
        echo "<script>alert('尚未登入');</script>";
        echo "<script>window.location='/rs/elements/login.php';</script>";
    }


}
//加入購物車結束
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
    <!-- ################################################################################################ -->
      <div id="sidebar_1" class="sidebar one_quarter first" style="width: 15%;">
          <aside>
<!--              <h2 style="font-weight:bold">書籍分類</h2>-->
              <nav>
<!--                  <ul>-->
<!--                      <li><a href="#">絕版二手書專區</a></li>-->
<!--                      <li><a href="#">全新/近全新專區</a></li>-->
<!--                      <li><a href="#">幫你省最多專區</a></li>-->
<!--                      <li><a href="#">五折以下專區</a></li>-->
<!--                      <li><a href="#">三折以下專區</a></li>-->
<!--                      <li><a href="#">一折以下專區</a></li>-->
<!--                      <li><a href="#">50元有找逛一下</a></li>-->
<!--                      <li><a href="#">買二手書助公益</a></li>-->
<!--                      <li><a href="#">速找二手教科書</a></li>-->
<!--                  </ul>-->
              </nav>
<!--              <h2>二手中文書</h2>-->
<!--              <nav>-->
<!--                  <ul>-->
<!--                      <li><a href="#">華文文學</a></li>-->
<!--                      <li><a href="#">世界文學</a></li>-->
<!---->
<!--                  </ul>-->
<!--              </nav>-->
          </aside>
      </div>
    <!-- ################################################################################################ -->
      <?php
      $sql = "select * from `bookinventory` where id='$_GET[page]'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $bookname=$row[bookname];
      echo "    <div id='portfolio' class='three_quarter'>
      <ul class='clear'>
        <li class='one_half first'>
          <article class='clear'>
            <figure class='post-image'><img src='".$row[image]."' alt=''></figure>
            <header>
              <h2 class='blog-post-title bold'><a href='#'>".$row[bookname]."</a></h2>
              <h2 class='blog-post-title'><a href='#'>".$row[english_bookname]."</a></h2>

            </header>
          </article>
        </li>
        <li class='one_half'>
          <article class='clear'>

            <header>
              <h2 class='blog-post-title bold'><a href='#'>商品資訊</a></h2>

            </header>
            <p style='font-size: 20px;'>定價：NT$ ".$row[price]."<br><br>作者：".$row[author]."<br><br>譯者：".$row[translator]."<br><br>
                出版社：".$row[publisher]."<br><br>出版日期：".$row[publication_date]."<br><br>ISBN/ISSN：".$row[ISBN]."<br><br>
                語言：".$row[language]."<br><br>頁數：".$row[page_num]."頁<br><br>書籍分類：".$row[type]."<br><br>賣家：".$row[sellid]."<br><br>
            </p>

          </article>
          <form method='post' action='/rs/elements/productpage.php?member_id=$_SESSION[account]&bookname=$row[bookname]&price=$row[price]&pages=$_GET[page]' style='width: 100%;'>
          <input type='number' min='1' placeholder='請輸入數量' name='quantity' style='font-size: 20px; width: 150px;'>
            <input type='submit'  name='add_shoppingcart' value='放入購物車' class='button large black'></form>
        </li>
          <li>
              <div class='tab-wrapper rnd10 clear'>
                  <ul class='tab-nav clear'>
                      <li><a href='#tab-4'>內容簡介</a></li>
                      <li><a href='#tab-5'>購物須知</a></li>
                  </ul>
                  <div class='tab-container'>
                      <!-- Tab Content -->
                      <div id='tab-4' class='tab-content clear'>
                          <h2 style='font-weight: bold'>內容簡介</h2>
                          <p style='font-size: 18px;'>".$row[content]."</p>
                      </div>
                      <!-- ## TAB 2 ## -->
                      <div id='tab-5' class='tab-content clear'>
                          <h2 style='font-weight: bold'>購物須知</h2>
                          <p style='font-size: 20px;'>關於二手書說明：
                              <br><br>
                              購買二手書時，請檢視商品書況、備註說明或書況影片。
                              <br><br>
                              商品版權法律說明：
                              <br><br>
                              本平台單純提供網路二手書託售平台予消費者，並不涉入書本作者與原出版商間之任何糾紛；敬請各界鑒察。
                              <br><br>
                              退換貨說明：
                              <br><br>
                              二手書籍商品享有10天的商品猶豫期（含例假日）。若您欲辦理退貨，請於取得該商品10日內寄回。
                              <br><br>
                              二手影音商品（例如CD、DVD等），恕不提供10天猶豫期退貨。
                              <br><br>
                              二手商品無法提供換貨服務，僅能辦理退貨。如須退貨，請保持該商品及其附件的完整性。若退回商品無法回復原狀者，可能影響退換貨權利之行使或須負擔部分費用。
                              <br><br>
                              訂購本商品前請務必詳閱退換貨原則、二手CD、DVD退換貨說明。</p>
                      </div>
                      <!-- / Tab Content -->
                  </div>
              </div>

          </li>
           <li>
           <h1 style='font-weight:bold;font-size: 30px'>商品評價</h1>
                   <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class='style-two' />
           <table border='2px' style='background-color: #919191;font-size: 30px; color: #FFFFFF;' class='pricingtable-wrapper'>
           <tr>";
          $sql = "SELECT round(AVG(stars),1)  FROM `comment` where book_name='".$bookname."'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_all($result);
          $avgscore = $row[0][0];
          echo"
           <td>平均分數：<br>$avgscore/5.0</td>
           <td>
           <a class='button small gradient red rnd8' href='/rs/elements/productpage.php?page=$_GET[page]'>全部</a>
           <a class='button small gradient red rnd8'  href='/rs/elements/productpage.php?page=$_GET[page]&comments=5'>5星</a>
           <a class='button small gradient red rnd8' href='/rs/elements/productpage.php?page=$_GET[page]&comments=4'>4星</a>
           <a class='button small gradient red rnd8' href='/rs/elements/productpage.php?page=$_GET[page]&comments=3'>3星</a>
           <a class='button small gradient red rnd8' href='/rs/elements/productpage.php?page=$_GET[page]&comments=2'>2星</a>
           <a class='button small gradient red rnd8' href='/rs/elements/productpage.php?page=$_GET[page]&comments=1'>1星</a>
           </td>
</tr></table>
            <table border='1px' style='background-color: #513842;font-size: 24px; color: #FFFFFF;' class='pricingtable-wrapper'>
<tr>
                           <td width='25%'>會員名稱</td>                                      
                           <td width='60%'>評論</td>
                           <td width='15%'>評價</td>
</tr>
</table>
<table border='1px' style='background-color: #FFFFFF;font-size: 24px; color: #000000;' class='pricingtable-wrapper'>";
                       $sql = "select * from `comment` where book_name='".$bookname."'";
                       $result = mysqli_query($conn, $sql);
                       $row = mysqli_fetch_all($result);
                       if(!isset($_GET["comments"]))
                       {
                           for($i=0;$i<mysqli_num_rows($result);$i++){
                               if ($row[$i][4] == 5) {
                                   $commentstar = "★★★★★";
                               } else if ($row[$i][4] == 4) {
                                   $commentstar = "★★★★☆";
                               } else if ($row[$i][4] == 3) {
                                   $commentstar = "★★★☆☆";
                               } else if ($row[$i][4] == 2) {
                                   $commentstar = "★★☆☆☆";
                               } else {
                                   $commentstar = "★☆☆☆☆";
                               }
                               echo   "<tr><td width='25%'>".$row[$i][1]."</td>
                                   <td width='60%'>".$row[$i][3]."</td>
                                   <td width='15%'>".$commentstar."</td></tr>";
                           }
                       }
                       //有選
                        else
                        {
                            if ($_GET["comments"]==1){
                                $commentstar = "★☆☆☆☆";
                                $sql = "select * from `comment` where stars=$_GET[comments] and book_name='".$bookname."'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_all($result);
                                for($i=0;$i<mysqli_num_rows($result);$i++) {
                                    echo "<tr><td width='25%'>" . $row[$i][1] . "</td>
                                   <td width='60%'>" . $row[$i][3] . "</td>
                                   <td width='15%'>" . $commentstar . "</td></tr>";
                                }
                            }
                            if ($_GET["comments"]==2){
                                $commentstar = "★★☆☆☆";
                                $sql = "select * from `comment` where stars=$_GET[comments] and book_name='".$bookname."'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_all($result);
                                for($i=0;$i<mysqli_num_rows($result);$i++) {
                                    echo "<tr><td width='25%'>" . $row[$i][1] . "</td>
                                   <td width='60%'>" . $row[$i][3] . "</td>
                                   <td width='15%'>" . $commentstar . "</td></tr>";
                                }
                            }
                            if ($_GET["comments"]==3){
                                $commentstar = "★★★☆☆";
                                $sql = "select * from `comment` where stars=$_GET[comments] and book_name='".$bookname."'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_all($result);
                                for($i=0;$i<mysqli_num_rows($result);$i++) {
                                    echo "<tr><td width='25%'>" . $row[$i][1] . "</td>
                                   <td width='60%'>" . $row[$i][3] . "</td>
                                   <td width='15%'>" . $commentstar . "</td></tr>";
                                }
                            }
                            if ($_GET["comments"]==4){
                                $commentstar = "★★★★☆";
                                $sql = "select * from `comment` where stars=$_GET[comments] and book_name='".$bookname."'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_all($result);
                                for($i=0;$i<mysqli_num_rows($result);$i++) {
                                    echo "<tr><td width='25%'>" . $row[$i][1] . "</td>
                                   <td width='60%'>" . $row[$i][3] . "</td>
                                   <td width='15%'>" . $commentstar . "</td></tr>";
                                }
                            }
                            if ($_GET["comments"]==5){
                                $commentstar = "★★★★★";
                                $sql = "select * from `comment` where stars=$_GET[comments] and book_name='".$bookname."'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_all($result);
                                for($i=0;$i<mysqli_num_rows($result);$i++) {
                                    echo "<tr><td width='25%'>" . $row[$i][1] . "</td>
                                   <td width='60%'>" . $row[$i][3] . "</td>
                                   <td width='15%'>" . $commentstar . "</td></tr>";
                                }
                            }
                        }



                      echo"
</tr></table>
</table>
            </li>
      </ul>
      <!-- ####################################################################################################### -->

    </div>";
?>
    <!-- ################################################################################################ -->
    <div class='clear'></div>
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