<?php if (!class_exists('template', false)) die('Access Denied');
0
|| self::check('default\member/order_detail.tpl', 'D:\Web\Witkey\wwwroot\yph\trunk\mobile\application\View\default\member\order_detail.tpl', 1459496676)
;?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no">
  <meta content="telephone=no" name="format-detection">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>订单详情 - <?php echo $config['cfg_webname'];?></title>
  <link href="<?php echo $BASE_V;?>css/common/base.css" type="text/css" rel="stylesheet">
  <link href="<?php echo $BASE_V;?>css/order/kd.css" type="text/css" rel="stylesheet">
  <style>
  .en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255, 255, 255, .38) solid !important;
    border-radius: 4px !important;
  }
  
  .en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
  }
  .o_pri  .b_txt{
  	  height: 28px;
  line-height: 28px;
  border: 1px solid #ccc;
  display: block;
  width: 180px;
  text-align: center;
  float: right;
  margin-left: 20px;
  color: #3c3c3c;
  border-radius: 4px;
  background-color: #f5f5f5;
  }

    .date {
      width: 80px;
      color: blue;
      display: block;
      float: left;
    }
    .week {
      width: 30px;
      color: orange;
      display: block;
      float: left;
    }
    .time {
      width: 70px;
      color: red;
      display: block;
      float: left;
    }
  </style>
</head>

