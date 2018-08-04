<?php
//列出各年段班別所有文章
function list_grade_sum(){

    global $xoopsDB;

    $tbl = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT `grade`,`class`,`enable`,count(*) as 'grade_sum' FROM `{$tbl}` WHERE `enable`='1' GROUP BY `grade`,`class` ";

    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($val = $xoopsDB->fetchArray($result)) {
        $main[] = $val;
    }
    return $main;
}