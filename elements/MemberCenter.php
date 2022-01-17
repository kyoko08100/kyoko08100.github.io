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

//審核賣家

if(isset($_GET["check_seller"]))
{
    if($_GET["value"]==2)
    {
        echo "<script>alert('審核成功');</script>";
        $query="UPDATE `seller` SET `status`=2 WHERE id='$_GET[check_seller]'";
        $result = mysqli_query($conn, $query);
        $qquery="UPDATE `user` SET `token`=2 WHERE id='$_GET[check_seller]'";
        $rresult = mysqli_query($conn, $qquery);
        echo "<script>window.location='/rs/elements/MemberCenter.php?page=1';</script>";

    }
    elseif ($_GET["value"]==1)
    {
        echo "<script>alert('成功拒絕申請');</script>";
        $sql="DELETE FROM `seller` WHERE `id`=$_GET[check_seller]";
        $r=mysqli_query($conn, $sql);
    }



}
//審核賣家結束
//賣家上架書籍

if(isset($_POST["book_update"]))
{
    $fileName=$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
    if ($_POST["bookname"]=="")
    {
        echo "<script>alert('請輸入書名');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["author"]=="")
    {
        echo "<script>alert('請輸入作者');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["book_type"]=="")
    {
        echo "<script>alert('請選擇書籍類別');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["publisher"]=="")
    {
        echo "<script>alert('請輸入出版社');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["publication_date"]=="")
    {
        echo "<script>alert('請輸入出版日期');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["ISBN"]=="")
    {
        echo "<script>alert('請輸入ISBN');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["language"]=="")
    {
        echo "<script>alert('請輸入語言');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["page_num"]=="")
    {
        echo "<script>alert('請輸入頁數');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["content"]=="")
    {
        echo "<script>alert('請輸入內容簡介');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["quantity"]=="")
    {
        echo "<script>alert('請輸入數量');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($_POST["price"]=="")
    {
        echo "<script>alert('請輸入價格');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    elseif ($fileName=="")
    {
        echo "<script>alert('請上傳照片');window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";
    }
    else
    {
//        if(isset($_FILES['file']['name']))
//        {


            $fileName="/rs/elements/".$fileName;
//            $sql="UPDATE `主標題` SET `圖片`='$uimg' WHERE `主標題`='$_POST[title]'";
//            mysqli_query($db_link, 'SET CHARACTER SET big 5');
//            $result=mysqli_query($db_link, $sql);
//        }


        echo "<script>alert('上架成功');</script>";
        $sql = "select * from `user` where account='$_SESSION[account]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
//        $query="insert into seller values(".$row[0].",'".$_POST["name"]."','".$_POST["type"]."','".$_POST["id_number"]."',1)";
//        $query = "insert into `user` values(".$row[0].",'".$_POST["name"]."','".$_POST["type"]."','".$_POST["id_number"]."',1,'".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."','".$_POST["id_number"]."')";
        $query = "insert into `bookinventory` values(NULL ,'".$_SESSION["account"]."','".$fileName."' ,'".$_POST["bookname"]."','".$_POST["english_bookname"]."','".$_POST["author"]."','".$_POST["translator"]."','".$_POST["publisher"]."','".$_POST["publication_date"]."','".$_POST["ISBN"]."','".$_POST["language"]."','".$_POST["page_num"]."', '".$_POST["bookname"]."','".$_POST["content"]."','".$_POST["quantity"]."','".$_POST["price"]."','".$_POST["book_type"]."')";
        $rresult = mysqli_query($conn, $query);
        echo "<script>window.location.href='/rs/elements/MemberCenter.php?page=6';</script>";


    }


}
//賣家上架書籍結束

//管理者完成訂單

if(isset($_GET["order_complete"]))
{

        echo "<script>alert('成功');</script>";
        $query="UPDATE `orderbuy` SET `status`=1 WHERE id='$_GET[order_complete]'";
        $result = mysqli_query($conn, $query);
        echo "<script>window.location='/rs/elements/MemberCenter.php?page=4';</script>";

}
//管理者完成訂單結束

//評價功能

if(isset($_POST["book_comment"]))
{
    if ($_POST["comment_stars"]=="")
    {
        echo "<script>alert('請選擇評價星數');window.location.href='/rs/elements/comment.php?bookname=$_GET[bookname]';</script>";
    }
    elseif ($_POST["content"]=="")
    {
        echo "<script>alert('請輸入評價內容');window.location.href='/rs/elements/comment.php?bookname=$_GET[bookname]';</script>";
    }
    else
    {
        echo "<script>alert('評價成功');</script>";
        $query = "insert into `comment` values(NULL ,'".$_SESSION["account"]."','".$_GET["bookname"]."','".$_POST["content"]."','".$_POST["comment_stars"]."')";
        //
        $rresult = mysqli_query($conn, $query);
        echo "<script>window.location.href='/rs/elements/MemberCenter.php?page=4';</script>";
    }


}
//評價功能結束
//書籍下架功能
if($_GET["delete_product"]==1)
{
        $sssql ="DELETE FROM `bookinventory` where sellid='".$_SESSION["account"]."' and bookname='".$_GET["bookname"]."' ";
        $rrresult = mysqli_query($conn, $sssql);
    echo "<script>alert('下架成功');window.location='/rs/elements/MemberCenter.php?page=8';</script>";
}
//書籍下架功能結束
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
    <!-- ################################################################################################ -->
      <div id="sidebar_1" class="sidebar one_quarter first">
          <aside>
              <!-- ########################################################################################## -->
              <h2 style="font-weight:bold">
                  <?php
                  if($_SESSION['token']==3){
                      echo "管理者中心";
                  }
                  else{
                      echo "會員中心";
                  }
                  ?></h2>
              <nav>
                  <ul>
                      <li><a href="/rs/elements/MemberCenter.php">
                              <?php
                              if($_SESSION['token']==3){
                                  echo "管理者中心首頁</a></li>
                      <li><a >會員資料管理</a></li>
                      <ul>
                          <li><a href='/rs/elements/MemberCenter.php?page=1'>審核賣家權限</a></li>
                          <li><a href='/rs/elements/MemberCenter.php?page=2'>修改密碼</a></li>
                          <li><a href='/rs/elements/MemberCenter.php?page=3'>會員資料更新</a></li>
                      </ul>
                      <li><a >訂單管理</a></li>
                      <ul>
                          <li><a href='/rs/elements/MemberCenter.php?page=4'>訂單狀況處理</a></li>
                      </ul>";
                              }
                              else{
                                  echo "會員中心首頁</a></li>
                      <li><a >會員資料管理</a></li>
                      <ul>
                          <li><a href='/rs/elements/MemberCenter.php?page=1'>申請賣家權限</a></li>
                          <li><a href='/rs/elements/MemberCenter.php?page=2'>修改密碼</a></li>
                          <li><a href='/rs/elements/MemberCenter.php?page=3'>會員資料更新</a></li>
                      </ul>
                      <li><a >訂單查詢管理</a></li>
                      <ul>
                          <li><a href='/rs/elements/MemberCenter.php?page=4'>訂單查詢</a></li>
                      </ul>";
                              }
                              if($_SESSION["token"]>=2)
                              {
                                  echo "<li><a >書籍販售查詢/管理</a></li>
                      <ul>
                          <li><a href='/rs/elements/MemberCenter.php?page=6'>書籍上架</a></li>
                          <li><a href='/rs/elements/MemberCenter.php?page=7'>書籍收益清單</a></li>
                          <li><a href='/rs/elements/MemberCenter.php?page=8'>書籍下架</a></li>
                      </ul>";
                              }
                              ?>


                      <!--<ul>
                          <li><a href="#">Free XHTML Templates</a></li>
                          <li><a href="#">Free Web Templates</a></li>
                      </ul>-->


                  </ul>
              </nav>

              <!-- ########################################################################################## -->
          </aside>
      </div>
    <!-- ################################################################################################ -->
    <div id="portfolio" class="three_quarter">
        <h1 style="font-weight:bold;font-size: 30px">
            <?php
            if($_SESSION['token']==3){
                echo "管理者中心";
            }
            else{
                if(!isset($_GET['page'])){
                    echo "會員中心";
                }
                elseif ($_GET['page']==1)
                {
                    echo "申請賣家權限";
                }
                elseif ($_GET['page']==2)
                {
                    echo "修改密碼";
                }
                elseif ($_GET['page']==3)
                {
                    echo "會員資料更新";
                }
                elseif ($_GET['page']==4)
                {
                    echo "訂單查詢";
                }
                elseif ($_GET['page']==5)
                {
                    echo "訂單修改/取消";
                }
                elseif ($_GET['page']==6)
                {
                    echo "書籍上架";
                }
                elseif ($_GET['page']==7)
                {
                    echo "書籍收益清單";
                }
                elseif ($_GET['page']==8)
                {
                    echo "書籍下架";
                }
            }

            ?>
        </h1>
        <style>
            hr.style-two {
                border: 0;
                height: 10px;
                background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
            }
        </style>
        <hr class="style-two" />
        <?php //分割線
        if(!isset($_GET['page'])){
            if($_SESSION['token']==3){
                echo "<h4>歡迎".$_SESSION['account']."來到管理者中心！</h4>";
            }
            else
            echo "<h4>歡迎".$_SESSION['account']."來到會員中心！</h4>";
        }
        elseif ($_GET['page']==1)
        {
            if($_SESSION['token']==1)
            {
                $query="select * from `user` WHERE account=$_SESSION[account]";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $qquery="select * from `seller` WHERE id=$row[id]";
                $rresult = mysqli_query($conn, $qquery);
                $rrow = mysqli_fetch_assoc($rresult);
                if($rrow["status"]==1)
                {
                    echo "申請中";
                }
                else
                {
                    echo "<br>";
                    echo "<form method='post' action='/rs/index.php' style='width: 100%'>";
                    echo "<br><br><span style='font-size: 16px;'>名稱：<input type='text' name='name' style='font-size: 20px; padding: 0px;width: 25%;'>（請輸入正確中文姓名/公司名稱，需與銀行/郵局戶名相同，字數最多20字。）";
                    echo "<br><br>屬性：<input type='radio' name='type' value='個人' style='font-size: 20px; padding: 0px;margin: 0px;width: 3%;'>個人";
                    echo "<input type='radio' name='type' value='公司' style='font-size: 30px; padding: 0px;margin: 0px;width: 3%;'>公司";
                    echo "<br><br><span style='font-size: 16px;'>身分證字號：<input type='text' name='id_number' style='font-size: 20px; padding: 0px;width: 25%;'> (請輸入正確的身分證字號，外籍人士請輸入居留證統一證號)";
                    echo "<br><br><input type='submit' name='seller' value='確定' style='font-size: 20px;'></span>";
                    echo "</form>";
                }

            }
            if($_SESSION['token']==2)
            {
                echo "已通過";
            }
            if($_SESSION['token']==3)
            {
                $sql = "select * from `seller` WHERE status=1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_all($result);
                echo "<h4>以下為尚未審核之賣家申請：</h4>";
                echo "<table border='2' class='pricingtable-wrapper'>

        <tr>
            <td >會員ID</td>
            <td >會員名稱</td>
            <td >會員屬性</td>
            <td >會員身份證字號</td>
            <td >操作</td>

        </tr>";
                for($i=0;$i<mysqli_num_rows($result);$i++)
                {
                    echo "<tr>
            <td>".$row[$i][0]."</td>
            <td>".$row[$i][1]."</td>
            <td>".$row[$i][2]."</td>
            <td>".$row[$i][3]."</td>
            <td><a href='/rs/elements/MemberCenter.php?page=1&check_seller=".$row[$i][0]."&value=2' class='button small gradient red rnd8'>同意</a>   <a href='/rs/elements/MemberCenter.php?page=1&check_seller=".$row[$i][0]."&value=1' class='button small gradient blue rnd8'>拒絕</a></td>
        </tr>";
                }
                echo "</table>";
            }

        }
        elseif ($_GET['page']==2)
        {
            echo "<span style='font-size: 20px;color: #919191;'>輸入6-12個字符,由英文及阿拉伯數字組成,請勿使用特殊符號</span><br>";
            echo "<form method='post' action='/rs/index.php'>";
            echo "<br><br><span style='font-size: 20px;'>請輸入您的新密碼：</span><input type='password' name='password1' style='font-size: 20px; padding: 0px;width: 25%;'>";
            echo "<br><br><span style='font-size: 20px;'>請再次確認密碼：</span><input type='password' name='password2' style='font-size: 20px; padding: 0px;width: 25%;'>";
            echo "<br><br><input type='submit' name='update_password' value='確定' style='font-size: 20px;'>";
            echo "</form>";
        }
        elseif ($_GET['page']==3)
        {
            $sql = "select * from `user` where account='$_SESSION[account]'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<span style='font-size: 20px;color: #919191;'>輸入6-12個字符,由英文及阿拉伯數字組成,請勿使用特殊符號</span><br>";
            echo "<form action='/rs/index.php' method='post'>";
            echo "<br><span style='font-size: 20px;'>帳號：".$row['account']."</span>";

            echo "<br><br><span style='font-size: 20px;'>名稱：</span><input type='text'  name='bookmembername' style='font-size: 20px; padding: 0px;width: 25%;' value='$row[name]'>";
            echo "<br><br><span style='font-size: 20px;'>e-mail信箱：</span><input type='text' name='email' style='font-size: 20px; padding: 0px;width: 50%;' value='$row[email]'>";
            echo "<br><br><span style='font-size: 20px;'>生日：</span><input type='text' name='bookmemberbirthday' style='font-size: 20px; padding: 0px;width: 25%;' value='$row[birthday]' onclick='showcalendar(event,this);'>";
            echo "<br><br><span style='font-size: 20px;'>居住縣市：</span><select name='city' style='font-size: 20px; '>
      <option value='begincity'>請選擇</option>
      <option value='Keelung'>基隆</option>
      <option value='Taipei'>台北</option>
      <option value='NewTaipei'>新北</option>
      <option value='Taoyuan'>桃園</option>
      　	<option value='Hsinchu'>新竹</option>
      　	<option value='Miaoli'>苗栗</option>
      　	<option value='Taichung'>台中</option>
      　	<option value='Changhua'>彰化</option>
      　	<option value='Yunlin'>雲林</option>
      　	<option value='Chiayi'>嘉義</option>
      　	<option value='Tainan'>台南</option>
      　	<option value='Kaohsiung'>高雄</option>
      　	<option value='Pingtung'>屏東</option>
      　	<option value='Taitung'>台東</option>
      　	<option value='Hualien'>花蓮</option>
      　	<option value='Yilan'>宜蘭</option>
      　	<option value='Nantou'>南投</option>
      　	<option value='Lianjiang'>連江</option>
      　	<option value='Kinmen'>金門</option>
      　	<option value='Penghu'>澎湖</option>
    </select>";
            echo "<br><br><span style='font-size: 20px;'>地址：</span><input type='text' name='address' style='font-size: 20px; padding: 0px;width: 25%;' value='$row[address]'>";
            echo "<br><br><span style='font-size: 20px;'>聯絡電話：</span><input type='text' name='phone' style='font-size: 20px; padding: 0px;width: 25%;' value='$row[phone]'>";
            echo "<br><br><span style='font-size: 20px;'>付款方式：</span><select name='pay' style='font-size: 20px; '>      <option value='beginpay'>請選擇</option>
      <option value='home'>貨到付款</option>
      <option value='store'>超商付款</option>
      <option value='else'>其他</option>
    </select>";
            echo "<br><br><input type='submit' name='member_update' value='確定' style='font-size: 20px;'>";
            echo "</form>";
        }
        elseif ($_GET["page"]==4)
        {
            if($_SESSION["token"]==3)
            {
                $sql = "select * from `orderbuy`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_all($result);
                echo "<table border='2px' class='pricingtable-wrapper'>

        <tr>
            <td >賣家</td>
            <td >書名</td>
            <td >單價</td>
            <td >數量</td>
            <td >總額</td>
            <td >商品狀態</td>

        </tr>";
                for($i=0;$i<mysqli_num_rows($result);$i++)
                {
                    echo "<tr>
            <td>".$row[$i][2]."</td>
            <td>".$row[$i][3]."</td>
            <td>".$row[$i][4]."</td>
            <td>".$row[$i][5]."</td>
            <td>".($row[$i][4] * $row[$i][5])."</td>";
                    if($row[$i][6]==1)
                    {
                        echo "<td>買家未評價</td>
        </tr>";
                    }
                    else if($row[$i][6]==2){
                        echo "<td>訂單完成</td>";
                    }
                    else
                    {
                        echo "<td><a href='/rs/elements/MemberCenter.php?page=1&order_complete=".$row[$i][0]."&value=2' class='button small gradient red rnd8'>完成訂單</a></td>
        </tr>";
                    }
                }
                echo "</table>";
            }
            else
            {
                $sql = "select * from `orderbuy` where member_id='$_SESSION[account]'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_all($result);
                echo "<table border='2px' class='pricingtable-wrapper'>

        <tr>
            <td >書名</td>
            <td >單價</td>
            <td >數量</td>
            <td >總額</td>
            <td >商品狀態</td>

        </tr>";
                for($i=0;$i<mysqli_num_rows($result);$i++)
                {
                    echo "<tr>
            <td>".$row[$i][3]."</td>
            <td>".$row[$i][4]."</td>
            <td>".$row[$i][5]."</td>
            <td>".($row[$i][4] * $row[$i][5])."</td>";
                    if($row[$i][6]==0)
                    {
                        echo "<td>訂單處理中</td>
        </tr>";
                    }
                    else if ($row[$i][6]==2){
                        echo "<td>訂單已完成</td>";
                    }
                    else
                    {
                        echo "<td><a href='/rs/elements/comment.php?bookname=".$row[$i][3]."' class='button small gradient red rnd8'>評價</a> </a></td>
        </tr>";
                    }

                }
                echo "</table>";
            }

        }
        elseif ($_GET["page"]==6)
        {

            echo "<span style='font-size: 20px;color: #919191;'>請輸入書籍基本資料 ( *為必填欄位 )</span><br>";
            echo "<form style='width: 100%' action='/rs/elements/MemberCenter.php' method='post' enctype='multipart/form-data'>";
            echo "<br><br><span style='font-size: 20px;'>*書籍類別：新書</span><input type='radio' name='book_type' value='新書' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "<span style='font-size: 20px;'>二手書</span><input type='radio' name='book_type' value='二手書' style='font-size: 300px; padding: 0px;margin: 0px;width: 30px; height: 20px;'>";
            echo "<br><br><span style='font-size: 20px;'>*書名：</span><input type='text'  name='bookname' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>英文書名：</span><input type='text' name='english_bookname' style='font-size: 20px; padding: 0px;width: 50%;' >";
            echo "<br><br><span style='font-size: 20px;'>*作者：</span><input type='text' name='author' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>譯者：</span><input type='text' name='translator' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*出版社：</span><input type='text' name='publisher' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*出版日期：</span><input type='text' name='publication_date' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*ISBN：</span><input type='text' name='ISBN' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*語言：</span><input type='text' name='language' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*頁數：</span><input type='text' name='page_num' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*圖片：</span><input type='file' name='image' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;line-height: 20px;'>*內容簡介：</span><br><textarea name='content' rows='10' cols='300' style='font-size: 20px; padding: 0px;width: 80%;' ></textarea>";
            echo "<br><br><span style='font-size: 20px;'>*單價：</span><input type='text' name='price' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><span style='font-size: 20px;'>*數量：</span><input type='text' name='quantity' style='font-size: 20px; padding: 0px;width: 25%;' >";
            echo "<br><br><input class='button small gradient blue' type='submit' name='book_update' value='確定' style='font-size: 20px;'>";
            echo "</form>";
        }
        elseif ($_GET["page"]==7)
        {


                $sql = "select * from `orderbuy` where sellerid='".$_SESSION["account"]."' and status=2";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_all($result);
                echo "<table border='2px' class='pricingtable-wrapper'>

        <tr>
            <td >書名</td>
            <td >單價</td>
            <td >數量</td>
            <td >總額</td>
            <td >商品狀態</td>

        </tr>";
                for($i=0;$i<mysqli_num_rows($result);$i++)
                {
                    echo "<tr>
            <td>".$row[$i][3]."</td>
            <td>".$row[$i][4]."</td>
            <td>".$row[$i][5]."</td>
            <td>".($row[$i][4] * $row[$i][5])."</td>";
                        echo "<td>訂單已完成</td>";


                }
                echo "</table>";

            $sql = "select SUM(price * quantity) from `orderbuy` where sellerid='".$_SESSION["account"]."' and status=2";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($result);
                echo "<span style='font-size: 20px;color: #919191;'>書籍總收益：".$row[0][0]."元</span>";

        }
        elseif ($_GET["page"]==8)
        {
            $sql = "select * from `bookinventory` where sellid='".$_SESSION["account"]."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($result);
            echo "<table border='2px' class='pricingtable-wrapper'>

        <tr>
            <td >書名</td>
            <td >單價</td>
            <td >數量</td>
            <td >作者</td>
            <td >ISBN</td>
            <td >操作</td>

        </tr>";
            for($i=0;$i<mysqli_num_rows($result);$i++)
            {
                echo "<tr>
            <td>".$row[$i][3]."</td>
            <td>".$row[$i][15]."</td>
            <td>".$row[$i][14]."</td>
            <td>".$row[$i][5]."</td>
            <td>".$row[$i][9]."</td>";
                    echo "<td><a href='/rs/elements/MemberCenter.php?delete_product=1&bookname=".$row[$i][3]."' class='button small gradient red rnd8'>下架</a> </a></td>
        </tr>";


            }
            echo "</table>";
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
<script>window.jQuery || document.write('<script src="../layout/scripts/jquery-latest.min.js"><\/script>\
<script src="../layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="../layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="../layout/scripts/custom.js"></script>
</body>
</html>