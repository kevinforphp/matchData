<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$imgStr = 'x-oss-process=image/resize,m_lfit,w_400/quality,Q_80/format,jpg/interlace,1/watermark,type_d3F5LXplbmhlaQ,size_16,text_5b6u5Y2a57KJ5Lid6YCa,color_FFFFFF,shadow_0,t_80,g_nw,x_16,y_8/watermark,type_d3F5LXplbmhlaQ,size_16,text_5b6u5Y2a57KJ5Lid6YCa,color_212329,shadow_0,t_80,g_ne,x_16,y_8';
?>
<!DOCTYPE html>
<html>
<head>
	<title>数据列表</title>
	<meta name="referrer" content="no-referrer" />
	<style>
		body{
			padding: 0;
			margin:0;
			background:#f1f1f1;
		}
		.main{
			display: flex;
			flex-wrap: wrap;
			max-width: 1200px;
			width: 100%;
			margin:0 auto;
		}
		.box{
			display: inline-block;
			height: 500px;
			width: calc((100% - 50px)/5);
			text-align: center;
			background-color: #fff;
			box-shadow: 0 1px 3px rgba(0,0,0,.02), 0 4px 8px rgba(0,0,0,.02);
			border-radius: 3px;
			overflow: hidden;
			margin: 5px;
			font-size: 12px;
		}
		.match-bar{
			height: 50px;
			margin: 0 auto;
			max-width: 1200px;
			width: 100%;
		}
		.img-box{
			height: 430px;
			overflow: hidden;
		}
		.img-box img{
			width: 100%;
			height: auto;
			vertical-align: middle;
		}
		.detail-box{
			padding: 10px 16px;
			background-color: #fff;
		}
		.detail-box .name{
			    padding: 0 16px;
			    margin: 5px 0;
			    line-height: 1.35em;
			    overflow: hidden;
				text-align: left;
		}
		.detail-box .detail{

			        display: flex;
			        align-items: center;
		}
		.detail-title{
			    margin-left: 8px;
			    padding: 0 4px;
			    line-height: 20px;
			    font-size: 12px;
			    color: #909399;
			    border: 1px solid #ebeef5;
			    border-radius: 4px;
		}
	</style>
</head>
<body>
	<div class="match-bar">
		<label for="weibo">
			微博
			<input id="weibo" type="checkbox" name="type" value="102">
		</label>
		
		<input type="checkbox" name="type" value="104">
		<input type="checkbox" name="type" value="108">
		<input type="checkbox" name="type" value="110">
	</div>
	<div class="main">
		<?php foreach($result as $item):?>
		<div class="box">
			<div class="img-box">
				<img src="<?php echo $item['post'].'?'.$imgStr?>" alt="<?php echo $item['detail']?>">
			</div>
			<div class="detail-box">
				<div class="name"><?php echo $item['name']?></div>
				<div class="detail">
					<div class="detail-title">
						来源:<?php echo $item['detail']?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</body>
</html>
