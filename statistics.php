<?php
/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "soone_submit_index_statistics.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";
// include_once XOOPS_ROOT_PATH . "/function.php";
/*-----------function區--------------*/

//列出各年段班別入選文章統計
function show_grade_enable_stastic()
{

    global $xoopsDB, $xoopsTpl;
    $tbl = $xoopsDB->prefix('soone_submit');

    //判斷上下學期
    //月份從07至隔年02月是上學期
    if (date('m')>=7 and date('m')<=12){
        $Year  = date('Y') ;

        $this_year_0701 =  date("Y-m-d",mktime(0, 0, 0, 7, 1, $Year));
        $next_year_0215 =  date("Y-m-d",mktime(0, 0, 0, 2, 15, $Year+1));

        
        //grade_sum統計各年級的數量變數
        $sql = "SELECT `grade`,`class`,`teacher`,`enable`,count(*) as 'grade_sum' FROM `{$tbl}` WHERE `enable`='1' AND `action_date` 
        BETWEEN '{$this_year_0701}' AND '{$next_year_0215}' GROUP BY `grade`,`class` ORDER BY `grade`,`class` ";

        //各年段班別投稿文章統計數量
        $sql2 = "SELECT `name` FROM `{$tbl}` WHERE `enable`='1' AND `action_date` BETWEEN '{$this_year_0701}' AND '{$next_year_0215}' ";

        //輸出呈現目前的日期
        $con_date1 = $this_year_0701;
        $con_date2 = $next_year_0215;
        $period = "上學期";

    }elseif(date('m')>=1 AND date('m')<=2){
        $Year  = date('Y') ;
 
        $this_year_0701 =  date("Y-m-d",mktime(0, 0, 0, 7, 1, $Year-1));
        $next_year_0215 =  date("Y-m-d",mktime(0, 0, 0, 2, 15, $Year));

        
        //grade_sum統計各年級的數量變數
        $sql = "SELECT `grade`,`class`,`teacher`,`enable`,count(*) as 'grade_sum' FROM `{$tbl}` WHERE `enable`='1' AND `action_date` 
        BETWEEN '{$this_year_0701}' AND '{$next_year_0215}' GROUP BY `grade`,`class` ORDER BY `grade`,`class` ";

        //各年段班別投稿文章統計數量
        $sql2 = "SELECT `name` FROM `{$tbl}` WHERE `enable`='1' AND `action_date` BETWEEN '{$this_year_0701}' AND '{$next_year_0215}' ";

        //輸出呈現目前的日期
        $con_date1 = $this_year_0701;
        $con_date2 = $next_year_0215;
        $period = "上學期";
        
    //月份從03至08月是下學期
    }elseif(date('m')>=3 and date('m')<=6){
        $Year  = date('Y') ;

        $next_year_0301 =  date("Y-m-d",mktime(0, 0, 0, 3, 1, $Year));
        $next_year_0630 =  date("Y-m-d",mktime(0, 0, 0, 6, 30, $Year));
        
        $sql = "SELECT `grade`,`class`,`teacher`,`enable`,count(*) as 'grade_sum' FROM `{$tbl}` WHERE `enable`='1' AND `action_date` 
        BETWEEN '{$next_year_0301}' AND '{$next_year_0630}' GROUP BY `grade`,`class` ORDER BY `grade`,`class`";
        
        //各年段班別入選文章統計數量
        $sql2 = "SELECT `name` FROM `{$tbl}` WHERE `enable`='1' AND `action_date` 
        BETWEEN '{$next_year_0301}' AND '{$next_year_0630}' ";
        //輸出呈現目前的日期
        $con_date1 = $next_year_0301;
        $con_date2 = $next_year_0630;
        $period = "下學期";
    }

    $today_stamp = strtotime(date('Y-m-d'));

    //各年級投稿文章統計陣列
    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($val = $xoopsDB->fetchArray($result)) {
        $main[] = $val;
    }

    //各年級投稿文章統計數量
    $result   = $xoopsDB->query($sql2) or web_error($sq12);
    $grade_enable_num = $xoopsDB->getRowsNum($result);
    $xoopsTpl->assign('show_grade_enable_num', $grade_enable_num);    

    $xoopsTpl->assign('show_grade_enable_stastic', $main);
    $xoopsTpl->assign('Year', $Year-1911);
    $xoopsTpl->assign('period', $period);
    $xoopsTpl->assign('con_date1', $con_date1);
    $xoopsTpl->assign('con_date2', $con_date2);
}

