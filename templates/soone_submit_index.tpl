<{if $op=="list_article" or $op=="list_article_confirm"}>
<div class="container-fluid"><h2>投稿總覽 <small>-目前共投稿了<{$total}>篇文章</small></h2>
  <table class="table table-hover table-bordered table-striped">
      <tr class="info" >
        <th class="text-center">評選</th>
        <th class="text-center">日期</th>
        <th class="text-center">姓名</th>
        <th class="text-center">年級</th>
        <th class="text-center">班級</th>
        <th class="text-center">標題</th>
        <th class="text-center">指導老師</th>
      </tr>
    <{foreach from=$content item=content}>
      <tr>
        <!-- 從判斷是否為優選文章 -->
          <td class="text-center">
            <{if $content.confirm=="1" }>
              <span class="label label-danger">優選</span>
            <{/if}>
          </td>
          <td>
            <{$content.action_date}>
          </td>
          <td class="text-center">
            <{$content.name}>
          </td>
          <td class="text-center">
            <{$content.grade}>
          </td>
          <td class="text-center">
            <{$content.class}>
          </td>
          <td>
            <a href="index.php?op=show_article&article_id=<{$content.article_id}>" ><{$content.title}></a>
          </td>
          <td class="text-center">
            <{$content.teacher}>
          </td>                     
      </tr>
    <{/foreach}>
  </table>
  <{$bar}>
</div>

<!-- 文章隨選 -->
<div class="container-fluid">
  <h2>文章隨選</h2>
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr class="success">
        <th>評選</th>
        <th>日期</th>
        <th>姓名</th>
        <th>年級</th>
        <th>班級</th>
        <th>標題</th>
        <th>指導老師</th>
      </tr>
    </thead>
    <{foreach from=$list_random item=list_random}>
      <tr>
        <td class="text-center">
          <{if $list_random.confirm=="1" }>
            <span class="label label-danger">優選</span>
          <{/if}>
        </td> 
        <td>
          <{$list_random.action_date}>
        </td>
        <td>
          <{$list_random.name}>
        </td>
        <td>
          <{$list_random.grade}>
        </td>
        <td>
          <{$list_random.class}>
        </td>
        <td>
          <a href="index.php?op=show_article&article_id=<{$list_random.article_id}>">
          <{$list_random.title}></a>
        </td>
        <td>
            <{$list_random.teacher}>
        </td>
      </tr>
      <{/foreach}>
  </table>
</div>

<{elseif $op=="show_article"}>
<div class="container-fluid"><h2>網路投稿活動</h2>
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

<{elseif $op=="list_all_article" }>
  <div class="container-fluid">
    <table class="table table-hover table-bordered table-striped">
      <tr class="info">
        <th class="text-center">ID</th>
        <th class="text-center">日期</th>
        <th class="text-center">姓名</th>
        <th class="text-center">年級</th>
        <th class="text-center">班級</th>
        <th class="text-center">標題</th>
        <th class="text-center">指導老師</th>
        <th class="text-center">內容</th>
      </tr>
      <{foreach from=$content item=content}>
        <tr>
          <!-- 從變數判斷是否入選 -->
          <td class="text-center">
            <{$content.article_id}>
          </td>
          <td>
            <{$content.action_date}>
          </td>
          <td class="text-center">
            <{$content.name}>
          </td>
          <td class="text-center">
            <{$content.grade}>
          </td>
          <td class="text-center">
            <{$content.class}>
          </td>
          <td>
            <{$content.title}>
          </td>
          <td class="text-center">
            <{$content.teacher}>
          </td>
          <td class="text-center">
            <{$content.content}>
          </td>
        </tr>
        <{/foreach}>
    </table>
    <{$bar}>
  </div>
<{/if}>

<!-- 發文主要表單 -->
<{$post_form}>
