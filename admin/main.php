<?php
/*-----------引入檔案區--------------*/
$xoopsOption['template_main'] = "soone_submit_adm_main.tpl";
include_once "header.php";
include_once "../function.php";
/*-----------function區--------------*/

//判斷是否對該模組有管理權限
$isAdmin == false;
if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('uid');
    $isAdmin   = $xoopsUser->isAdmin($module_id);
}

//列出已審查過文章
function list_article()
{

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

    //列出尚未審核的文章變數$unConfirm
    $tbl            = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='0' ";
    $result = $xoopsDB->query($sql) or web_error($sql);
    $unreview_num = $xoopsDB->getRowsNum($result);
    $xoopsTpl->assign('unreview_num', $unreview_num);

    //列出已經入選的文章變數$Confirm_num
    $tbl            = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * FROM `{$tbl}` WHERE `confirm`='1' ";
    $result = $xoopsDB->query($sql) or web_error($sql);
    $confirm_num = $xoopsDB->getRowsNum($result);
    $xoopsTpl->assign('confirm_num', $confirm_num);

    $op="list_article";
    
    include_once XOOPS_ROOT_PATH . "/modules/tadtools/sweet_alert.php";
    $sweet_alert = new sweet_alert();
    $sweet_alert->render("del_article", "main.php?op=del_article&article_id=", 'article_id');

}

//列出未審查文章
function unreview_article(){

    global $xoopsDB, $xoopsTpl;
    
    $tbl            = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='0' ORDER BY `article_id` DESC ";

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

    //列出尚未審核的文章篇數變數$unreview_num
    $tbl            = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='0' ";
    $result = $xoopsDB->query($sql) or web_error($sql);
    $unreview_num = $xoopsDB->getRowsNum($result);
    $xoopsTpl->assign('unreview_num', $unreview_num);

    include_once XOOPS_ROOT_PATH . "/modules/tadtools/sweet_alert.php";
    $sweet_alert = new sweet_alert();
    $sweet_alert->render("del_article", "main.php?op=del_article&article_id=", 'article_id');

}

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

function del_article($article_id)
{
    global $xoopsDB, $xoopsTpl;

    $tbl     = $xoopsDB->prefix('soone_submit');
    $sql     = "DELETE FROM `{$tbl}` WHERE `article_id` = '{$article_id}'";
    $xoopsDB->queryF($sql) or web_error($sql);

}

//審查單篇文章
function review_article($article_id)
{
    global $xoopsDB;

    $sql = "UPDATE `" . $xoopsDB->prefix('soone_submit') . "` SET
    `enable`='1' WHERE `article_id` = '{$article_id}' ";
    $xoopsDB->queryF($sql) or web_error($sql);

}

//一鍵審查全文
function review_all_article()
{
    global $xoopsDB;

    $sql = "UPDATE `" . $xoopsDB->prefix('soone_submit') . "` SET `enable`='1' ";
    $xoopsDB->queryF($sql) or web_error($sql);
    
}
//審查是否刊登為入選
function confirm_article($article_id)
{
    global $xoopsDB;

    $sql = "UPDATE `" . $xoopsDB->prefix('soone_submit') . "` SET
    `confirm`='1' WHERE `article_id` = '{$article_id}' ";
    $xoopsDB->queryF($sql) or web_error($sql);

}
//審查是否刊登為入選
function unconfirm_article($article_id)
{
    global $xoopsDB;

    $sql = "UPDATE `" . $xoopsDB->prefix('soone_submit') . "` SET
    `confirm`='0' WHERE `article_id` = '{$article_id}' ";
    $xoopsDB->queryF($sql) or web_error($sql);

}

// 

/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op         = system_CleanVars($_REQUEST, 'op', '', 'string');
$article_id = system_CleanVars($_REQUEST, 'article_id', 0, 'int');

switch ($op) {

    case "show_article":
        show_article($article_id);
        // $op = "show_article";
        break;

    case "del_article":
        del_article($article_id);
        header("location:main.php?op=unreview_article");
        break;

    case "review_article":
        $op = "review_article";
        review_article($article_id);
        redirect_header("main.php", 5, "審查文章編號{$article_id}成功！");
        break;
    
    case "unreview_article":
        $op = "unreview_article";
        unreview_article();
        break;

    case "confirm_article":
        $op = "confirm_article";
        confirm_article($article_id);
        redirect_header("main.php", 5, "編號文章{$article_id}入選！");
        break;

    case "unconfirm_article":
        $op = "unconfirm_article";
        unconfirm_article($article_id);
        redirect_header("main.php", 5, "編號文章{$article_id}取消入選！");
        break;

    case "review_all_article":
        if (!empty($isAdmin) ){
            review_all_article();
            redirect_header("main.php", 5, "批次審查通過！");

        }else{

            redirect_header("main.php", 5, "非管理者無法使用！");
        }
        break;

    case "tufdl":
        include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
        $TadUpFiles = new TadUpFiles("soone_submit");
        $files_sn   = isset($_GET['files_sn']) ? intval($_GET['files_sn']) : "";
        $TadUpFiles->add_file_counter($files_sn);
        break;

    default:
        $op="list_article";    
        list_article();
        
        break;
}


/*-----------秀出結果區--------------*/
$xoopsTpl->assign('op', $op);
$xoopsTpl->assign('isAdmin', $isAdmin);
include_once 'footer.php';
