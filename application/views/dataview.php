<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$imgStr = 'x-oss-process=image/resize,m_lfit,w_400/quality,Q_80/format,jpg/interlace,1/watermark,type_d3F5LXplbmhlaQ,size_16,text_5b6u5Y2a57KJ5Lid6YCa,color_FFFFFF,shadow_0,t_80,g_nw,x_16,y_8/watermark,type_d3F5LXplbmhlaQ,size_16,text_5b6u5Y2a57KJ5Lid6YCa,color_212329,shadow_0,t_80,g_ne,x_16,y_8';
$this->load->helper('url'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>数据列表</title>
	<meta name="referrer" content="no-referrer" />
	<link rel="stylesheet" href="<?php echo base_url('public/simp.css');?>">
	<style>
		body{
			padding: 0;
			margin:0;
			background:#f1f1f1;
		}
		a,a:hover{
			color:black;
			text-decoration: none;
		}
		.main{
			display: flex;
			flex-wrap: wrap;
			max-width: 1200px;
			width: 100%;
			margin:0 auto;		
			/* margin-top:20px; */
		}
		.main .nomore{
			width: 100%;
			text-align: center;
			margin:25% 0;
		}
		.main a{
			transition:100ms;
			width:390px;
			height:auto;	
			margin-left:auto;
			margin-bottom:10px;
			border-radius:5px;
			overflow:hidden;
			border:1px solid rgba(0,0,0,.15)
		}
		.main a img{
			width:100%;
			height:auto;
		}
		.main a:hover{
			transform:translateY(-10px) scale(1.02);
			box-shadow:rgba(0,0,0,.2) 0 5px 5px;
		}
		.selecte{
			max-width: 1200px;
			width: 100%;
			margin:0 auto;
			position:relative;
			display: flex;
			background:#fff;
			margin-bottom:20px;	
		}
		.box{
			position:relative;			
		}
		.box .title{
			width:100%;
			height:45px;
			position:absolute;
			top:0;
			background:rgba(0,0,0,.8);
		}
		.box1{	
			height:200px;
			max-width: 1080px;
			text-align: center;
			display: flex;
			flex-wrap:wrap;				
			padding: 10px 0 10px 20px ;
			overflow: hidden;
			transition: 500ms;
		}
		.box1.hide{
			height:70px;			
		}
		.pagination{
			padding:0;
		}
		.box1 .cur,.box1 .active,.box1 .cur:hover{
			width:8%;
			min-width:95px;
			padding:5px 10px;
			font-size:12px;		
		}
		.box1 .cur a,.box1 .active a,.box1 .cur:hover a{
			display:inline-block;
			width:95px;
			padding:5px;		
			transition: 100ms;
			color:black;
		}
		.box1 .active a{			
			box-shadow: rgba(0,0,0,.2) 0 2px 3px;			
			border-radius:2px;
		}
		.box1 div:hover a{
			box-shadow: rgba(0,0,0,.2) 0 2px 3px;			
			border-radius:2px;
			transform:translateY(-2px);
		}
		.selecte .main-left{
			position: relative;
			top: 30px;
			left: 15px;
			min-width: 60px;
			line-height: 28px;
			height: 28px;
			font-size:12px;			
			border: 1px solid rgba(221, 221, 221, 0.2);
			border-radius: 2px;
			text-align: center;
			cursor: pointer;
			background-color: #ededed;
			padding:0 10px;
			color:rgba(0, 0, 0, 0.5);
		}
		.selecte .main-right{
			position: absolute;
			top: 50px;
			right: 16px;
			width: 28px;
			line-height: 28px;
			height: 28px;
			font-size:12px;
			border: 1px solid #ddd;
			border-radius: 2px;
			text-align: center;
			cursor: pointer;
			background-color: #ededed;
		}
		.selecte .detele{
			position: absolute;
			top: 16px;
			right: 16px;
			width: 28px;
			line-height: 28px;
			font-size:14px;
			height: 28px;
			font-size:12px;
			border: 1px solid #ddd;
			border-radius: 2px;
			text-align: center;
			cursor: pointer;
			background-color: #ededed;
		}
		.main-right span{
			vertical-align: middle;
			transition: 200ms;
		}
		
		.main-right span::before{
			content: '';
			display: inline-block;
			width: 12px;
			height: 12px;
			background: url(/static/img/ic_arrow.svg) 0 0 no-repeat;
			transition: transform .2s ease-in-out;
		}
		.main-right.rote span::before{
			transform: rotate(180deg);
		}
		.whiteBox{
			display: inline-block;
			height: 120px;
			max-width: 1200px;
			width: 100%;
			text-align: center;
			background-color: #fff;
			box-shadow: 0 1px 3px rgba(0,0,0,.02), 0 4px 8px rgba(0,0,0,.02);
			border-radius: 3px;
			overflow: hidden;
			margin: 5px;
			font-size: 12px;
			margin: 0 auto;
			padding:10px 15px;
			display: flex;
			flex-wrap: wrap;
		}
		.whiteBox label{
			width:10%;
			min-width:100px;
			text-align: left;			
		}
		.whiteBox label:hover{
			cursor: pointer;
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
			width:100%;
			padding: 10px 0;
			background-color: #fff;
			box-shadow: rgba(0,0,0,.1) 0 0 5px inset;
			border-radius:0 0 10px 10px;
			position:absolute;
			top:0;
		}
		.detail-box .name{
			padding: 0 25px;
			margin: 5px 0 8px 0;
			line-height: 1.35em;
			overflow: hidden;
			text-align: left;
			position:relative;
		}
		.detail-box .name img{
			width:50px;
			height:50px;
			position:absolute;
			top:-15px;
		}
		.detail-box .detail{
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 25px;
		}
		.detail-box .detail .date{
			    /* margin-right: 8px; */
			    padding: 0 4px;
			    line-height: 20px;
			    font-size: 12px;
			    color: #909399;
			    border-radius: 4px;
		}
		.detail-title{
			    /* margin-left: 8px; */
			    padding: 0 4px;
			    line-height: 20px;
			    font-size: 12px;
			    color: #909399;
			    border: 1px solid #ebeef5;
			    border-radius: 4px;
		}		
		input[type=number] {
		    -moz-appearance:textfield;
		}
		input[type=number]::-webkit-inner-spin-button,
		input[type=number]::-webkit-outer-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}
		.jump{
			margin:0 10px;
			display: inline-block;
			font-size: 15px;
			line-height: 1;
			-ms-user-select: none;
			-moz-user-select: none;
			-webkit-user-select: none;
			user-select: none;
		}
		.jump input{
			width:23px;
			height:20px;
			padding:0 5px;			
			font-size: 14px;
		}
		.jump span:first-child{
			margin-left:10px;
			padding:5px;
		}
		.jump span:first-child:hover{
			cursor: pointer;
			background-color: #EAEAEA;
		}

	</style>
