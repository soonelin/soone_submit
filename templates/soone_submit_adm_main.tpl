<{if $op=="list_article"}>
<div class="container"><h2>投稿總數：<{$total}>、入選總數：<{$confirm_num}>、尚未審查：<{$unreview_num}> </h2>
<table class="table table-bordered table-striped">
    <tr class="info">
      <th>編號</th>
      <th>審查</th>
      <th>日期</th>
      <th>姓名</th>
      <th>年級</th>
      <th>班級</th>
      <th>標題</th>
      <th>指導老師</th>
      <th>管理功能</th>
    </tr>
<{foreach from=$content item=content}>
    <tr>
      <td><{$content.article_id}></td>
      <td><{if $content.confirm=="1" }>入選<{/if}></td>
      <td><{$content.action_date}></td>
      <td><{$content.name}></td>
      <td><{$content.grade}></td>
      <td><{$content.class}></td>
      <td>
        <a href="main.php?op=show_article&article_id=<{$content.article_id}>" ><{$content.title}></a>
      </td>
      <td><{$content.teacher}></td>
      <td>
          <a href="../post.php?article_id=<{$content.article_id}>" class="btn btn-primary btn-xs">修改</a>
          <a href="./main.php?op=review_article&article_id=<{$content.article_id}>" class="btn btn-warning btn-xs">審查</a>
        <!-- 若是管理者才予以開通刪除與入選管理功能-->
        <{if $xoops_isadmin}>
          <a href="javascript:del_article(<{$content.article_id}>)" class="btn btn-danger btn-xs">刪除</a>
          <a href="./main.php?op=confirm_article&article_id=<{$content.article_id}>" class="btn btn-info btn-xs">入選</a>
          <a href="./main.php?op=unconfirm_article&article_id=<{$content.article_id}>" class="btn btn-success btn-xs">取消入選</a>
        <{/if}>
      </td>
    </tr>
<{/foreach}>
</table>

<{elseif $op=="unreview_article"}>
<div class="container"><h2>投稿總數：<{$total}> 尚未審查：<{$unreview_num}> </h2>
<table class="table table-bordered table-striped">
    <tr class="info">
      <th>編號</th>
      <th>審查</th>
      <th>日期</th>
      <th>姓名</th>
      <th>年級</th>
      <th>班級</th>
      <th>標題</th>
      <th>指導老師</th>
      <th>管理功能</th>
    </tr>
  <{foreach from=$content item=content}>
    <tr>
      <td><{$content.article_id}></td>
      <td><{if $content.confirm=="1" }>入選<{/if}></td>
      <td><{$content.action_date}></td>
      <td><{$content.name}></td>
      <td><{$content.grade}></td>
      <td><{$content.class}></td>
      <td>
	  <a href="main.php?op=show_article&article_id=<{$content.article_id}>" ><{$content.title}></a>
      </td>
      <td>
 	  <{$content.teacher}>
      </td>
      <td>
          <a href="javascript:del_article(<{$content.article_id}>)" class="btn btn-danger btn-xs">刪除</a>
          <a href="../post.php?article_id=<{$content.article_id}>" class="btn btn-primary btn-xs">修改</a>
          <a href="./main.php?op=review_article&article_id=<{$content.article_id}>" class="btn btn-warning btn-xs">審查</a>
      </td>
    </tr>
  <{/foreach}>
</table>

<{elseif $op=="show_article"}>
<div class="container"><h2>網路投稿活動</h2>
  <div class="panel panel-primary">
      <div class="panel-heading">  投稿題目：<{$content.title}> </div>
      <div class="panel-body">
          姓名：<{$content.name}><br>
          年級：<{$content.grade}><br>
          班級：<{$content.class}><br>
          指導老師：<{$content.teacher}><br>
          內容：<{$content.content}><br>
          檔案：<{$content.show_files}>
    </div>
    <div class="panel-footer text-center">
          <input type ="button" onclick="history.back()" value="回投稿列表"></input>
    </div>
  </div>
  </div>
 <{else }>
   <{$post_form}>
 <{/if}>
 <{$bar}>
