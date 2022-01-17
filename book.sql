-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `book`
--

-- --------------------------------------------------------

--
-- 資料表結構 `accounting`
--

CREATE TABLE `accounting` (
  `no` int(11) NOT NULL,
  `sellfee` int(11) DEFAULT NULL,
  `buyfee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `accounting`
--

INSERT INTO `accounting` (`no`, `sellfee`, `buyfee`) VALUES
(2, NULL, 1000),
(3, 1000, NULL),
(4, 5000, NULL),
(5, NULL, 12),
(6, NULL, 1513);

-- --------------------------------------------------------

--
-- 資料表結構 `bookinventory`
--

CREATE TABLE `bookinventory` (
  `id` int(11) NOT NULL COMMENT '編號',
  `sellid` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '賣家ID',
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `bookname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '書名',
  `english_bookname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '英文書名',
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '作者',
  `translator` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '譯者',
  `publisher` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '出版社',
  `publication_date` date NOT NULL COMMENT '出版日期',
  `ISBN` text COLLATE utf8mb4_general_ci NOT NULL,
  `language` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '語言',
  `page_num` int(10) NOT NULL,
  `shipping_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '運送方式',
  `content` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '內容簡介',
  `quantity` int(11) NOT NULL COMMENT '數量',
  `price` int(11) NOT NULL COMMENT '單價',
  `type` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `bookinventory`
--

INSERT INTO `bookinventory` (`id`, `sellid`, `image`, `bookname`, `english_bookname`, `author`, `translator`, `publisher`, `publication_date`, `ISBN`, `language`, `page_num`, `shipping_method`, `content`, `quantity`, `price`, `type`) VALUES
(1, '123', '/rs/elements/測試書.jpg', '馬特萊斯特的奇幻旅程．上集：拉薩魔法師', 'A Matt Lester Spiritual Thriller: The Magician of Lhasa', '大衛．米奇', '王詩琪', '時報文化出版企業股份有限公司', '2021-11-23', '9789571396729', '繁體中文', 368, '超商取貨、宅配取貨', '一九五九年，當中國紅軍侵入西藏，這個國家最黑暗的時刻來臨，年輕的僧侶丹僧多傑，心中升起了無比的使命感。他接受了一項任務，即將穿越喜馬拉雅山，與慈林喇嘛和旺波一起，面對重重危難，將古老的祕密典籍，帶到安全之地。而另一位主角，馬特，則從倫敦到美國工作，在美期間，遇到隔壁住著一位僧侶，各種神祕的巧合，密密交織。\r\n多傑與馬特，一九五九年與二○○七年，一名藏人，一名英國人，橫跨時空的祕密，究竟是什麼？\r\n\r\n本書在真實的歷史背景之上，融入佛教的世界觀，架構出極具張力的懸疑小說。從中國入侵西藏開始，一連串與生死搏鬥的危機，被盜走的佛像、人人覬覦的古老典籍、神祕難解的伏藏。以現代而細膩的小說筆法，打造具有佛教文化色彩的魅力之作，是一部超過宗教限制，劇情起伏堪比丹布朗《達文西密碼》的傑作。', 5, 450, '新書'),
(2, '123', '/rs/elements/致富心態︰關於財富、貪婪與幸福的20堂理財課.jpg', '致富心態︰關於財富、貪婪與幸福的20堂理財課', '', '摩根．豪瑟', '周玉文', '遠見天下文化出版股份有限公司', '2021-01-27', '9789865250348', '繁體中文', 320, '超商取貨、宅配取貨', '世界上有賺很多錢卻破產的人，也有賺很少錢卻有辦法捐大錢做慈善的人。為什麼？<br><br>\r\n因為理財結果與運氣和風險有關，而且不受才智與個人努力影響，更重要的是，與其了解許多理財專業知識，適當的言行舉止更加關鍵。<br><br>\r\n\r\n這就是致富心態，這是現今社會不可或缺的軟實力。<br><br>\r\n\r\n《華爾街日報》知名專欄作家摩根‧豪瑟發覺，我們是用理解知識的方式在思考、學習金錢觀，而不是用理解心智與行為模式的方式在學習投資與理財。不過，我們的理財行為卻深受各種情緒的影響。每個人看待世界運作的方式各不相同，所以看待金錢運作的觀點天差地別，結果是有人成為富翁，有人卻窮困潦倒。<br><br>\r\n\r\n在《致富心態》中，摩根‧豪瑟分享許多短篇的理財故事，探討人們思考金錢的方式，並傳授致富的技巧，你會學到：\r\n<br><br>\r\n．巴菲特成為億萬富翁的真正理由\r\n．致富與守財是兩種不同的技巧，但都非常重要。\r\n．有許多事情不管潛在獲利有多龐大，都不值得冒險。<br><br>\r\n．了解長尾效應與複利效果的本質與威力。<br>\r\n．掌控你的時間，就是金錢付給你最高的紅利。<br>\r\n．預留安全邊際的重要性。<br>\r\n．財富自由真正的本質。<br>\r\n\r\n就算你是零經驗的理財新手，也可以輕鬆學會一生受用的致富觀念與技巧；如果你已經理財有成，更能進一步突破盲點、強化策略，讓你不只賺更多，還可以永遠保有財富，一輩子過著生活無虞的快樂人生。', 5, 450, '二手書'),
(3, '123', '/rs/elements/情緒勒索：那些在伴侶、親子、職場間，最讓人窒息的相處.jpg', '情緒勒索：那些在伴侶、親子、職場間，最讓人窒息的相處', NULL, '周慕姿', NULL, '寶瓶文化事業股份有限公司', '2017-02-02', '9789864060788', '繁體中文', 272, '超商取貨、宅配取貨', '「我這輩子的希望都在你身上了……」<br><br>\r\n「爸媽難道會害你嗎？」<br><br>\r\n「你敢離開，我就跳下去。」<br><br>\r\n\r\n明明是最愛的家人、伴侶，與信任的朋友、同事，\r\n但為什麼我們卻總是感到委屈、想逃？<br><br>\r\n\r\n你未曾覺察的「情緒勒索」，正在你的日常裡，一步步逼你就範。<br><br>\r\n\r\n6道關鍵練習，擺脫被情緒勒索，重新掌握人生！<br><br>\r\n\r\n情緒勒索是一種操控，只會讓彼此的關係崩壞。<br><br>\r\n因為當對方一再屈服與退讓，那是因為懼怕，而不是因為親密、信任與愛。<br><br>', 5, 190, '新書'),
(4, '123', '/rs/elements/原來，食物這樣煮才好吃！：從用油、調味、熱鍋、選食材到保存，150個讓菜色更美味、廚藝更進步的料理科學.jpg', '原來，食物這樣煮才好吃！', NULL, 'BRYAN LE', '王曼璇', '聯經出版事業股份有限公司', '2021-06-10', '9789570858501', '繁體中文', 224, '超商取貨、宅配取貨', '──食物好吃的關鍵在「科學原理」──<br><br>\r\n150個大廚不說，但你一定要會的料理技巧！<br><br>\r\n幫助你精準做菜、廚藝再升級！<br><br>\r\n★美國亞馬遜5顆星好評推薦★<br><br>\r\n\r\n當你買了食材，準備在廚房大展身手時，可能也曾碰過這些狀況：<br><br>\r\n‧為什麼做好的美乃滋不濃稠？<br><br>\r\n‧從冰箱拿出來的菜，葉子卻發黃了？<br><br>\r\n‧手邊有高湯和大骨湯，不知該用哪一種？<br><br>\r\n‧煎牛排時，肉為什麼一直黏在鍋子上？<br><br>\r\n‧醬油開封後，需要冷藏嗎？<br><br>\r\n\r\n事實上，若想煮出美味好菜，只要了解「科學原理」就能事半功倍。<br><br>\r\n\r\n身為食品科學博士候選人的作者，因為喜愛食物，進而開始研究食物背後的科學原理。他發現，就算不會煮菜，但只要能控制溫度、濕度、酸度、鹽分等，就能神奇地改變料理呈現的風味。因此他決定將這些有趣且實用的知識集結成書，分享給大家。', 5, 450, '二手書'),
(18, '234', '/rs/elements/生活日語全集中圖解日語單字.jpg', '生活日語全集中圖解日語單字', '', 'LiveABC編輯群', '', '希伯崙股份有限公司', '2021-08-18', '9789864415885', '繁體中文', 512, '生活日語全集中圖解日語單字', '看圖學日文單字，從生活的大小事開始\r\n讓你不只學得多，更能學得精！\r\n<br><br>\r\n學習外語是一個漸進式的過程，從基礎到進階，從廣泛到細微。我們想知道的東西永遠沒有最多，只有更多。當學完甜點這個字已經無法滿足你的好奇心後，你會想知道甜點又分成什麼種類，有哪些不同的區別和說法。始於這種渴望學習的出發點，我們打造了這本學廣又學深的圖解日文單字書。\r\n<br><br>\r\n本書歸納成「飲食文化」、「服飾與配件」、「居家生活」、「交通旅遊」、「體育活動」、「休閒娛樂」、和「世界各地」等七大主題，其下再細分類為28個單元，收錄了超過4000個常見常用、或是常見卻不知道怎麼說的單字。以「飲食文化」為例，我們列舉了各國料理及甜點的餐點，另外還介紹了餐廳裡的各式餐點飲料、餐具器皿、烹調方式、香料醬汁，連餐廳種類和知名連鎖餐飲店的說法，也能在本書裡一一學到喔。\r\n<br><br>\r\n有別於一般單字書採用廣泛的分類方式，本書秉持著「學多又學精」的原則來規劃了學習內容。當你翻到超市裡的生鮮單元，除了多樣的蔬菜名稱之外，我們還深究了沙拉葉、蕈菇、堅果的種類有哪些。當你學到酒類，我們也提供了各式雞尾酒、日本酒、烈酒、啤酒……等的名稱或品牌。如此精細的分類，就是想要盡量滿足讀者「這個字怎麼說、那個字怎麼唸」的求知慾望。\r\n<br><br>\r\n每一個日文單字旁邊皆附有羅馬拼音和中文意思，有效輔助拼讀發音。針對由外來語改成的日文人名、地名、商標名等專有名詞，我們會在旁邊加上原有的英文或原文幫助還原理解。另外某些單字具有特殊的文化背景和用法細節的差異，老師也會適時在單字後面補充說明。\r\n<br><br>\r\n這是一本內容強大的日文單字學習書，搭配大量全彩圖片豐富視覺感官。不管是拿來當查找字彙的字典工具，或是用來自我充實兼娛樂消遣，相信都能符合你的需求。現在就趕快翻開本書，從你最有興趣的單元開始閱讀吧！\r\n\r\n', 10, 299, '新書'),
(21, '123', '/rs/elements/TheSecret秘密.jpg', 'The Secret祕密', '', '朗達．拜恩', '謝明憲', '方智出版', '2007-06-26', '9789861750675', '繁體中文', 327, 'The Secret祕密', '在你手上的，是一個至大的祕密……\r\n<br><br>\r\n一位澳洲電視工作者，有一年，父親突然身故、工作遭遇瓶頸、家庭關係也陷入僵局，就在人生跌落谷底、生活即將崩潰時，偶然間讀到一本百年古書，發現了一個生命中的重大祕密，而過去知道這個祕密的，竟然都是歷史上的偉大人物：柏拉圖、莎士比亞、牛頓、雨果、貝多芬、林肯、愛默生、愛迪生、愛因斯坦。她不禁要問：「為什麼不是每個人都知道呢？」<br>\r\n於是，她開始組織一個工作團隊，尋找當世知道這個祕密的人。他們都是各行各業的佼佼者，並且現身說法告訴你：<br>\r\n了解這個祕密，就沒有做不到的事；不論你是誰，你想要什麼，這個祕密都能給你！', 3, 250, '二手書'),
(23, '123', '/rs/elements/數字偏見︰不再被操弄與誤導，洞悉偽科學的防彈思考.jpg', '數字偏見︰不再被操弄與誤導，洞悉偽科學的防彈思考', 'The Number Bias: How Numbers Lead and Mislead Us', '桑妮．布勞', '林曉欽', '今周刊出版社股份有限公司', '2021-12-30', '9786267014240', '繁體中文', 240, '數字偏見︰不再被操弄與誤導，洞悉偽科學的防彈思考', '有個現象愈來愈顯著，那就是數字決定世界的面貌：<br>\r\n從退休年齡到Facebook點擊次數，從國內生產總值到我們的收入。<br>\r\n但有沒有可能，你愈相信數字，就離真相愈遠？<br>\r\n<br>\r\n在現代社會，我們的日常生活早已離不開數字，這並非誇大。<br>\r\n例如，我們靠降雨機率思索今天該穿哪雙鞋、<br>\r\n靠體重計決定晚上的聚餐該不該參加、靠考試分數衡量自己的表現。<br>\r\n數字也告訴我們什麼樣的身體條件才是健康、怎樣的生活水準才叫富足、<br>\r\n要得到什麼結果才叫第一，甚至判讀幾個月後是否在世。<br>\r\n<br>\r\n因為相信「數字會說話」，所以愈來愈多的決策依賴數據。<br>\r\n企業用數字衡量員工是否努力、政府用數字證明不辜負人民期待、<br>\r\n媒體用數字告訴我們誰可能贏得選舉，以及經濟是否成長。<br>\r\n<br>\r\n由於數字能形塑他人對自己的觀感、左右我們的情緒，<br>\r\n於是政客、企業和媒體，開始試圖操弄人們所做的每一個決定，<br>\r\n更讓有心人士拿來成為製造懷疑與恐懼的最佳利器──<br>\r\n<br>\r\n．性學家金賽用偏頗數據定義了男女的性傾向<br>\r\n．菸草工業夥同科學家，用似是而非的數據混淆吸菸對致癌的影響<br>\r\n．智商高低分數，拿來成為美國政府推行種族絕育法案的理由<br>\r\n<br>\r\n數字、分數、排名、民意測驗和大數據，在每個人的生活中變得愈來愈重要。<br>\r\n然而就像美國諺語：「槍不會殺人，但拿槍的人會。」一樣，<br>\r\n數字不會撒謊，但使用數字的人會。<br>\r\n在這假新聞充斥、製造真相的時代，<br>\r\n即使你對數字無感，數字依然深刻影響你的人生。<br>\r\n數字讓人自以為擁有獨立思考，<br>\r\n但其實，我們比想像中更容易掉進用理性科學編織而成的思維陷阱。<br>\r\n<br>\r\n在本書中，經濟學家桑妮．布勞結合數學、經濟學和歷史，<br>\r\n用通俗又簡潔的說故事風格（而非數據），<br>\r\n帶領大家開啟一段關於數字偏見的探索旅程，<br>\r\n並試圖揭示如果對誇大又別有居心的數據照單全收，我們將會陷入何種危險境地。<br>', 5, 284, '新書'),
(26, '123', '/rs/elements/阿共打來怎麼辦︰你以為知道但實際一無所知的台海軍事常識.jpg', '阿共打來怎麼辦︰你以為知道但實際一無所知的台海軍事常識', '', '王立、沈伯洋', '', '大塊文化出版股份有限公司', '2021-12-28', '9789860777819', '繁體中文', 320, '阿共打來怎麼辦︰你以為知道但實際一無所知的台海軍事常識', '軍事謠言是造成台灣失敗主義的溫床\r\n<br><br>\r\n台灣大選之前，必會出現軍事謠言大量散布。<br>\r\n以往都是少部分的中國網民，配合台灣統派譏諷貶低台灣國軍，散播吹捧解放軍實力的農場文。但在二〇二〇年總統大選，此趨勢已擴張到一般民眾，透過LINE、Facebook等封閉群組的特性，中國加強資訊戰的力道，力求讓台灣民眾普遍相信，中國解放軍的實力不僅可以三兩下打敗台灣，更可以超英趕美，不出數年就可成為新霸權。也就是要台灣人早點認清現實，快快投降。\r\n<br><br>\r\n但仔細想一想，這類謠言的目的是什麼？<br>\r\n謠言是動搖對手民心的武器，是在沒有把握、無法有效直接進擊時，靠謠言來動搖對手的信心，創造打擊的有利條件，甚至想以恐嚇的方式讓台灣乖乖就範。因此，謠言所代表的是造謠的一方沒有必勝的把握，試圖透過謠言創造對其有利的情勢。<br>\r\n<br>\r\n建立基礎軍事常識，培養全民認知戰力\r\n<br><br>\r\n然而，這些謠言之所以能歷久不衰，代表的是台灣人對軍事常識的認知不足。更頭痛的是，政治上藍綠對抗的結果，讓雙方支持者對於理應客觀面對的軍事議題，採取政治立場優先的態度。錯誤的認知，在心戰的層面來說對台灣當然是不利的，更糟糕的是，會影響到我們對國防建軍需求的判斷，產生不切實際的看法。不管是認為解放軍無敵，台灣怎麼做都沒差，不如放棄軍備，還是反過來覺得台灣必勝，所以武器亂買也沒差，這兩種想法都會危害到國家安全。\r\n<br><br>\r\n要建立對台海狀況合理的判斷，就需要先釐清謠言。本書先針對近三十年來常見的軍事謠言加以解析、破除，讓讀者了解各種謠傳的攻台傳聞，若不是成功機率極低，就是需要天時地利人和的多方配合，絕非所向披靡的神兵利器。透過破除謠言來建立較完整的軍事觀念，認識解放軍為了提高勝算會使用的戰術，合理的範圍會到哪裡，以及台灣所擁有的防禦力量。接著再解釋中國想要侵略台灣會使用的方案，以及過程會面對什麼樣的挑戰。書中也討論在非軍事作戰外，中國一直在對台灣採取哪些沒有煙硝的侵略手段。', 5, 300, '新書'),
(27, '123', '/rs/elements/showThumbnail.jpg', '學以自用︰管他考試升學工作升遷，這次我只為自己而學！', 'Beginners:The Joy and Transformative Power of Lifelong Learning', '湯姆．范德比爾特', '劉嘉路', '親子天下（親子教養童書）', '2021-12-28', '9786263051577', '繁體中文', 368, '學以自用︰管他考試升學工作升遷，這次我只為自己而學！', '為什麼我們長大以後，就不再學習新事物？<br>\r\n是因為害怕失敗、忘記初學時的期待與快樂，<br>\r\n還是因為覺得自己不再年輕、學不會，所以沒有必要嘗試？<br>\r\n本書不是教你如何學會做某件事，而是告訴你為什麼要這麼做。<br>\r\n在任何年紀，只要願意改變，即便是成年的初學者，<br>\r\n也都能理解終身學習的喜悅和翻轉人生的力量！<br>', 3, 379, '二手書');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `book_name` text NOT NULL,
  `comment` text NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`id`, `member_id`, `book_name`, `comment`, `stars`) VALUES