</head>
<body>
	 <?php
		$arr = [];
		foreach($detail as $key=> $item){
			$arr[$key] = $item['id'];
		}
		$types = explode(',',$type);
		date_default_timezone_set('PRC');
	 ?>
	 <div class='selecte'>
		 <div class='main-left'>
				-选择来源-
		 </div>
		 <div class='box1 hide'>
			 <?php foreach($detail as $key=>$item){?>
			 <div class="<?php echo in_array($item['id'],$types) ? 'active':'cur'?>">
				<a href="<?php echo '/dataList/index?page=1&type='.(in_array($item['id'],$types) ? implode(',',array_diff($types,[$item['id']])) :(!empty($type)?$type.','.$item['id']:$item['id']))?>" ><?php echo $item['name']?></a>			 
			 </div>
			 <?php }?>		
	<!-- 		 <div class='whiteBox'>
				 <?php foreach($detail as $key=>$item){?>
					<div class='box-item' data-id="<?php echo $item['id']?>"">
					<?php if(in_array($item['id'],explode(',',$type))){?>
					 <label  for="<?php echo $item['id']?>" >	
						<input id="<?php echo $item['id']?>" checked type="checkbox" name="type" value="<?php echo $item['id']?>">
						<?php echo $item['name']?>
					 </label>
					 <?php }else{?>
					 <label  for="<?php echo $item['id']?>">
						<input id="<?php echo $item['id']?>" type="checkbox" name="type" value="<?php echo $item['id']?>">
						<?php echo $item['name']?>
					 </label>
					 <?php }?>
					 </div>
				 <?php }?>
			 </div>	 -->		
		 </div>
		 <div class='main-right rote' onclick="changeStatus()">
			 <span></span>
		 </div>
		 <div class='detele' >
			 <a href="/dataList/index?page=1&type=">
				 删
			 </a>
		 </div>
	 </div>
	<div class="main">
		<?php if($result==[]){?>
			<div class='nomore'>暂时没有更多数据啦...</div>
			<?php }else{?>
			<?php foreach($result as $item):?>
				<a href="<?php echo $item['url'];?>" target="_blank">
					<div class="box">
						<!-- <div class='title'></div> -->
						<div class="img-box">
							<img src="<?php echo $item['post'].'?'.$imgStr?>" alt="<?php echo $item['detail']?>">
						</div>
						<div class="detail-box">
							<div class="name"><?php echo $item['name']?>
								<?php if( (strtotime(date('Y-m-d H:i:s')) - strtotime($item['createDate']) < 7200 )){?>
									<img  src="/static/img/new.png" alt="">
								<?php }?>
							</div>
							<div class="detail">								
								<div class="detail-title">来源:<?php echo $item['detail']?></div>
								<div class='date'><?php echo date('m-d H:i:s',$item['date'])?></div>								
							</div>
						</div>
					</div>
				</a>
			<?php endforeach;?>
		<?php }?>
	</div>
	<div class='box'>
		<?php if($result==[]){?>
			   <div></div>
		<?php }else{?>
			  <ul class='pagination'>
				  <?php if($page==1){?>
				  <li  class='page-li page-prev'>上一页</li>
				  <?php }else{?>
				   <li  class='page-li page-prev'  onclick='prev()'>上一页</li>
				   <?php }?>
				   
				   <?php if(($count/$limit < 5)){?>			   
						<?php for($i=1;$i<=ceil($count/$limit);$i++){?>
							<?php if($page==$i){?>
								<li class='page-li page-number page-active' onclick='numberJump(this)'><?php echo $page;?></li>						
							<?php }else{?>
								<li class='page-li page-number'  onclick='numberJump(this)'><?php echo $i;?></li>
							<?php }?>
						<?php }?>
					<?php }else{?>
						<?php if($page>3){?>
							<li class='page-li number-ellipsis'>...</li>
							<?php if($page<=ceil($count/$limit)-2){?>
								<?php for($i=$page-3;$i<$page+2;$i++){?>
									<?php if($page==$i+1){?>
										<li class='page-li page-number page-active'  onclick='numberJump(this)'><?php echo $page;?></li>						
									<?php }else{?>
										<li class='page-li page-number'  onclick='numberJump(this)'><?php echo $i+1;?></li>
									<?php }?>
								<?php }?>
							<?php }else{?>
									<?php for($i=ceil($count/$limit)-4;$i<=ceil($count/$limit);$i++){?>
										<?php if($page==$i){?>
											<li class='page-li page-number page-active'  onclick='numberJump(this)'><?php echo $page;?></li>						
										<?php }else{?>
											<li class='page-li page-number'  onclick='numberJump(this)'><?php echo $i;?></li>
										<?php }?>
									<?php }?>
							<?php }?>
							<?php if($page<ceil($count/$limit)-2){?>
								<li class='page-li number-ellipsis'>...</li>
							<?php }?>
						<?php }else{?>
							<?php for($i=0;$i<=5;$i++){?>
								<?php if($page==$i+1){?>
									<li class='page-li page-number page-active'  onclick='numberJump(this)'><?php echo $page;?></li>						
								<?php }else{?>
									<li class='page-li page-number'  onclick='numberJump(this)'><?php echo $i+1;?></li>
								<?php }?>
							<?php }?>
							<li class='page-li number-ellipsis'>...</li>
						<?php }?>
				    <?php }?>
				  <?php if($page==ceil($count/$limit)){?>
				  <li class='page-li page-next'>下一页</li>
				  <?php }else{?>
				   <li class='page-li page-next'  onclick='next()'>下一页</li>
				   <?php }?>
				   <li class='jump'>
					   <span onclick='jump()'>跳转</span>
					   <input id='input' value='' type="number" onsubmit="submit" maxlength=3>		
						<span>页</span>
				   </li>
			  </ul>
		<?php }?>
	</div>
	<div class='toUp'>
		<div class=' to-top'>
			<div class='up'>UP &uarr;</div>
		</div>
	</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/simp.js');?>"></script>
