<?php
/**
 * @return array
 * 缓存测试：页面的完全静态缓存
 */


//连接数据库
function data()
{
    $link = @mysql_connect('localhost', 'root', 'root') or die('数据库连接失败');
    mysql_select_db('music', $link);
    mysql_set_charset('utf8');
    $sql = 'select * from music';
    $data = mysql_query($sql);
    while ($x = mysql_fetch_array($data, MYSQL_ASSOC)) {
        $music[] = $x;
    }
    return $music;
}


$file = './test.html';

if (is_file($file) && time() - filemtime($file) < 100) {
    require_once $file;
} else {
    //调用上面的函数
    $music = data();
    //开启缓冲区
    ob_start();

    //如果有$file文件就打开，没有就创建$file文件
    $res = fopen($file, 'w+');
    require_once 'test.php';

    //将缓冲区内容写入到缓存文件（下次从缓存文件中取数据）
    fwrite($res, ob_get_contents());

    fclose($res);
}