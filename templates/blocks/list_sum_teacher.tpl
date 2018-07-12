<table style="border:2px; padding:5px;" rules="all" cellpadding="5" class="text-center">
    <tr class="text-center">
          <th class="text-center">名次</th>
          <th class="text-center">姓名</th>
          <th class="text-center">數量</th>
    </tr>
<{foreach from=$block item=list_new name=rank}>
    <tr>
      <td><{$smarty.foreach.rank.iteration}></td>
      <td><{$list_new.teacher}></td>
      <td><{$list_new.sum_num}></td>
    </tr>
<{/foreach}>
</table>
