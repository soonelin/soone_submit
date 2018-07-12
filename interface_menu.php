<?php

//判斷是否對該模組有管理權限
$isAdmin == false;
if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin   = $xoopsUser->isAdmin($module_id);
}

//工具列設定

//回模組首頁
$interface_menu['我要投稿'] = "post.php";
$interface_icon['我要投稿'] = "fa-pencil";

//列出文章
$interface_menu['入選文章'] = "index.php?op=list_article_confirm";
$interface_icon['入選文章']    = "fa-book ";

//列出本學期投稿
$interface_menu['統計列表'] = "statistics.php";
$interface_icon['統計列表']    = "fa-list-ol";


//模組後台
if ($isAdmin) {
    $interface_menu[_TAD_TO_ADMIN] = "admin/main.php";
    $interface_icon[_TAD_TO_ADMIN] = "fa-chevron-right";
}
