<table class="table table-hover table-striped">
   <thead>
    <tr class="info">
        <th>年級</th>
        <th>班別</th>
        <th>數量</th>
    </tr>
    </thead>
<{foreach from=$block item=list_data}>
    <tr>
      <td><{$list_data.grade}></td>
      <td><{$list_data.class}></td>
      <td><{$list_data.grade_sum}></td>
    </tr>
<{/foreach}>
</table>
