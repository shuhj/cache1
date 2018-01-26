<?php

/**
 * 页面静态化（局部动态获取数据）
 */
$link = @mysql_connect('localhost', 'root', 'root') or die('数据库连接失败');
mysql_select_db('music', $link);
mysql_set_charset('utf8');
$sql = 'select title from music_list';
$data = mysql_query($sql);
while ($x = mysql_fetch_array($data, MYSQL_ASSOC)) {
    $music[] = $x;
}

$result = array(
    'code'=>1,
    'message'=>'成功',
    'data'=>$music
);

print_r(json_encode($result));

