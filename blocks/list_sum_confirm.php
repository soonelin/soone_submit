<?php

//列出投稿優選最多的學生
function list_sum_confirm($options)
{
    global $xoopsDB, $xoopsTpl;

    $tbl = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT name ,count(name) as  `sum_num` FROM `{$tbl}` WHERE `confirm`='1' GROUP BY `name` ORDER BY `sum_num` DESC limit 10";

    $result = $xoopsDB->query($sql) or web_error($sql);

    while ($main = $xoopsDB->fetchArray($result)) {

        $mains[] = $main;
    }
    return $mains;
}

