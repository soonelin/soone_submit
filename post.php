<?php
/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "soone_submit_index.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";
include_once XOOPS_ROOT_PATH . "/function.php";

/*-----------function區--------------*/

//預設投稿表單
function post_form($article_id){
    global $xoopsTpl, $xoopsDB, $xoopsUser, $action_date, $xoopsModuleConfig, $form_passwd, $class_set, $grade_set;

    if ($article_id){
        $tbl = $xoopsDB->prefix('soone_submit');
        $sql = "SELECT * FROM `{$tbl}` WHERE `article_id` = '{$article_id}'";
        $result = $xoopsDB->query($sql) or web_error($sql);
        $val = $xoopsDB->fetchArray($result);
        $op = "edit_article";

    }else{
        $val['name']="";
        $val['grade']="";
        $val['class']="";
        $val['teacher']="";
        $val['title']="";
        $val['content']="";
        $op = "insert_article";
    }


    include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
    $form = new XoopsThemeForm('網路投稿活動', 'name', 'post.php', 'post', false);
    
    //投稿日期，加上時間，改成唯讀
    $form_date = new XoopsFormText('投稿日期', 'action_date', 40, 255, date('Y-m-d H:i:s')) ; 
    $form_date->setExtra('readonly="readonly"');
    $form->addElement($form_date, true);

    //投稿姓名
    $text = new XoopsFormText('投稿姓名', 'name', 40, 255, $val['name']);
    $text->setExtra("placeholder='請輸入姓名'");
    $form->addElement($text, true);

    $grade = new XoopsFormSelect('選擇年級', 'grade', $val['grade']);
    $grade->setExtra("placeholder='請輸入年級'");
    $grade->addOption('','', true);

    //新增偏好設定年級
    $grade_set = $xoopsModuleConfig['grade_set'];
    for ($i=1;$i<=$grade_set;$i++){
        $grade->addOption("{$i}", "{$i}", true);
    }
    $form->addElement($grade, true);

    $class = new XoopsFormSelect('選擇班級', 'class', $val['class']);
    $class->setExtra("placeholder='請輸入班級'");
    $class->addOption('','', true);

    //新增偏好設定班級
    $class_set = $xoopsModuleConfig['class_set'];
    for ($j=1;$j<=$class_set;$j++){
        $class->addOption("{$j}", "{$j}", true);
    }
    $form->addElement($class, true);

    //指導老師
    $text = new XoopsFormText('指導老師', 'teacher', 40, 255, $val['teacher']);
    $text->setExtra("placeholder='請輸入指導老師'");
    $form->addElement($text, true);

    //投稿題目
    $text = new XoopsFormText('投稿主題', 'title', 40, 255, $val['title']);
    $text->setExtra("placeholder='請輸入投稿主題'");
    $form->addElement($text, true);

    //大量文字標籤以及文字輸入框
    include_once XOOPS_ROOT_PATH . "/modules/tadtools/ck.php";
    $ck = new CKEditor('投稿內容', 'content', $val['content']);
    $ck->setHeight(350);
    $editor = $ck->render();
    $form->addElement(new XoopsFormLabel('投稿內容', $editor), true);

    //隱藏的參數op article_id
    $Tray = new XoopsFormElementTray('', '&nbsp;', 'name');
    $form->addElement(new XoopsFormHidden('op', $op));
    $form->addElement(new XoopsFormHidden('article_id', $article_id));
    $form->addElement(new XoopsFormHiddenToken());

    //上傳附件
    $form->setExtra('enctype="multipart/form-data"');
    include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
    $TadUpFiles = new TadUpFiles("soone_submit");
    $TadUpFiles->set_col("article_id", $article_id);
    $article_id_form = $TadUpFiles->upform(false, "article_id", "");
    $form->addElement(new XoopsFormLabel('上傳圖片', $article_id_form), false);

    //設定投稿密碼欄位
    // $text = new XoopsFormText('投稿密碼', 'form_passwd', 40, 255, '');
    // $text->setExtra("placeholder='請輸入投稿密碼'");
    // $form->addElement($text, true);

    //輸入驗證碼表單
    // $form->addElement(new XoopsFormCaptcha ('請輸入驗證碼', 'xoopscaptcha', false));
    $Tray->addElement(new XoopsFormButton('', 'send', '送出', 'submit'));
    $Tray->addElement(new XoopsFormButton('', 'send', '清除', 'reset'));
    $form->addElement($Tray);
    $post_form = $form->render();
    $xoopsTpl->assign('post_form', $post_form);

}

