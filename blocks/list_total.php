<?php
//列出全部審查完文章
function list_total()
{
    global $xoopsDB;
    $tbl              = $xoopsDB->prefix('soone_submit');
    $sql              = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ";
    $result           = $xoopsDB->query($sql) or web_error($sql);
    $sum              = $xoopsDB->getRowsNum($result);
    return $sum;
}