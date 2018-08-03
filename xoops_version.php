<?php
$modversion = array();

//---模組基本資訊---//
$modversion['name']        = '網路投稿';
$modversion['version']     = 1.00;
$modversion['description'] = '學生網路投稿';
$modversion['author']      = '林順宜';
$modversion['credits']     = '相關有功人員';
$modversion['help']        = 'page=help';
$modversion['license']     = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image']       = 'images/logo.png';
$modversion['dirname']     = basename(dirname(__FILE__));

//---模組狀態資訊---//
$modversion['release_date']        = '2018/08/03';
$modversion['module_website_url']  = 'http://submit.raes.tn.edu.tw/index.php';
$modversion['module_website_name'] = '網路投稿';
$modversion['module_status']       = 'release';
$modversion['author_website_url']  = 'http://作者網站網址';
$modversion['author_website_name'] = '作者網站名稱';
$modversion['min_php']             = 5.2;
$modversion['min_xoops']           = '2.5';
$modversion['min_tadtools']        = '1.20';

//---paypal資訊---//
$modversion['paypal']                  = array();
$modversion['paypal']['business']      = '作者@的Email';
$modversion['paypal']['item_name']     = 'Donation : ' . '贊助對象名稱';
$modversion['paypal']['amount']        = 0;
$modversion['paypal']['currency_code'] = 'USD';

//---後台使用系統選單---//
$modversion['system_menu'] = 1;

//---模組資料表架構---//
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][0]        = 'soone_submit';
$modversion['tables'][1]        = 'soone_submit_files_center';

//---後台管理介面設定---//
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu']  = 'admin/menu.php';

//---前台主選單設定---//
$modversion['hasMain']        = 1;
$modversion['sub'][1]['name'] = '首頁';
$modversion['sub'][1]['url']  = 'index.php';

//---模組自動功能---//
// $modversion['onInstall'] = "include/install.php";
// $modversion['onUpdate'] = "include/update.php";
// $modversion['onUninstall'] = "include/onUninstall.php";

//---樣板設定---//
$modversion['templates']                    = array();
$i                                          = 0;
$modversion['templates'][$i]['file']        = 'soone_submit_adm_main.tpl';
$modversion['templates'][$i]['description'] = 'soone_submit_adm_main.tpl';

$i++;
$modversion['templates'][$i]['file']        = 'soone_submit_index.tpl';
$modversion['templates'][$i]['description'] = 'soone_submit_index.tpl';

$i++;
$modversion['templates'][$i]['file']        = 'soone_submit_index_statistics.tpl';
$modversion['templates'][$i]['description'] = 'soone_submit_index_statistics.tpl';

$i++;
$modversion['templates'][$i]['file']        = 'soone_submit_index_month.tpl';
$modversion['templates'][$i]['description'] = 'soone_submit_index_month.tpl';


//---偏好設定---//

$modversion['config']                    = array();

//預設年級grade_edit偏好設定
$i                                       =  1;
$modversion['config'][$i]['name']        = 'grade_set';
$modversion['config'][$i]['title']       = '_MI_SOONE_SUBMIT_GRADE_EDIT_TITLE';
$modversion['config'][$i]['description'] = '_MI_SOONE_SUBMIT_GRADE_EDIT_DESC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']    = '6';

//預設班級class_edit偏好設定
$i++;
$modversion['config'][$i]['name']        = 'class_set';
$modversion['config'][$i]['title']       = '_MI_SOONE_SUBMIT_CLASS_EDIT_TITLE';
$modversion['config'][$i]['description'] = '_MI_SOONE_SUBMIT_CLASS_EDIT_DESC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']    = '5';

//投稿打開予關閉偏好設定
$i++;
$modversion['config'][$i]['name']        = 'StartUp';
$modversion['config'][$i]['title']       = '_MI_SOONE_SUBMIT_STARTUP_TITLE';
$modversion['config'][$i]['description'] = '_MI_SOONE_SUBMIT_STARTUP_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']    = '0';


