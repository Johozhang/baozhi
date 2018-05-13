<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../../Public/css/swiper.min.css">
	<link rel="stylesheet" href="../../../Public/css/animate.min.css">
	<link rel="stylesheet" href="../../../Public/css/index.css">
			<script>
			// 秒针资源引用与基础统计
			(function(a, e, f, g, b, c, d) {a.ClickiTrackerName = b;
				a[b] = a[b] || function() {(a[b].queue = a[b].queue || []).push(arguments)};
				a[b].start = +new Date; c = e.createElement(f); d = e.getElementsByTagName(f)[0];
				c.async = 1; c.src = g; d.parentNode.insertBefore(c, d)
			})(window, document, 'script', '//stm-cdn.cn.miaozhen.com/clicki.min.js?v='+Math.round(new Date().getTime()/1000/300), 'stm_clicki');
			stm_clicki('create', 'dc-670', 'auto');
			stm_clicki('send', 'pageview');
		</script>

		<script>
			// 热图统计代码
			stm_clicki('require','heatmap', ('https:'==document.location.protocol?'https://stm-collect':'http://stm-cdn')+'.cn.miaozhen.com/plugins/heatmap.js');
			stm_clicki('heatmap:on',5);
		</script>
</head>
<body>
	<div class="mask" id="mask">
		<div class="scale"><span class="num" id="num">0</span>%</div>
	</div>
	<div class="swiper-container swiper-container-v">
		<div class="swiper-wrapper">
			<!-- 首页 -->
			<div class="swiper-slide index-page">
				<video src="../../../Public/img/f9cb29b37c231abcbeec714bb6d4ff76.mp4" autoplay="autoplay" loop="loop"></video>
				<img class="bg" src="" data-src="../../../Public/img/index-bg.png" alt="">
				<img class="next-icon animated bounce" src="" data-src="../../../Public/img/ic_next.png" alt="">
				<img class="ani index-title" swiper-animate-effect="rubberBand" swiper-animate-duration="1s" swiper-animate-delay="0s" src="" data-src="../../../Public/img/index-title.png" alt="">
			</div>
			<!-- 内饰 -->
			<div class="swiper-slide">
				<div class="swiper-container swiper-container-scrollbar">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- 背景 -->
							<img class="bg" src="" data-src="../../../Public/img/scrollbar/2008H5B.png" alt="">
							<!-- 引擎文字 -->
							<div class="ani engine-title" swiper-animate-effect="bounceInDown" swiper-animate-duration="1s" swiper-animate-delay="0s">
								<img src="" data-src="../../../Public/img/scrollbar/engine/title.png" alt="">
							</div>
							<div class="ani motor-word" swiper-animate-effect="bounceInRight" swiper-animate-duration="1s" swiper-animate-delay="0.5s">
								<img src="" data-src="../../../Public/img/scrollbar/engine/motor-word.png" alt="">
							</div>
							<div class="ani gearbox-word" swiper-animate-effect="bounceInLeft" swiper-animate-duration="1s" swiper-animate-delay="0.5s">
								<img src="" data-src="../../../Public/img/scrollbar/engine/gearbox-word.png" alt="">
							</div>
							<!-- 造型文字 -->
							<div class="ani model-title">
								<img src="" data-src="../../../Public/img/scrollbar/model/title.png" alt="">
							</div>
							<div class="ani grille-word">
								<img src="" data-src="../../../Public/img/scrollbar/model/grille-word.png" alt="">
							</div>
							<div class="ani headlight-word">
								<img src="" data-src="../../../Public/img/scrollbar/model/headlight-word.png" alt="">
							</div>
							<div class="ani taillight-word">
								<img src="" data-src="../../../Public/img/scrollbar/model/taillight-word.png" alt="">
							</div>
							<div class="ani rack-word">
								<img src="" data-src="../../../Public/img/scrollbar/model/rack-word.png" alt="">
							</div>
							<div class="ani hub-word">
								<img src="" data-src="../../../Public/img/scrollbar/model/hub-word.png" alt="">
							</div>
							<!-- 天幕 -->
							<div class="ani tent-title">
								<img src="" data-src="../../../Public/img/scrollbar/tent/title.png" alt="">
							</div>
							<div class="ani atmosphere-word">
								<img src="" data-src="../../../Public/img/scrollbar/tent/atmosphere-word.png" alt="">
							</div>
							<div class="ani sunshade-word">
								<img src="" data-src="../../../Public/img/scrollbar/tent/sunshade-word.png" alt="">
							</div>
							<div class="ani skylight-word">
								<img src="" data-src="../../../Public/img/scrollbar/tent/skylight-word.png" alt="">
							</div>
							<!-- 促销 -->
							<div class="ani down-payment">
								<img src="" data-src="../../../Public/img/scrollbar/sales/down-payment.png" alt="">
							</div>
							<div class="ani day-payment">
								<img src="" data-src="../../../Public/img/scrollbar/sales/day-payment.png" alt="">
							</div>
							<!-- 按钮 -->
							<div class="next-btn" id="next_btn"></div>
							<div class="download-btn"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 预约页面 -->
	<div class="order-page" id="order_page">
		<img class="bg" src="" data-src="../../../Public/img/order-bg.png" alt="">
		<div class="return-btn" id="return_btn"></div>
		<form action="">
			<input class="name-input p1-text1" type="text" placeholder="姓名">
			<input class="phone-input p1-text2" type="number" placeholder="电话号码">
			<select class="province-select sel-che1" name="" id="">
				<option value="-1" selected disabled>请选择省份</option>
				<option value="3361">北京市</option>
				<option value="3362">天津市</option>
				<option value="3363">河北省</option>
				<option value="3364">山西省</option>
				<option value="3365">内蒙古自治区</option>
				<option value="3366">辽宁省</option>
				<option value="3367">吉林省</option>
				<option value="3368">黑龙江省</option>
				<option value="3369">上海市</option>
				<option value="3370">江苏省</option>
				<option value="3371">浙江省</option>
				<option value="3372">安徽省</option>
				<option value="3373">福建省</option>
				<option value="3374">江西省</option>
				<option value="3375">山东省</option>
				<option value="3376">河南省</option>
				<option value="3377">湖北省</option>
				<option value="3378">湖南省</option>
				<option value="3379">广东省</option>
				<option value="3380">广西壮族自治区</option>
				<option value="3381">海南省</option>
				<option value="3382">重庆市</option>
				<option value="3383">四川省</option>
				<option value="3384">贵州省</option>
				<option value="3385">云南省</option>
				<option value="3386">西藏自治区</option>
				<option value="3387">陕西省</option>
				<option value="3388">甘肃省</option>
				<option value="3389">青海省</option>
				<option value="3390">宁夏回族自治区</option>
				<option value="3391">新疆维吾尔自治区</option>
			</select>
			<select class="city-select sel-che2" name="" id="">
				<option value="-1" selected disabled>请选择城市</option>
				<!--<option value="">汕头</option>
				<option value="">广州</option>
				<option value="">深圳</option>-->
			</select>
			<select class="dealer-select sel-che3" name="" id="">
				<option value="-1" selected disabled>请选择经销商</option>
				<!--<option value="">XXX经销商</option>
				<option value="">YYY经销商</option>-->
			</select>
		</form>
		<div class="check" id="check_btn"><img src="" data-src="../../../Public/img/icon_gou.png" alt=""></div>
		<div class="submit-btn"></div>
	</div>
</body>
<script src="../../../Public/js/jquery-3.1.1.min.js"></script>
<script src="../../../Public/js/swiper.min.js"></script>
<script src="../../../Public/js/swiper.animate1.0.3.min.js"></script>
<script src="../../../Public/js/index.js"></script>
<script src="../../../Public/js/all.js" type="text/javascript" charset="utf-8"></script>
</html>