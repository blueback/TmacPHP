<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>留言列表-用户中心</title>
		<meta name="description" content="用户中心">
		<meta name="keywords" content="index">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="renderer" content="webkit">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<meta name="save" content="history">
		<link href="{STATIC_URL}common/amazeui/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="{STATIC_URL}common/amazeui/css/admin.css" rel="stylesheet" type="text/css">
		<link href="{$BASE_V}css/base.css" type="text/css" rel="stylesheet">
		<link href="{$BASE_V}css/page.css" type="text/css" rel="stylesheet">
		<link href="{$BASE_V}css/form_list.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		<!--{template inc/header_paul}-->
		<div class="am-cf admin-main">
			<!--{template inc/sidebar_paul}-->
			<!-- content start -->
			<div class="admin-content">
				<div class="am-cf am-padding">
					<div class="am-fl"><strong class="am-text-primary am-text-lg">留言管理</strong>
					</div>
				</div>
				<hr/>
 
				<div class="am-g" id="condition_list">
					<div class="am-u-sm-5 am-form">
					  	<div class="am-input-group">   												
					  		<span class="am-input-group-label">分类</span>
							<div class="am-input-group am-u-sm-3 am-margin-0 am-padding-0">							      								  
								<select id="message_type">
						      		<option value="0">全部</option>
					            	{$message_type_option}
						      	</select>
						      	<span class="am-form-caret"></span>												      	
							</div>
							<div class="am-input-group am-u-sm-3 am-u-end am-margin-0 am-padding-0">							      								  
								<select id="message_class">
						      		<option value="0">全部</option>					            	
						      	</select>
						      	<span class="am-form-caret"></span>												      	
							</div>
					 	</div>						
					</div>	
					<div class="am-u-sm-7">
						<div class="am-input-group am-input-group-lg">   						
							<span class="am-input-group-label am-radius">开始日期</span>
							<input type="text" name="start_date" id="start_date" class="am-form-field" value="{$start_date}" placeholder="开始时间" data-am-datepicker readonly required />
							<span class="am-input-group-label am-radius">结果日期</span>
							<input type="text" name="end_date" id="end_date" class="am-form-field" value="{$end_date}" placeholder="结束时间" data-am-datepicker readonly required />
							<span class="am-input-group-label am-radius">导出密码</span>
							<input id="password" name="password" type="password" class="am-form-field am-radius" value="10" placeholder="密码">
							<span class="am-input-group-btn">
        						<button class="am-btn am-btn-danger" type="button" id="export_button">导出excel</button>
        						<button class="am-btn am-btn-default" type="button" id="search_button">搜索</button>
     						</span>
						</div>						
					</div>					

				</div>		
				<hr>
				<div class="am-g">
			        <div class="am-u-lg-12">
						<button class="am-btn am-btn-sm am-btn-primary cbk_all"><i class="am-icon-check-circle"></i> 全选</button>
						<button class="am-btn am-btn-sm am-btn-primary cbk_no_all"><i class="am-icon-check-circle-o"></i> 反选</button>						
						<button class="am-btn am-btn-sm am-btn-danger cbk_del_all"><i class="am-icon-trash"></i> 批量删除</button>						
			        </div>
			    </div>

				<div class="am-g">
					<div class="am-u-lg-12">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
								<tr>																		
									<th width="3%"></th>
									<th width="5%" class="am-text-middle am-text-center">ID</th>
									<th width="8%" class="am-text-middle am-text-center">姓名</th>
									<th width="10%" class="am-text-middle am-text-center">手机号码</th>
									<th width="15%" class="am-text-middle am-text-center">身份证号码</th>
									<th width="8%" class="am-text-middle am-text-center">类型</th>
									<th width="8%" class="am-text-middle am-text-center">额度</th>
									<th width="10%" class="am-text-middle am-text-center">IP</th>									
									<th width="10%" class="am-text-middle am-text-center">留言时间</th>									
									<th width="8%" class="am-text-middle am-text-center">操作</th>
								</tr>
							</thead>
							<tbody  id="order_list_loading">
								<tr>
									<td colspan="11" class="am-text-center">
										<div class="am-modal-hd am-text-center"><img  src="{$BASE_V}image/loading.gif">正在载入...</div>
									</td>
								</tr>

							</tbody>
							<tbody style="display: none;" id="order_list_nofund">
								<tr>
									<td class="am-text-center" colspan="10">
												<div class="am-modal-hd">很抱歉，没有找到结果...</div>
										</td>
									
								</tr>

							</tbody>
							<tbody id="tbody_list">

							</tbody>
							<tfoot>
								<tr>
									<td colspan="11" id="roomListPages" class="am-text-center page pagination"></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

				<div class="am-g">
				    <div class="am-u-lg-12">
				    <button class="am-btn am-btn-sm am-btn-primary cbk_all"><i class="am-icon-check-circle"></i> 全选</button>
				      <button class="am-btn am-btn-sm am-btn-primary cbk_no_all"><i class="am-icon-check-circle-o"></i> 反选</button>				      
				      <button class="am-btn am-btn-sm am-btn-danger cbk_del_all"><i class="am-icon-trash"></i> 批量删除</button>
				    </div>
				</div>

				<hr/>
			</div>
			<!-- content end -->
		</div>
		<!--{template inc/footer_paul}-->

		<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm-batch">
			<div class="am-modal-dialog">
				<div class="am-modal-hd">提醒</div>
				<div class="am-modal-bd" id="confirm_content-batch">
					你，确定要删除这条记录吗？
				</div>
				<div class="am-modal-footer">
					<span class="am-modal-btn" data-am-modal-cancel>取消</span>
					<span class="am-modal-btn" data-am-modal-confirm>确定</span>
				</div>
			</div>
		</div> 
	</body>

</html>
<script type="text/javascript">
	var index_url = '{MOBILE_URL}';
	var mobile_url = '{MOBILE_URL}';
	var static_url = '{STATIC_URL}';
	var base_v = '{$BASE_V}';
	var php_self = '{PHP_SELF}';
	var searchParameter = $searchParameter;
	var message_class_array = $message_class_array;
</script>
<script type="text/javascript" src="{STATIC_URL}common/amazeui/js/jquery.min.js"></script>
<script type="text/javascript" src="{STATIC_URL}common/amazeui/js/amazeui.js"></script>
<script type="text/javascript" src="{STATIC_URL}js/jquery-plugin/jquery.pagination-min.js"></script>
<script type="text/javascript" src="{STATIC_URL}common/amazeui/js/app.js"></script>
<script src="{STATIC_URL}js/jquery-plugin/ui/minified/jquery.cookie-min.js" type="text/javascript"></script>
<script type="text/javascript" src="{$BASE_V}js/common.js"></script>
<script type="text/javascript" src="{$BASE_V}js/modal_html.js"></script>
<script type="text/javascript" src="{$BASE_V}js/message_list.js?v=4"></script>
<script language="javascript">
	$(document).ready(function() {
		search.bindParam();
		search.getList();		
	});
</script>