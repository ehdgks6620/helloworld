<?php 
$total_page= ceil($total_list/$view_list);
if($page%10) {
    $start_page=$page-($page%10)+1;
} else{
    $start_page=$page-9;
}
//echo "<br>";
$end_page=$start_page+9;
//echo "<br>";

$prev_group=$start_page-1;
if($prev_group<1) $prev_group=1;

$next_group=$end_page+1;
if($next_group>$total_page) $next_group=$total_page;

$page_num="<table>
<tr>
<td><a href='$_SERVER[PHP_SELF]?page=1'>first</a></td>
<td><a href='$_SERVER[PHP_SELF]?page=$prev_group'>이전</a></td>";
for ($i=$start_page; $i<$end_page; $i++){
    if($i>$total_page) break;

    if($i==$page) {
        $page_num=$page_num."<td>$i</td>"; 
    } else {$page_num = $page_num."<td><a href=$_SERVER[PHP_SELF]?page=$i>$i</a></td>";}
}
$page_num=$page_num."
<td><a href='$_SERVER[PHP_SELF]?page=$next_group'>다음</a></td>
<td><a href='$_SERVER[PHP_SELF]?page=$total_page'>last</a></td>
</tr></table>";


//div,span,flexbox,disply block, background color
//const,letmfunction,array,object
?>