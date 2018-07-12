<?php
//搜尋程式
function soone_submit_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	if(get_magic_quotes_gpc()){
		foreach($queryarray as $k=>$v){
			$arr[$k]=addslashes($v);
		}
		$queryarray=$arr;
	}
	$sql = "SELECT `article_id`,`name`,`title`,`action_date`,`teacher`FROM " . $xoopsDB->prefix("soone_submit"). " WHERE `enable`='1'";
	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((`title` LIKE '%{$queryarray[0]}%'  OR `content` LIKE '%{$queryarray[0]}%' OR `name` LIKE '%{$queryarray[0]}%' OR `teacher` LIKE '%{$queryarray[0]}%' )";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(`title` LIKE '%{$queryarray[0]}%'  OR `content` LIKE '%{$queryarray[0]}%' OR `name` LIKE '%{$queryarray[0]}%' OR `teacher` LIKE '%{$queryarray[0]}%' )";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY  `action_date` DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['rank'] = $i;
		$ret[$i]['image'] = "images/search.png";
		$ret[$i]['link'] = "index.php?op=show_article&article_id=" . $myrow['article_id'];
		$ret[$i]['title'] = $myrow['title'];
		$ret[$i]['name'] = $myrow['name'];
		$ret[$i]['teacher'] = $myrow['teacher'];
		$ret[$i]['time'] = strtotime($myrow['action_date']);
		// $ret[$i]['uid'] = $myrow['uid'];
		$i++;
	}
	return $ret;
}

?>