//---搜尋---//
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = "include/search.php";
$modversion['search']['func'] = "soone_submit_search";

//---區塊設定---//
$modversion['blocks']                    = array();
//列出隨機文章
$i                                       = 1;
$modversion['blocks'][$i]['file']        = "list_random_article.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_RANDOM_ARTIC_LELIST;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_RANDOM_ARTIC_LELIST_DESC;
$modversion['blocks'][$i]['show_func']   = "list_random_article";
$modversion['blocks'][$i]['template']    = "list_random_article.tpl";
// $modversion['blocks'][$i]['edit_func'] = "list_new_article_edit";
// $modversion['blocks'][$i]['options'] = "1|1";
//列出投稿排名
$i++;
$modversion['blocks'][$i]['file']        = "list_sum_editor.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_SUM_EDITOR_LIST;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_SUM_EDITOR_LIST_DESC;
$modversion['blocks'][$i]['show_func']   = "list_sum_editor";
$modversion['blocks'][$i]['template']    = "list_sum_editor.tpl";
// $modversion['blocks'][$i]['edit_func'] = "list_sum_editor_edit";
// $modversion['blocks'][$i]['options'] = "1|1";
//列出教師排名
$i++;
$modversion['blocks'][$i]['file']        = "list_sum_teacher.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_SUM_TEACHER_LIST;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_SUM_TEACHER_LIST_DESC;
$modversion['blocks'][$i]['show_func']   = "list_sum_teacher";
$modversion['blocks'][$i]['template']    = "list_sum_teacher.tpl";
// $modversion['blocks'][$i]['edit_func'] = "list_sum_teacher";
// $modversion['blocks'][$i]['options'] = "1|1";
//列出投稿總數
$i++;
$modversion['blocks'][$i]['file']        = "list_total.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_TOTAL;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_TOTAL_DESC;
$modversion['blocks'][$i]['show_func']   = "list_total";
$modversion['blocks'][$i]['template']    = "list_total.tpl";
/*$modversion['blocks'][$i]['edit_func'] = "list_article_edit";
$modversion['blocks'][$i]['options'] = "1|1";*/
//列出投稿尚未審查總數
$i++;
$modversion['blocks'][$i]['file']        = "list_unreview.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_UNREVIEW_TOTAL;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_UNREVIEW_TOTAL_DESC;
$modversion['blocks'][$i]['show_func']   = "list_unreview";
$modversion['blocks'][$i]['template']    = "list_unreview.tpl";
/*$modversion['blocks'][$i]['edit_func'] = "list_article_edit";
$modversion['blocks'][$i]['options'] = "1|1";*/
//列出年級投稿總數
$i++;
$modversion['blocks'][$i]['file']        = "list_grade_sum.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_GRADE_SUM;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_GRADE_SUM_DESC;
$modversion['blocks'][$i]['show_func']   = "list_grade_sum";
$modversion['blocks'][$i]['template']    = "list_grade_sum.tpl";
/*$modversion['blocks'][$i]['edit_func'] = "list_article_edit";
$modversion['blocks'][$i]['options'] = "1|1";*/
//列出最多文章入選學生前十名
$i++;
$modversion['blocks'][$i]['file']        = "list_sum_confirm.php";
$modversion['blocks'][$i]['name']        = _MI_SOONE_SUBMIT_CONFIRM_SUM;
$modversion['blocks'][$i]['description'] = _MI_SOONE_SUBMIT_CONFIRM_SUM_DESC;
$modversion['blocks'][$i]['show_func']   = "list_sum_confirm";
$modversion['blocks'][$i]['template']    = "list_sum_confirm.tpl";
/*$modversion['blocks'][$i]['edit_func'] = "list_article_edit";
$modversion['blocks'][$i]['options'] = "1|1";*/

//---評論---//
//$modversion['hasComments'] = 1;
//$modversion['comments']['pageName'] = '單一頁面.php';
//$modversion['comments']['itemName'] = '主編號';

//---通知---//
//$modversion['hasNotification'] = 1;
