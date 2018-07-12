<?php
/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "soone_submit_index.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";
include_once XOOPS_ROOT_PATH . "/function.php";
/*-----------function區--------------*/

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

//看單篇文章
function show_article($article_id)
{

    global $xoopsDB, $xoopsTpl;
    $tbl     = $xoopsDB->prefix('soone_submit');
    $sql     = "SELECT * FROM `{$tbl}` WHERE `article_id`= '{$article_id}' ";
    $result  = $xoopsDB->query($sql) or web_error($sql);
    $content = $xoopsDB->fetchArray($result);
    //過濾讀出內容
    $myts               = MyTextSanitizer::getInstance();
    $content['title']   = $myts->htmlSpecialChars($content['title']);
    $content['name'] = $myts->htmlSpecialChars($content['name']);
    $content['content'] = $myts->displayTarea($content['content'], 1, 1, 1, 1, 0);

    //秀附件
    include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
    $TadUpFiles = new TadUpFiles("soone_submit");
    $TadUpFiles->set_col("article_id", $article_id);
    $content['show_files'] = $TadUpFiles->show_files('article_id', true, 'filename', false, false, null, null, false);
    $xoopsTpl->assign('content', $content);
}

//列出評審入選文章
function list_article_confirm(){

    global $xoopsDB, $xoopsTpl;

    $tbl            = $xoopsDB->prefix('soone_submit');

    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='1' AND `confirm`='1' ORDER BY `article_id` DESC ";
    
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

//列出隨機五篇文章
function list_article_random(){

    global $xoopsDB, $xoopsTpl;

    $tbl = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ORDER BY RAND() limit 10";
    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($main = $xoopsDB->fetchArray($result)) {

        $mains[] = $main;
    }

    $xoopsTpl->assign('list_random', $mains);

}

//列出所有文章
function list_all_article(){
    global $xoopsDB, $xoopsTpl;

    $tbl            = $xoopsDB->prefix('soone_submit');

    $sql = "SELECT * FROM `{$tbl}` ORDER BY `article_id` DESC ";
    //getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
    $PageBar = getPageBar($sql, 50, 10);
    $bar     = $PageBar['bar'];
    $sql     = $PageBar['sql'];
    $total   = $PageBar['total'];
    $xoopsTpl->assign('bar', $bar);
    $xoopsTpl->assign('total', $total);

    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($main = $xoopsDB->fetchArray($result)) {
        //過濾讀出內容
        $myts            = MyTextSanitizer::getInstance();
        $main['article_id'] = $myts->htmlSpecialChars($main['article_id']);
        $main['name'] = $myts->htmlSpecialChars($main['name']);
        $main['action_data'] = $myts->htmlSpecialChars($main['action_data']);
        $main['grade'] = $myts->htmlSpecialChars($main['grade']);
        $main['class'] = $myts->htmlSpecialChars($main['class']);
        $main['teacher'] = $myts->htmlSpecialChars($main['teacher']);
        $main['title']   = $myts->htmlSpecialChars($main['title']);
        $main['content2'] = $myts->displayTarea($main['content'], 1, 1, 1, 1, 0);
        $main['content'] = strip_tags($main['content2']);
        // $main['action_date'] = date("Y-m-d",$main['action_date']);
        $mains[] = $main;
    }
    $xoopsTpl->assign('content', $mains);


}

/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op         = system_CleanVars($_REQUEST, 'op', '', 'string');
$article_id = system_CleanVars($_REQUEST, 'article_id', 0, 'int');


    switch ($op) {

        case "show_article":
            show_article($article_id);
            break;

        case "list_article_confirm":
            list_article_confirm();
            list_article_random();
            break;

        case "list_all_article":
            list_all_article();
            break;

        case "tufdl":
            include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
            $TadUpFiles = new TadUpFiles("soone_submit");
            $files_sn   = isset($_GET['files_sn']) ? intval($_GET['files_sn']) : "";
            $TadUpFiles->add_file_counter($files_sn);
            break;

        default:
            list_article();
            list_article_random();
            $op="list_article";
            break;
    }


/*-----------秀出結果區--------------*/
$xoopsTpl->assign('op', $op);
$xoopsTpl->assign("toolbar", toolbar_bootstrap($interface_menu));
$xoopsTpl->assign('isAdmin', $isAdmin);
include_once XOOPS_ROOT_PATH . '/footer.php';