//修改文章
function edit_article($article_id)
{
    global $xoopsDB;

    $name      = clean_var('name', '學生姓名');
    $grade     = clean_var('grade', '學生年級');
    $class     = clean_var('class', '學生班級');
    $teacher   = clean_var('teacher', '指導老師');
    $title       = clean_var('title', '文章標題');
    $content     = clean_var('content', '文章內容');
    $action_date = clean_var('action_date', '文章時間');
    $article_id      = clean_var('article_id', '文章編號');

    $sql = "UPDATE `" . $xoopsDB->prefix('soone_submit') . "` SET
    `name`='{$name}',
    `grade`='{$grade}',
    `class`='{$class}',
    `teacher`='{$teacher}',
    `title`='{$title}', 
    `content`='{$content}', 
    `action_date`='{$action_date}'
    WHERE `article_id` = '{$article_id}' ";

    //資料庫新增文章之前進行驗證碼檢查
    // xoops_load('captcha');
    // $xoopsCaptcha = XoopsCaptcha::getInstance();
    // $xoopsCaptcha->setConfig('skipmember' , false);
    // if(!$xoopsCaptcha->verify()) {
    //     redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    // }
    
    $xoopsDB->queryF($sql) or web_error($sql);
    
    //插入附件
    include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
    $TadUpFiles = new TadUpFiles("soone_submit");
    $TadUpFiles->set_col("article_id", $article_id);
    $TadUpFiles->upload_file('article_id', '', '', '', '', true, false);
    return $article_id;
}

//新增文章
function insert_article()
{
    global $xoopsDB;
    
    //表單驗證檢查
    if(!$GLOBALS['xoopsSecurity']->check()){
        $error=implode("<br />" , $GLOBALS['xoopsSecurity']->getErrors());
        redirect_header($_SERVER['PHP_SELF'],3, $error);
        exit;
    }

    $name      = clean_var('name', '學生姓名');
    $grade     = clean_var('grade', '學生年級');
    $class     = clean_var('class', '學生班級');
    $teacher   = clean_var('teacher', '指導老師');
    $title       = clean_var('title', '文章標題');
    $content     = clean_var('content', '文章內容');
    $action_date = clean_var('action_date', '文章時間');

    $sql = "INSERT INTO `" . $xoopsDB->prefix('soone_submit') . "`
        ( `name`, `grade`, `class`, `teacher`, `title`, `content`, `action_date`, `enable`) VALUES
        ('{$name}','{$grade}', '{$class}','{$teacher}','{$title}', '{$content}', now(), '0' )";

    //資料庫新增文章之前進行驗證碼檢查
    // include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
    // xoops_load('captcha');
    // $xoopsCaptcha = XoopsCaptcha::getInstance();
    // $xoopsCaptcha->setConfig('skipmember' , false);
    // if(!$xoopsCaptcha->verify()) {
    //     redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    // }

    $xoopsDB->queryF($sql) or web_error($sql);
    $article_id = $xoopsDB->getInsertId();

    //插入附件
    include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
    $TadUpFiles = new TadUpFiles("soone_submit");
    $TadUpFiles->set_col("article_id", $article_id);
    $TadUpFiles->upload_file('article_id', '', '', '', '', true, false);
    return $article_id;
}

/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op         = system_CleanVars($_REQUEST, 'op', '', 'string');
$article_id = system_CleanVars($_REQUEST, 'article_id', 0, 'int');


switch ($op) {

    // case "insert_article":

    //     //檢查發布密碼是否與系統設定正確
    //     if ($_POST['form_passwd'] == $xoopsModuleConfig['form_passwd']) {
    //         $article_id = insert_article();
    //         //redirect_header("index.php?op=show_article&article_id={$article_id}", 5, "發佈成功！");
    //         redirect_header("index.php", 5, "發佈成功！等待管理者審核");
    //     } else {
    //         redirect_header("index.php", 5, "發佈失敗！密碼有錯誤!");
    //     }
    //     exit;
    case "insert_article":
        $article_id = insert_article();
        redirect_header("index.php", 5, "發佈成功！等待管理者審核");
        exit;

    case "edit_article":
        edit_article();
        redirect_header("index.php?op=show_article&article_id={$article_id}", 5, "文章編號{$article_id}修改成功!");
        // header("location: index.php?op=show_article&article_id={$article_id}");
        exit;

    case "tufdl":
        include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";
        $TadUpFiles = new TadUpFiles("soone_submit");
        $files_sn   = isset($_GET['files_sn']) ? intval($_GET['files_sn']) : "";
        $TadUpFiles->add_file_counter($files_sn);
        break;

    default:
        //設定投稿啟動與關閉，預設關閉0
        if ($xoopsModuleConfig['StartUp']==1){
            post_form($article_id);
            
        }else{
            redirect_header("index.php", 5, "投稿截止！");
        }
        break;
}


/*-----------秀出結果區--------------*/
$xoopsTpl->assign('op', $op);
$xoopsTpl->assign("toolbar", toolbar_bootstrap($interface_menu));
$xoopsTpl->assign('isAdmin', $isAdmin);
include_once XOOPS_ROOT_PATH . '/footer.php';
