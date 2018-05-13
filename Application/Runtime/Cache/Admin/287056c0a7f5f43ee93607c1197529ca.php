<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>后台管理系统</title>
    <link href="/Public/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/admin/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/admin/css/animate.css" rel="stylesheet">
    <link href="/Public/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/Public/admin/css/style.css?v=2.2.0" rel="stylesheet">
    
    <style type="text/css">
        html{overflow-y: auto;}
        .red{color: red;font-weight: bold;}
        .green{color: green;font-weight: bold;}
        .orange{color: orange;font-weight: bold;}

        .current{background-color:rgba(0,255,150,0.5);}
        .prev,.num,.next,.current{width:auto;height:auto;margin:4px;padding:1px 2px;box-shadow:0 0 2px rgba(0,0,0,0.2);background-color:rgba(255,255,255,0.1);}
        table{font-size: 12px;}

        .modify{display: none; width: 100%;background:rgba(0,0,0,0.8);position: absolute;left: 0;top: 0;z-index: 100;font-weight: bold;display: none;height: 100%;}
        .btnbox{width: 100%;text-align: center;}
        .xy50{position: absolute;left: 50%;top: 50%;-webkit-transform:translate(-50%,-50%); }
        .inputbox{width: 500px;margin: 0 auto;color: #CCCCCC;padding: 50px 0;}
        .inputbox input, select{color: #000000;}
        .btnbox button{width: 30%;display: inline-block;margin: 0 45px;padding: 5px;background-color: #1ab394;color: #FFFFFF;}
        .auditbox{width: 100%;height: 100%;position: absolute;left: 0;top: 0;z-index: 9;background:rgba(0,0,0,0.8);font-size: 18px;display: none;}
        .auditbox >div{width: 500px;margin: 0 auto;padding:20px;background: #ffffff;border-radius: 5px;}
        .checkbox{display: inline-block;pointer-events: none;}
        .send_btn,.cancel_btn{font-size: 18px;display: block;margin: 10px;}

        .imgs{cursor: pointer;}
        .big-img-box{width: 500px;position: fixed;left: 0;bottom: 0;z-index: 10;cursor: pointer;}
        .big-img-box img{width: 100%;}

        .loadings{ position: absolute; width: 100%;  height: 100%;  left: 0;  top: 0; background: rgba(0,0,0,0.8);  z-index: 3000;display: none; }
        .loadings div{width: 180px; height: 180px; position: absolute; left: 50%; top: 50%; margin: -90px 0 0 -90px;background: url(/Public/img/loading.png) no-repeat center center; background-size: contain; -webkit-animation: rotate 2s linear 0s infinite;}
        @-webkit-keyframes rotate {
            0% { -webkit-transform: rotate(0deg);}
            100% {   -webkit-transform: rotate(359deg);}
        }
    </style>
</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">

                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="/Public/admin/img/profile_small.jpg" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Beaut-zihan</strong>
                     </span>  <span class="text-muted text-xs block"><?php echo (session('admin_usr')); ?> <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a data-toggle="modal" href="#modal-form">修改密码</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);loginOut()">安全退出</a>
                        </li>
                    </ul>
                </div>

            </li>
            <li class="active">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">菜单</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?php if($_SESSION['app_session_']['admin_curpage']== 'admin'): ?>class="active"<?php endif; ?> ><a href="/index.php?s=admin&a=admin">排行列表</a></li>

                 </ul>
            </li>

        </ul>

    </div>
</nav>


<div id="modal-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 b-r">
                        <form method="post" role="form" action="/index.php?s=admin&a=saveUserInfo">
							<input type="hidden" name="witch" value="modifypwd" />
                            <div class="form-group">
                                <label>原密码：</label>
                                <input type="password" name="oldpwd" placeholder="请输入原密码" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>新密码：</label>
                                <input type="password" name="newpwd" placeholder="请输入新密码" class="form-control">
                            </div>
							<div class="form-group">
                                <label>重复新密码：</label>
                                <input type="password" name="newpassword" placeholder="请输入新密码" class="form-control">
                            </div>
                            <div>
                                <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit"><strong>确认</strong> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
function loginOut(){


    swal({
        title: "您确定要退出吗?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "退出",
        closeOnConfirm: false
    }, function () {
        location.href="/index.php?s=admin&a=out";

    });

}

</script>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>排行列表</h2>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>排行列表</h5>
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?s=admin&a=excel" class="excel">下载Excel</a></h5>
                            <form method="get" action="">
                                <input type="hidden" name="s" value="admin">
                                <input type="hidden" name="a" value="admin">
                                <div style="float: right;">
                                    按什么排序：
                                    <select name="state">
                                        <option value="num" <?php if($_GET['state']== 'num'): ?>selected="selected"<?php endif; ?> >点赞数</option>
                                        <option value="add_time" <?php if($_GET['state']== 'add_time'): ?>selected="selected"<?php endif; ?> >参与时间</option>
                                    </select>

                                    <button type="submit" style="margin-left: 10px;">搜索</button>
                                </div>
                            </form>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>openid</th>
                                    <th>用户填写ID</th>
                                    <th>电话</th>
                                    <th>作品</th>
                                    <th>点赞数</th>
                                    <th>时间</th>
                                    <th>IP</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                            <th><?php echo ($list['id']); ?></th>
                                            <td><?php echo ($list['openid']); ?></td>
                                            <td><?php echo ($list['uid']); ?></td>
                                            <td><?php echo ($list['tel']); ?></td>
                                            <td><img src="/Public/upload/<?php echo ($list['imgurl']); ?>" width="150"></td>
                                            <td><?php echo ($list['num']); ?></td>
                                            <td><?php echo ($list['add_time']); ?></td>
                                            <td><?php echo ($list['ip']); ?></td>
                                            <td><a href="?s=admin&a=del&id=<?php echo ($list['id']); ?>">删除</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                            <div style="text-align: center"><?php echo ($page); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="loadings"><div></div></div>

<!-- Mainly scripts -->
<script src="/Public/admin/js/jquery-2.1.1.min.js"></script>
<script src="/Public/admin/js/bootstrap.min.js?v=3.4.0"></script>
<script src="/Public/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/Public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/js/jquery.cookie.js"></script>
<!-- Custom and plugin javascript -->
<script src="/Public/admin/js/hplus.js?v=2.2.0"></script>
<script src="/Public/admin/js/plugins/pace/pace.min.js"></script>
<script src="/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/Public/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>

</body>

</html>