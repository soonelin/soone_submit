<?php

//列出投稿最多者
function list_sum_teacher($options)
{
    global $xoopsDB, $xoopsTpl;

    $tbl = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT * ,count(teacher) as  `sum_num` FROM `{$tbl}` WHERE `enable`='1' GROUP BY `teacher` ORDER BY `sum_num` DESC limit 10";

    $result = $xoopsDB->query($sql) or web_error($sql);

    while ($main = $xoopsDB->fetchArray($result)) {

        $mains[] = $main;
    }
    return $mains;
}

