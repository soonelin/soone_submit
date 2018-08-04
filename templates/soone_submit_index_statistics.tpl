<!-- 投稿文章統計 -->
<div class="container-fluid">
    <h3>
        <{$Year}>年(<{$period}>)各年級投稿文章統計<small>-投稿自今共累積<{$show_grade_enable_num}>篇文章
            (<{$con_date1}>~<{$con_date2}>)</small>
    </h3>
    <table class="table table-hover table-striped">
        <tr class="warning">
            <th>年級</th>
            <th>班別</th>
            <th>指導老師</th>
            <th>數量</th>
        </tr>
        <{foreach from=$show_grade_enable_stastic item=show_grade_enable_stastic}>
            <tr>
                <td><{$show_grade_enable_stastic.grade}>年</td>
                <td><{$show_grade_enable_stastic.class}>班</td>
                <td><{$show_grade_enable_stastic.teacher}> 老師</td>
                <td><{$show_grade_enable_stastic.grade_sum}>篇</td>
            </tr>
        <{/foreach}>
    </table>
</div>

<!-- 入選文章統計 -->
<div class="container-fluid">
    <h3>
        <{$Year}>年(<{$period}>)各年級入選文章統計<small>-目前共有<{$show_grade_confirm_num}>篇文章
            (<{$con_date1}>~<{$con_date2}>)</small>
    </h3>
    <table class="table table-hover table-striped">
        <tr class="danger">
            <th>年級</th>
            <th>班別</th>
            <th>指導老師</th>
            <th>數量</th>
        </tr>
        <{foreach from=$show_grade_confirm_stastic item=show_grade_confirm_stastic}>
            <tr>
                <td><{$show_grade_confirm_stastic.grade}>年</td>
                <td><{$show_grade_confirm_stastic.class}>班</td>
                <td><{$show_grade_confirm_stastic.teacher}> 老師</td>
                <td><{$show_grade_confirm_stastic.grade_sum}>篇</td>
            </tr>
            <{/foreach}>
    </table>
</div>