<body>
  <header id="common_hd" class="c_txt rel">
      <a id="hd_back" class="abs comm_p8" href="<?php echo $referer_url;?>">返回</a>
      <a id="common_hd_logo" class="t_hide abs common_hd_logo">订单详情</a>
      <h1 class="hd_tle">订单详情</h1>
      <a id="hd_enterShop" class="hide abs" href="<?php echo MOBILE_URL; ?>member/home" style="display: block;"> <span id="hd_enterShop_img" class="abs"> <img class="block" src="" width="32" height="32" style="display: block;"> </span>会员中心</a>
  </header>

  <header id="kd_status" class="kd_tle kd_status"><span class="leixing">订单类型：<em><?php echo $order_info->order_status_text;?></em></span><span class="order"><i>订单总价：</i><em>￥<?php echo $order_info->order_amount;?></em></span></header>
  <nav id="confirm_expire" class="kd_status hide">&nbsp;</nav>
  <nav id="outdo" class="hide">超卖：无库存可能无法发货,请联系卖家</nav>
  <section>
    <div class="kd_wrap">
      <div class="kd_title">收货人信息</div>
      <div id="kd_loading_infos" class="loading" style="display: none;">&nbsp;</div>
      <div id="kd_loaded_infos" class="hide" style="display: block;">
        <p><span id="kd_username"><?php echo $order_info->consignee;?></span><span id="kd_telephone"><?php echo $order_info->mobile;?></span></p>
        <p id="kd_useradd" class="kd_tle kd_line"><?php echo $order_info->full_address;?></p>
        <p id="kd_sn" class="kd_line hide_kd_some" style="border: none;">&nbsp;<span>(运费:￥<?php echo $order_info->shipping_fee;?>)</span></p>
        <div id="kd_last" class="kd_line rel kd_some hide_kd_some" style="display: none;"></div>
        <?php if(empty($order_info->express_name)) { ?>
        <div id="kd_detail" class="">无物流信息：暂无物流跟踪数据</div>        	
        <?php } else { ?>
        <div id="kd_detail" class="">
            <?php echo $order_info->express_name;?>：<?php echo $order_info->express_no;?>
            <br> 物流跟踪：<a id="a_express" style="color:red; text-decoration: underline;" class="am-icon-paper-plane-o">点击查看</a>
        </div>
        <hr/>
        <div class="am-g">
          <ul id="div_express" class="div_express">

          </ul>
        </div>        
        <?php } ?>
      </div>
    </div>
  </section>
  
  <section id="tk">
    <div class="kd_wrap" style="border-bottom:#f1f1f1 solid 1px">
    	<a id="refunding" class="hide" href='<?php echo MOBILE_URL; ?>member/refund.detail?order_refund_id=<?php echo $order_info->order_refund_id;?>'><span class="e1 hide btncancel width50" ><em>退款中，等待卖家处理</em></span></a>
    	<a id="refund_ok" class="hide" href="<?php echo MOBILE_URL; ?>member/refund.detail?order_refund_id=<?php echo $order_info->order_refund_id;?>"><span class="e1 hide btncancel width50" ><em>退款完成，点击查看退款详情</em></span></a>
    	<a id="refund_pass" class="hide" href="<?php echo MOBILE_URL; ?>member/refund.detail?order_refund_id=<?php echo $order_info->order_refund_id;?>"><span class="e1 hide btncancel width50" ><em>退款拒绝，点击查看退款详情</em></span></a>
    	 </div>
  </section>
  <section>
    <div class="kd_wrap" style="border-bottom:#f1f1f1 solid 1px">
      <div class="kd_title">店铺信息</div>
      <div id="kd_loading_seller" class="loading" style="display: none;">&nbsp;</div>
      <div id="kd_loaded_seller" class="rel hide" style="display: block;">
        <div id="kd_seller" class="rel" style="padding-bottom: 5px;"><img width="100%" height="100%" src="<?php echo $order_info->shop_logo_url;?>">
          <p class="kd_tle" style="padding-top: 13px;"><?php echo $order_info->shop_name;?></p><em id="kd_seller_icon" class="abs">&nbsp;</em></div>
          <a href="" id="kd_tele" class="kd_tle abs" style="display: none;">&nbsp;</a>
      </div>
    </div>
    <div class="kd_wrap" id="items_wrap">
      <div id="kd_loading_items" class="loading" style="display: none;">&nbsp;</div>
      <div id="kd_loaded_items" class="hide" style="display: block;">
        <ul id="o_ul">
        	<!-- <?php if(is_array($order_info->order_goods_array)) foreach($order_info->order_goods_array AS $v) { ?>-->
          <li class="o_li">
            <a href="/item/<?php echo $v->item_id;?>.html" class="o_a" ><img src="<?php echo $v->goods_image_url;?>" width="55" height="55" class="left o_img">
              <p class="o_name over_hidden ellipsis "><?php echo $v->item_name;?></p>
              <p><?php echo $v->goods_sku_name;?></p>
              <p>单价:￥<?php echo $v->item_price;?><?php if(!empty($v->item_total_price) && $v->item_price<>$v->item_total_price) { ?><del>￥<?php echo $v->item_total_price;?></del><?php } ?></p>
              <p>数量:<?php echo $v->item_number;?></p>
              <p style="font-weight: bold; color:#B91B22;">总计:￥ <?php echo $v->item_number*$v->item_price ?> <?php if(!empty($v->item_total_price) && $v->item_price<>$v->item_total_price) { ?><del>￥ <?php echo $v->item_total_price*$v->item_price ?></del><?php } ?></p>
            </a>
             <a class="b_txt"></a>
            <input class="hid_status_all" type="hidden" data_order_goods_id="<?php echo $v->order_goods_id;?>"  data_service_status="<?php echo $v->service_status;?>" data_service_status_text="<?php echo $v->service_status_text;?>" data_order_refund_id="<?php echo $v->order_refund_id;?>" data_return_service_status="<?php echo $v->return_service_status;?>"  />
          </li>
          <!-- <?php } ?> -->
        </ul>
      </div>
    </div>
    <div class="hide" id="buyerNote">
      <p class="note"></p>
    </div>
    <div id="cjhongbao" class="kd_cjhonbao hide">
      <p class="e1"><em class="e1"></em><span id="hongbaoPrice"></span><em class="e2"></em></p>
      <p class="e2 ">付款后购物劵不可退回</p>
    </div>
  </section>
  <section>
    <div class="kd_wrap">
      <div class="kd_title">订单信息</div>
      <div id="kd_loading_times" class="loading" style="display: none;">&nbsp;</div>
      <div id="kd_loaded_times" class="hide" style="display: block;">
        <p id="kd_wd_sn"><?php echo $config['cfg_webname'];?>订单号:<?php echo $order_info->order_sn;?></p>
        <p id="kd_order_sort" style="display:none;">订单分类:担保交易</p>
        <p id="kd_order_time">下单时间:<?php echo $order_info->create_time;?></p>
        <p id="kd_pay_time">付款时间:<?php echo $order_info->pay_time;?></p>
        <p id="kd_go_time" style="border:none">发货时间:<?php echo $order_info->shipping_time;?></p>
      </div>
    </div>
  </section>
  <section id="kd_refund_sec" class="hide">
    <div class="kd_title">退款信息</div>
    <div id="kd_refund_info" class="kd_wrap">
      <p>退款时间:</p>
      <p style="border:none">退款金额:</p>
    </div>
  </section>
  <footer id="displaybtn" style="display:none;">
    <nav class="shopList">
      <p class="a7">
      	<span class="e1 hide btncancel width50" id="complaint">
      	<a href="javascript:void(0)" id="complaintA"><em>投诉</em></a>
      </span> 
      <span class="e3 hide btnok width50" id="btnok" orderid=""><em>确认收货</em></span> 
      <span class="e3 btnok hide width50" id="markaction"><a id="markLink"><em>我要评价</em></a></span> 
      <span class="e3 hide btncancel width50" id="pay_url" style="display: block;">
      	<a href="/order/payment?sn=<?php echo $order_info->order_sn;?>">继续支付</a></span> 
      	<span class="e1 hide btncancel width50" id="reFund"><a id="reFundA"><em>退款</em></a></span> 
      	<span class="e1 hide btncancel width50" id="refundDetail"><em>退款详情</em></span> 
      	<span class="e2 hide btncancel width50" id="closeOrderBtn" orderid="1215977392" style="display: block;">
      		<em>关闭订单</em>
      	</span> 
      	<span class="e2 hide btncancel width50" id="delayAccept"><em>延迟收货</em></span>
      </p>
    </nav>
  </footer>
  <script src="<?php echo STATIC_URL; ?>common/assets/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
  var index_url = '<?php echo INDEX_URL; ?>';
  var mobile_url = '<?php echo MOBILE_URL; ?>';
  var static_url = '<?php echo STATIC_URL; ?>';
  var base_v = '<?php echo $BASE_V;?>';
  var php_self = '<?php echo PHP_SELF; ?>';
  var global_have_return_service=<?php echo $order_info->have_return_service;?>;
  var global_refund_status=<?php echo $order_info->refund_status;?>;
  var global_order_status=<?php echo $order_info->order_status;?>;
  var global_order_type=<?php echo $order_info->order_type;?>;
  var global_comment_status=<?php echo $order_info->comment_status;?>;
  var global_order_sn='<?php echo $order_info->order_sn;?>';
  var global_order_refund_id='<?php echo $order_info->order_refund_id;?>'
  var global_express_id = '<?php echo $order_info->express_id;?>';
  var global_express_no = '<?php echo $order_info->express_no;?>';
  </script>
  <script src="<?php echo $BASE_V;?>js/order_detail.js?v=2" type="text/javascript"></script>
</body>

</html>
