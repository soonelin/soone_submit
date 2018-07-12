<?php
//區塊主函數：列出所有文章
function list_total()
{
    global $xoopsDB;
    $tbl              = $xoopsDB->prefix('soone_submit');
    $sql              = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ";
    $result           = $xoopsDB->query($sql) or web_error($sql);
    $sum              = $xoopsDB->getRowsNum($result);
    return $sum;
}