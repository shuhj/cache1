<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>完全静态缓存测试</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap-grid.css" type="text/css">
</head>
<body>
<div class="container">
    <h3>歌曲名</h3>
    <h5>test.php文件</h5>
    <ul class="list-group">
        <?php foreach ($music as $key => $value) { ?>
            <li class="list-group-item"><a href="#"><?php echo $value['name'];?></a></li>
        <?php } ?>
    </ul>
</div>
</body>
</html>