(7, '234', '馬特萊斯特的奇幻旅程．上集：拉薩魔法師', '123', 1),
(8, '234', '情緒勒索：那些在伴侶、親子、職場間，最讓人窒息的相處', '111', 5),
(9, '234', '致富心態︰關於財富、貪婪與幸福的20堂理財課', '5555555555555', 3),
(10, '234', '致富心態︰關於財富、貪婪與幸福的20堂理財課', 'gfdgs', 1),
(11, '234', '致富心態︰關於財富、貪婪與幸福的20堂理財課', 'DFSFSDFSFS', 3),
(12, '234', '致富心態︰關於財富、貪婪與幸福的20堂理財課', '11111111111111', 4),
(13, '234', '原來，食物這樣煮才好吃！', '1111111111', 1),
(14, '234', '原來，食物這樣煮才好吃！', '1111', 1),
(15, '234', '原來，食物這樣煮才好吃！', '123456', 2),
(16, '234', '生活日語全集中圖解日語單字', '很實用的一本書', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `orderbuy`
--

CREATE TABLE `orderbuy` (
  `id` int(11) NOT NULL,
  `member_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `sellerid` text COLLATE utf8mb4_general_ci NOT NULL,
  `bookname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0運送中1完成訂單2評價完成'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orderbuy`
--

INSERT INTO `orderbuy` (`id`, `member_id`, `sellerid`, `bookname`, `price`, `quantity`, `status`) VALUES
(16, '234', '123', '馬特萊斯特的奇幻旅程．上集：拉薩魔法師', 450, 1, 2),
(18, '234', '123', '馬特萊斯特的奇幻旅程．上集：拉薩魔法師', 450, 1, 2),
(19, '234', '123', '情緒勒索：那些在伴侶、親子、職場間，最讓人窒息的相處', 190, 6, 2),
(20, '234', '123', '致富心態︰關於財富、貪婪與幸福的20堂理財課', 450, 5, 2),
(21, '234', '123', '原來，食物這樣煮才好吃！', 450, 7, 2),
(22, '234', '123', '原來，食物這樣煮才好吃！', 450, 8, 2),
(23, '234', '234', '生活日語全集中圖解日語單字', 299, 10, 2),
(24, '234', '10', '致富心態︰關於財富、貪婪與幸福的20堂理財課', 450, 1, 0),
(25, '234', '10', '馬特萊斯特的奇幻旅程．上集：拉薩魔法師', 450, 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_number` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1申請中2已通過'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `seller`
--

INSERT INTO `seller` (`id`, `name`, `type`, `id_number`, `status`) VALUES
(10, '管理者', '個人', 'A123456789', 2),
(11, '123', '公司', 'A222333444', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` int(1) NOT NULL COMMENT '1買家2賣家3管理者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `birthday`, `city`, `address`, `phone`, `pay`, `email`, `token`) VALUES
(10, '123', '123', '123', '0000-00-00', 'Keelung', '123', '123', '', '123', 3),
(11, '234', '234', '223344', '2021-11-02', 'Lianjiang', '23423477', 'pphone', 'store', '234@email.com', 2),
(15, '1027', '1022', '中文', '2010-03-03', 'Taitung', '中文', '09123456789', 'home', 'qwerrt1231564@gmail.com', 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orderbuy`
--
ALTER TABLE `orderbuy`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `accounting`
--
ALTER TABLE `accounting`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderbuy`
--
ALTER TABLE `orderbuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
