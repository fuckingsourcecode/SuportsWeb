<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" conatent="width=device-width, initial-scale=1" />
    <title>排行</title>
    <link rel="stylesheet" type="text/css" href="/sportsweb/sport/Public/css/bootstrap.min.css" />
    <script src="/sportsweb/sport/Public/js/jquery-1.11.3.min.js"></script>
    <script src="/sportsweb/sport/Public/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css" />
    <script src="http://cdn.gbtags.com/datatables/1.10.5/js/jquery.js"></script>
    <script src="http://cdn.gbtags.com/datatables/1.10.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 60px;
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/sportsweb/sport/index.php/Home">主页</a>
                        </li>
                        <li>
                            <a href="/sportsweb/sport/index.php/Home/Rank/rank">排行</a>
                        </li>
                        <li>
                            <a href="/sportsweb/sport/index.php/Home/Activity/activity">活动</a>
                        </li>
                    </ul>
                    <div class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <ul class="nav navbar-nav navbar-right" ">
						<li href="# " class="active ">
							<a href="/sportsweb/sport/index.php/Home/Login/login ">登陆</a>
						</li>
						<li href="# ">
							<a href="/sportsweb/sport/index.php/Home/Register/register ">注册</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div id="container">
        <button id="redraw">更换数据源</button>
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>序号</th>
                    <th>标题</th>
                    <th>连接</th>
                </tr>
            </thead>
            <tbody></tbody>
            <!-- tbody是必须的 -->
        </table>
    </div>
    </body>

</html>
<script>
/*Javascript代码片段*/
var t = $('#example').DataTable({
    ajax: {
        //指定数据源
        url: "/sportsweb/sport/Public/test.txt"
    },
    //每页显示三条数据
    pageLength: 3,
    columns: [{
        "data": null //此列不绑定数据源，用来显示序号
    },
    {
        "data": "ID"
    },
    {
        "data": "position"
    },
    {
        "data": "project"
    }],
    "columnDefs": [{
        // "visible": false,
        //"targets": 0
    },
    {
        "render": function(data, type, row, meta) {
            //渲染 把数据源中的标题和url组成超链接
            return '<a href="' + data + '" target="_blank">' + '查看' + '</a>';
        },
        //指定是第三列
        "targets": 3
    }]

});

//前台添加序号
t.on('order.dt search.dt',function() {
    t.column(0, {
        "search": 'applied',
        "order": 'applied'
    }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();

//更换数据源（相同格式，但是数据内容不同）
$("#redraw").click(function() {
    var url = table.api().ajax.url("/sportsweb/sport/Public/test.txt");
    url.load();
});
</script>
<script>
(function (argument) {
         $.ajax({
            url: '/sportsweb/sport/index.php/Home/Index/checkSession',
            type: 'post',
            success: function(data) {
                if (data != 'please login') {
                    $('.navbar-right li a').eq(0).text(data).attr('href', 'https://www.baidu.com');
                    $('.navbar-right li a').eq(1).text('注销').attr('href', '/sportsweb/sport/index.php/Home/Index/logout');
                }
            }
        }); 
    })();
</script>