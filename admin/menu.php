<?php
$adminmenu = array();

$i                      = 1;
$adminmenu[$i]['title'] = _MI_TAD_ADMIN_HOME;
$adminmenu[$i]['link']  = 'admin/index.php';
$adminmenu[$i]['desc']  = _MI_TAD_ADMIN_HOME_DESC;
$adminmenu[$i]['icon']  = 'images/admin/home.png';

$i++;
$adminmenu[$i]['title'] = _MI_XXX_ADMENU1;
$adminmenu[$i]['link']  = "admin/main.php";
$adminmenu[$i]['desc']  = _MI_XXX_ADMENU1_DESC;
$adminmenu[$i]['icon']  = 'images/admin/button.png';

$i++;
$adminmenu[$i]['title'] = _MI_XXX_ADMENU3;
$adminmenu[$i]['link']  = "admin/main.php?op=unreview_article";
$adminmenu[$i]['desc']  = _MI_XXX_ADMENU3_DESC;
$adminmenu[$i]['icon']  = 'images/admin/button.png';

$i++;
$adminmenu[$i]['title'] = _MI_XXX_ADMENU2;
$adminmenu[$i]['link']  = "admin/main.php?op=review_all_article";
$adminmenu[$i]['desc']  = _MI_XXX_ADMENU2_DESC;
$adminmenu[$i]['icon']  = 'images/admin/button.png';

$i++;
$adminmenu[$i]['title'] = _MI_XXX_ADMENU4;
$adminmenu[$i]['link']  = "index.php?op=list_all_article";
$adminmenu[$i]['desc']  = _MI_XXX_ADMENU4_DESC;
$adminmenu[$i]['icon']  = 'images/admin/button.png';

$i++;
$adminmenu[$i]['title'] = _MI_TAD_ADMIN_ABOUT;
$adminmenu[$i]['link']  = 'admin/about.php';
$adminmenu[$i]['desc']  = _MI_TAD_ADMIN_ABOUT_DESC;
$adminmenu[$i]['icon']  = 'images/admin/about.png';
