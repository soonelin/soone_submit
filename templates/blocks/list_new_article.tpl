<table>
<{foreach from=$block item=list_new}>
    <tr>
      <td>
          <a href="index.php?op=show_article&article_id=<{$list_new.article_id}>" >
            <{$list_new.action_date}>-<{$list_new.name}>-<{$list_new.title}>
          </a>
      </td>
    </tr>
<{/foreach}>
</table>