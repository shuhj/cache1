<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>页面静态化(ajax---局部动态化)</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap-grid.css" type="text/css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
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

    <hr>

    <ul id='ul2' class="list-group">

    </ul>
</div>

<script>
    var htmls = '';
    $.ajax({
        url: './ajaxRequest.php',
        type: 'get',
        dataType: 'json',
        error: function () {
            alert('请求出错');
        },
        success: function (result) {
            $.each(result.data, function (k, v) {
                console.log(v.title);//音乐列表名
                htmls += "<li class='list-group-item'>"+(v.title)+"</li>"
            });
            $('#ul2').html(htmls);
        }
    });
</script>

</body>
</html>