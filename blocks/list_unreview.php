<?php
//列出全部尚未審查文章
function list_unreview()
{
    global $xoopsDB;
    $tbl              = $xoopsDB->prefix('soone_submit');
    $sql              = "SELECT * FROM `{$tbl}` WHERE `enable`='0' ";
    $result           = $xoopsDB->query($sql) or web_error($sql);
    $sum              = $xoopsDB->getRowsNum($result);
    return $sum;
}