<script src="<?php echo base_url('public/jquery.toTop.js');?>"></script>
<script>	
	var _count="<?php echo $count;?>"
	var _limit="<?php echo $limit;?>"
	var _type="<?php echo $type;?>"	
	var _page="<?php echo $page;?>"
	function changeStatus(){
		$('.main-right').toggleClass('rote')
		$('.box1').toggleClass('hide')
		// if($('.box1').hasClass('hide')){
		// 	$('.main-right').removeClass('rote')
		// 	$('.box1').removeClass('hide')
		// }else{
		// 	$('.box1').addClass('hide')
		// 	$('.main-right').addClass('rote')			
		// }		
	}
	function numberJump(e){
		var value=e.innerHTML
		window.location.href='/dataList/index?page='+value+'&type='+_type
	}
	function jump(){		
		var value=$('#input')[0].value
		if( value==='0' || value>Math.ceil(_count/_limit) ){return false}else{
			window.location.href='/dataList/index?page='+value+'&type='+_type
		}
	}
	function prev(){
		console.log('上一页')
		console.log(window.location.origin)	
		window.location.href='/dataList/index?page='+(getParams('page')*1-1)+'&type='+_type
	}
	function next(){
		console.log('下一页')
		console.log(window.location.origin)
		window.location.href='/dataList/index?page='+(getParams('page')*1+1)+'&type='+_type
	}
	// 地址栏参数
	function getParams(organizeCode) {
	    let search = window.location.search.replace(/^\?/, ""); 
	    // organizeCode=44030022&organizeName=%22%E9%BB%84%E5%9F%94%E7%9C%8B%E5%AE%88%E6%89%80%22
	
	    let pairs = search.split("&"); 
	    // ["organizeCode=44030022", "organizeName=%22%E9%BB%84%E5%9F%94%E7%9C%8B%E5%AE%88%E6%89%80%22"]
	
	    let paramsMap = pairs.map(pair => {
	        let [key, value] = pair.split("=");
	        return [decodeURIComponent(key), decodeURIComponent(value)];
	    }).reduce((res, [key, value]) => Object.assign(res, { [key]: value }), {});
	    // {organizeCode: "44030022", organizeName: ""黄埔看守所""}
	
	    return paramsMap[organizeCode] || ""; 
	    // 44030022
	}
	$(function(){
		if(getParams('page') % 1 !== 0){			
			window.alert('请输入正确的页码')
			setTimeout(()=>{
				window.location.href="/dataList/index?page="+1;
			},100)
		}
		$('.to-top').toTop({
		    //options with default values
		    autohide: true,  //boolean 'true' or 'false'
		    offset: 420,     //numeric value (as pixels) for scrolling length from top to hide automatically
		    speed: 500,      //numeric value (as mili-seconds) for duration		
			position:true,   //boolean 'true' or 'false'. Set this 'false' if you want to add custom position with your own css
			right: 15,       //numeric value (as pixels) for position from right. It will work only if the 'position' is set 'true'
			bottom: 30       //numeric value (as pixels) for position from bottom. It will work only if the 'position' is set 'true'
		})
	})
</script>
</html>
