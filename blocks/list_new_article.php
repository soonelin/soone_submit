<?php
//區塊主函數：列出所報者
function list_new_article($options)
{
    global $xoopsDB, $xoopsTpl;

    $tbl = $xoopsDB->prefix('soone_submit');
    $sql = "SELECT left(`action_date`,10) as action_date,name,title,article_id FROM `{$tbl}` WHERE `enable`='1' ORDER BY RAND() limit 5";
    // $sql = "SELECT * FROM `{$tbl}` WHERE `enable`='1' ORDER BY RAND() limit 5";
    $result = $xoopsDB->query($sql) or web_error($sql);
    while ($main = $xoopsDB->fetchArray($result)) {

        $mains[] = $main;
    }
    return $mains;
}