//列出各年段班別入選文章統計
function show_grade_confirm_stastic()
{
    global $xoopsDB, $xoopsTpl;
    $tbl = $xoopsDB->prefix('soone_submit');

    //判斷上下學期
    //月份從09至隔年02月是上學期
    if (date('m')>=9 OR date('m')<=2){
        $Year  = date('Y') ;

        $this_year_0701 =  date("Y-m-d",mktime(0, 0, 0, 8, 1, $Year-1));
        $next_year_0215 =  date("Y-m-d",mktime(0, 0, 0, 2, 15, $Year));

        
        //grade_sum統計各年級的數量變數
        $sql = "SELECT `grade`,`class`,`teacher`,`confirm`,count(*) as 'grade_sum' FROM `{$tbl}` WHERE `confirm`='1' AND `action_date` 
        BETWEEN '{$this_year_0701}' AND '{$next_year_0215}' GROUP BY `grade`,`class` ORDER BY `grade`,`class` ";

        //各年段班別投稿文章統計數量
        $sql2 = "SELECT `name` FROM `{$tbl}` WHERE `confirm`='1' AND `action_date` BETWEEN '{$this_year_0701}' AND '{$next_year_0215}' ";

        //輸出呈現目前的日期
        $con_date1 = $this_year_0701;
        $con_date2 = $next_year_0215;
        $period = "上學期";

    //月份從03至08月是下學期
    }elseif(date('m')>=3 AND date('m')<=8){
        $Year  = date('Y') ;
        $next_year_0301 =  date("Y-m-d",mktime(0, 0, 0, 3, 1, $Year));
        $next_year_0630 =  date("Y-m-d",mktime(0, 0, 0, 7, 31, $Year));
        
        $sql = "SELECT `grade`,`class`,`teacher`,`confirm`,count(*) as 'grade_sum' FROM `{$tbl}` WHERE `confirm`='1' AND `action_date` 
        BETWEEN '{$next_year_0301}' AND '{$next_year_0630}' GROUP BY `grade`,`class` ORDER BY `grade`,`class`";
        
        //各年段班別入選文章統計數量
        $sql2 = "SELECT `name` FROM `{$tbl}` WHERE `confirm`='1' AND `action_date` 
        BETWEEN '{$next_year_0301}' AND '{$next_year_0630}' ";
        //輸出呈現目前的日期
        $con_date1 = $next_year_0301;
        $con_date2 = $next_year_0630;
        $period = "下學期";
    }

    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($val = $xoopsDB->fetchArray($result)) {
        $main[] = $val;
    }

    //各年級入選文章統計
    $result   = $xoopsDB->query($sql2) or web_error($sql2);
    $grade_confirm_num = $xoopsDB->getRowsNum($result);
    $xoopsTpl->assign('show_grade_confirm_num', $grade_confirm_num);

    $xoopsTpl->assign('show_grade_confirm_stastic', $main);
    $xoopsTpl->assign('Year', $Year-1911);
    $xoopsTpl->assign('period', $period);
    $xoopsTpl->assign('con_date1', $con_date1);
    $xoopsTpl->assign('con_date2', $con_date2);
}


//列出前五篇最新文章
function list_article_random(){

    global $xoopsDB, $xoopsTpl;

    $tbl = $xoopsDB->prefix('soone_submit');
    // $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ORDER BY `article_id` DESC LIMIT 5";
    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ORDER BY RAND() limit 10";
    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($main = $xoopsDB->fetchArray($result)) {

        $mains[] = $main;
    }

    $xoopsTpl->assign('list_random', $mains);

}

//列出後臺審核完所有文章
function list_article(){

    global $xoopsDB, $xoopsTpl;
    $tbl            = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ORDER BY `article_id` DESC ";
    //getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
    $PageBar = getPageBar($sql, 10, 10);
    $bar     = $PageBar['bar'];
    $sql     = $PageBar['sql'];
    $total   = $PageBar['total'];
    $xoopsTpl->assign('bar', $bar);
    $xoopsTpl->assign('total', $total);
   
    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($main = $xoopsDB->fetchArray($result)) {
        //過濾讀出內容
        $myts            = MyTextSanitizer::getInstance();
        $main['name'] = $myts->htmlSpecialChars($main['name']);
        $main['grade'] = $myts->htmlSpecialChars($main['grade']);
        $main['class'] = $myts->htmlSpecialChars($main['class']);
        $main['teacher'] = $myts->htmlSpecialChars($main['teacher']);
        $main['title']   = $myts->htmlSpecialChars($main['title']);
        $main['content'] = $myts->displayTarea($main['content'], 1, 1, 1, 1, 0);

        // $main['action_date'] = date("Y-m-d",$main['action_date']);
        $mains[] = $main;
    }
    $xoopsTpl->assign('content', $mains);

}

/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op         = system_CleanVars($_REQUEST, 'op', '', 'string');
$start_date         = system_CleanVars($_REQUEST, 'start_date', '', 'string');
$end_date         = system_CleanVars($_REQUEST, 'end_date', '', 'string');

switch ($op) {

    case "filter_article":
        filter_article();

        break;

    default:
        // filter_form();
        show_grade_enable_stastic();
        show_grade_confirm_stastic();
        list_article_random();

        break;
}

/*-----------秀出結果區--------------*/
$xoopsTpl->assign('op', $op);
$xoopsTpl->assign("toolbar", toolbar_bootstrap($interface_menu));
// $xoopsTpl->assign('isAdmin', $isAdmin);
include_once XOOPS_ROOT_PATH . '/footer.php';
