<table>
<{foreach from=$block item=list_random}>
    <tr>
      <td>
          <a href="index.php?op=show_article&article_id=<{$list_random.article_id}>" >
            <{$list_random.action_date}>-<{$list_random.name}>-<{$list_random.title}>
          </a>
      </td>
    </tr>
<{/foreach}>
</table>