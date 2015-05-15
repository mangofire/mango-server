<!DOCTYPE html>
<html lang='zh-CN'>
<head>
	<title>Mango</title>
	<meta charset='utf-8'>
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">
	body{
		font-size: 18px;
	}
	header{
		text-align: center;
		position: absolute;
		top: 0;
		left: 0;
		width: 14%;
		color: #fff;
	}
	a,a:hover{
		color: #fff;
	}
	.container-fluid a,.container-fluid a:hover{
		color: #000;
		text-decoration: none;
	}
	ul{
		display: inline;
	}
	li{
		margin: 50px 0;
		display: block;
	}
	li:hover{
		cursor: pointer;
	}
	/*MSG*/
	.container-fluid .box{
		position: relative;
		border: 0px solid red;
		overflow-y: scroll;
		overflow-x:hidden;
	}
	.container-fluid .box ul{
	}
	.container-fluid .box ul li{
		display: block;
	}
	h1{
		margin: 0;
	}
	.container-fluid{
		position: absolute;
		right: 0;
		top: 0;
		width: 86%;
		padding: 0;
		color: #000;
		overflow: hidden;
	}
	.bd{
		border: 1px solid red;
	}
	#ChatPanel .body {
		padding: 10px 30px;
	}
	.SMSleft{
		width: 100%;
		padding-right: 55%;
		display: block;
		
	}
	.SMSleft .for-bg{
		background-color: #eee;
	}
	.SMSright{
		width: 100%;
		padding-left: 55%;
		display: block;
		text-align: right;
	}
	.SMSright .for-bg{
		background-color: #999;
		padding: 20px 10px;
	}
	.chathead{
		position: fixed;
		top: 0;
		right: 0;
		width: 86%;
		background-color: #6bc;
		padding: 14px;
		text-align: center;
		font-size: 1.3em;
	}
	.glyphicon{
		font-size: 1.3em;
		margin-left: 30px;
	}
	#SMS h1, #Contacts h1, #Records h1{
		background-color: #33FFCC;
		text-align: center;
		padding: 20px;
	}
	#SMSUL li{
		margin: 0 !important;
		border:1px solid #eee;
	}
	#SMSUL li p{
		padding: 28px 20px;
	}
	#SMS ul{
		padding: 0 !important;
	}
	#ChatPanel .body{
		margin-top: 24px;
	}
	#ChatSend{
		width: 100%;
	}
	#ContactUI{
		width: 80%;
		height: 600px;
		overflow: scroll;
		margin: 20px 36px;
	}
	#ContactUI li{
		border: 1px solid #eee;
	}
	#searchDiv{
		margin: 10px;
	}
	#Default{
		background-image: url("/public/img/pages/beauty.jpg");
		/*background-image: url("/img/pages/avds.jpg");*/
		background-position: center;
	}
	#Default2{
		display: inline-block;
		width: 1em;
		margin: 18px;
		position: absolute;
		top: 20%;
		left: 6%;
		font-weight: 600;
	}
	#Default3{
		display: inline-block;
		width: 1em;
		margin: 18px;
		position: absolute;
		top: 46%;
		left: 8%;
		font-weight: 600;
	}
	#Default1{
		width: 1em;
		margin: 28px;
		position: absolute;
		top:10%;
		font-weight: 600;
		right: 24%;
	}
	#RecordsPanel{
		width: 100%;
		padding 10%;
	}
	#RecordsPanel li span{
		display: inline-block;
		width: 15%;
		text-align: center;
	}
	#RecordsPanel li{
		padding: 20px;
		border: 1px solid #eee ;
		margin: 0;
	}
	.ssend{
		display: none;
	}
	</style>
</head>
<body>
	<header class='navbar-inverse'>
		<ul class="">
			<li name='Default'>首页</li>
			<li name='SMS'>短信</li>
			<li name='Contacts'>联系人</li>
			<li name='Records'>通话记录</li>
		</ul>
	</header>

	<div class="container-fluid" id="main">
		<div class="box" id="Default">
			<h1 id="Default1">跨越千山万水的亲切声音</h1>
			<h1 id="Default2">随时随地</h1>
			<h1 id="Default3">爽快收发</h1>
		</div>

		<div class="box" id="SMS">
			<h1>沟通, 随时随地</h1>
			<ul id="SMSUL">
			</ul>
		</div>

		<div class="box" id="Contacts">
			<h1>乐在沟通</h1>
			<div id="searchDiv">
				<input type="text" id="search-box" class="form-control" placeholder='输入关键字'>
			</div>
			<table class="table" id="ContactUI">
				<thead>
					<tr>
						<td>#</td>
						<td>姓名</td>
						<td>手机号</td>
						<td>发短信</td>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>

		<div class="box" id="Records">
			<h1>家人、恋人、朋友，更多关怀</h1>
			<div id="RecordsPanel">
				<ul class="">
				</ul>
			</div>
		</div>

		<div class="box" id="ChatPanel">
			<div class="chathead">
				<span id='chatphone'><span id='phone'></span><span id='ChatPanelSend' title='发短信' class='glyphicon glyphicon-edit'></span></span>
			</div>
			<div class="body">
				
			</div>
		</div>

		<div id="ChatPanelSendModal" class="modal fade">
		<div class="modal-dialog modal-content">
			<div class="modal-header">
		      <h4 class="modal-title"></h4>
		    </div>
		    <div class="modal-body">
		      <textarea id="ChatSend" rows="4">
		      	
		      </textarea>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		      <button type="button" id='MSGSendBtn' class="btn btn-primary">发送</button>
		    </div>
		</div>
		</div>
	</div>
<!-- test script -->
<script type="text/javascript">

	/*easemob*/
	var apiURL = null;
	var curUserId = null;
	var conn = null;
	var bothRoster = [];
	var toRoster = [];
	var appkey = "vampirezzq#mango";

	var header_height = window.innerHeight - $("footer").height();
	var SMSOBJ = null;
	var ContactOBJ = null;
	var RecordOBJ = null;
	var activePage = 'Default';
	var currentDefault = true;
	$("#Default2").hide();
	$("#Default3").hide();

	$("header").height(header_height);
	$("container-fluid").height(header_height);
	$(".box").height(header_height);
	$("#main").children().hide();
	$("#main").children().first().show();
	$("header ul").children().each(function(){
		$(this).click(function(){
			var name = $(this).attr('name');
			showPage(name);
		});
	});
	/*
	*	每隔3秒 切换一次首页图片
	*/
	function SwitchDefault(){
		if(currentDefault){
			$('#Default').css("background-image", "url('/public/img/pages/avds.jpg')");
			$('#Default1').hide();
			$('#Default2').show();
			$('#Default3').show();
			currentDefault = false;
			return ;
		}else{
			$("#Default").css("background-image", "url('/public/img/pages/beauty.jpg')");
			$('#Default2').hide();
			$('#Default3').hide();
			$('#Default1').show();
			currentDefault = true;
			return;
		}
	}
	setInterval('SwitchDefault()', 7000);
	//alert(header_height);
	function showPage(id){
		$("#main").children().hide();
		$("#"+id).show();
		activePage = id;
		switch (id){
			case 'SMS':
				if(SMSOBJ != null){
					break;
				}
				$.ajax({
					url : 'http://localhost:8000/api/SMS/all',
					success : function(data){
						SMSOBJ = JSON.parse(data);
						for (im in SMSOBJ){
							var length = SMSOBJ[im].length-1;
							$("#SMSUL").append("<li id="+im+"><p>"+im+"&nbsp&nbsp&nbsp&nbsp"+SMSOBJ[im][length].time+"<br><small>"+SMSOBJ[im][length].content+"</small></p></li>");
						}
						$("#main #SMS li").click(function(){
							var pt = $(this).attr('id');
							ShowChatPanel(pt);
						});
					}
				});
				break;
			case 'Contacts':
				if(ContactOBJ != null){
					break;
				}
				$.ajax({
					url : 'http://localhost:8000/api/contact/all?uid='+4,
					success : function(data){
						ContactOBJ = JSON.parse(data);
						for(im in ContactOBJ){
							// console.log(ContactOBJ[im]);
							$("#ContactUI tbody").append("<tr>"+
								"<td><input type='checkbox'></td>"+
								"<td>"+ContactOBJ[im].name+"</td>"+
								"<td>"+ContactOBJ[im].mobile+"</td>"+
								"<td><span class='btn btn-default' name="+ContactOBJ[im].name+">发短信</span></td>"+
								"</tr>");
						}
						$("#ContactUI tbody .btn").click(function(){
							var name = $(this).attr('name');
							$("#ChatPanelSendModal").modal('show');
							$("#ChatPanelSendModal").find(".modal-header .modal-title")
							.html("给"+name+"发送信息");
						});
					}
				});
				break;
			case 'Records':
				if(RecordOBJ != null){
					break;
				}
				$.ajax({
					url : 'http://localhost:8000/api/record/all',
					success : function(data){
						RecordOBJ = JSON.parse(data);
						for(ib in RecordOBJ){
							// console.log(RecordOBJ[ib]);
							$("#RecordsPanel ul").append("<li>"+
								"<span>"+RecordOBJ[ib].type+"</span>"+
								"<span>"+RecordOBJ[ib].name+"</span>"+
								"<span>"+RecordOBJ[ib].mobile+"</span>"+
								"<span>"+RecordOBJ[ib].time+"</span>"+
								"<span>"+RecordOBJ[ib].howlong+"</span>"+
								"<span class='ssend'><button class='btn btn-default'>发短信</button></span>"+
								"</li>");
						}
						$("#RecordsPanel ul li").find('.ssend').hide();
						$("#RecordsPanel ul li").find('.ssend').click(function(){
							$("#ChatPanelSendModal").modal('show');
							name = "";
							phone = $(this).prev().prev().prev().html();
							name = $(this).prev().prev().prev().prev().html();
							if(name != '未命名' && name != ""){
								$("#ChatPanelSendModal").find(".modal-header .modal-title").html("给"+
								name+"发送信息");
							}else{
								$("#ChatPanelSendModal").find(".modal-header .modal-title").html("给"+
								phone+"发送信息");
							}
							
						});
						$("#RecordsPanel ul li").mouseover(function(){
							$(this).find(".ssend").show();
							// alert('hover');
						});
						$("#RecordsPanel ul li").mouseout(function(){
							$(this).children('.ssend').hide();
						});
					}
				});
				$("#RecordsPanel ul li").mouseover(function(){
					alert('hover');
				});
				break;
		}
		
	}
	

	$("#ChatPanelSend").click(function(){
		$("#ChatPanelSendModal").modal('show');
		$("#ChatPanelSendModal").find(".modal-header .modal-title").html("给"+$(this).prev().html()+"发送信息");
	});

	$("#MSGSendBtn").click(function(){
		var mhu = $("#ChatSend").val();
		alert(mhu);
		easeSend(mhu);
		$("#ChatPanelSendModal").modal('hide');
	});

	function ShowChatPanel(phone){
		$("#"+activePage).hide();
		$("#ChatPanel").show();
		$("#chatphone #phone").html(phone);
		$("#ChatPanel .body").html("");
		for(smo in SMSOBJ[phone]){
			if(SMSOBJ[phone][smo].type == 1){
				//收到
				$("#ChatPanel .body").append("<li class='SMSleft'><div class='for-bg'>"+SMSOBJ[phone][smo].content+"</div></li>");
			}else{
				//发送
				$("#ChatPanel .body").append("<li class='SMSright'><div class='for-bg'>"+SMSOBJ[phone][smo].content+"</div></li>");

			}
		}
	}

	var handleTextMessage = function(message) {
		var from = message.from;//消息的发送者
		var mestype = message.type;//消息发送的类型是群组消息还是个人消息
		var messageContent = message.data;//文本消息体
		//TODO  根据消息体的to值去定位那个群组的聊天记录
		var room = message.to;
		alert('收到一个来自'+from+'的消息:'+messageContent);
	};

	var handleOpen = function(conn){
		curUserId = conn.context.userId;
		alert('登陆成功'+curUserId);
		conn.getRoster({
			success : function(roster) {
				var curroster;
				for ( var i in roster) {
					var ros = roster[i];
					//both为双方互为好友，要显示的联系人,from我是对方的单向好友
					if (ros.subscription == 'both'
							|| ros.subscription == 'from') {
						bothRoster.push(ros);
					} else if (ros.subscription == 'to') {
						//to表明了联系人是我的单向好友
						toRoster.push(ros);
					}
				}
				conn.listRooms({
					success : function(rooms) {
						conn.setPresence();//设置用户上线状态，必须调用
					},
					error : function(e) {
					}
				});
			}
		});
	}
	var handleClosed = function(){
		alert('已经退出');
	}

	var handleRoster = function(rosterMsg) {
		for (var i = 0; i < rosterMsg.length; i++) {
			var contact = rosterMsg[i];
			alert("handleRoster"+contact.name);
		}
	};

	var handleError = function(e) {
		if (curUserId == null) {
			alert(e.msg + ",请重新登录");
		} else {
			var msg = e.msg;
			if (e.type == EASEMOB_IM_CONNCTION_SERVER_CLOSE_ERROR) {
				if (msg == "" || msg == 'unknown' ) {
					alert("服务器器断开连接,可能是因为在别处登录");
				} else {
					alert("服务器器断开连接");
				}
			} else {
				alert(msg);
			}
		}
	};


	function easeLogin(user,pwd){
		conn.open({
			user : '001',
			pwd : 'zhangzhiqiang',
			//连接时提供appkey
			appKey : appkey
		//accessToken : 'YWMt8bfZfFk5EeSiAzsQ0OXu4QAAAUpoZFOMJ66ic5m2LOZRhYUsRKZWINA06HI'
		});
	}

	function easeLogout(){
		conn.close();
	}

	function easeSend(msg){
		var options = {
			to : '001mobile',
			msg : 'hello wlorld '+msg,
			type : "chat"
		};
		conn.sendTextMessage(options);
		alert('成功发送一个消息');
	}

	function InitEase(){
		conn = new Easemob.im.Connection();
		conn.init({
			https : false,
			//当连接成功时的回调方法
			onOpened : function() {
				handleOpen(conn);
			},
			//当连接关闭时的回调方法
			onClosed : function() {
				handleClosed();
			},
			//收到文本消息时的回调方法
			onTextMessage : function(message) {
				handleTextMessage(message);
			},
			//收到表情消息时的回调方法
			onEmotionMessage : function(message) {
				// handleEmotion(message);
			},
			//收到图片消息时的回调方法
			onPictureMessage : function(message) {
				// handlePictureMessage(message);
			},
			//收到音频消息的回调方法
			onAudioMessage : function(message) {
				// handleAudioMessage(message);
			},
			//收到位置消息的回调方法
			onLocationMessage : function(message) {
				// handleLocationMessage(message);
			},
			//收到文件消息的回调方法
			onFileMessage : function(message) {
				// handleFileMessage(message);
			},
			//收到视频消息的回调方法
			onVideoMessage : function(message) {
				// handleVideoMessage(message);
			},
			//收到联系人订阅请求的回调方法
			onPresence : function(message) {
				// handlePresence(message);
			},
			//收到联系人信息的回调方法
			onRoster : function(message) {
				handleRoster(message);
			},
			//收到群组邀请时的回调方法
			onInviteMessage : function(message) {
				// handleInviteMessage(message);
			},
			//异常时的回调方法
			onError : function(message) {
				handleError(message);
			}
		});
		easeLogin();
	}

	$(document).ready(function(){
		InitEase();
	});
	//alert(document.body.clientWidth);//1349
	// alert(document.body.offsetHeight);
	// if(window.innerHeight >= document.body.clientHeight){
	// 	$(".footer").addClass('navbar-fixed-bottom');
	// }
	//alert(window.innerHeight);//667
	//alert(document.body.clientHeight);
	//alert($(".footer").height());//45
	//alert($("header").height());//50
	//可用高度 667 - 95 = 562
	// alert($(".container-fluid").height());
</script>
<!-- easemob script -->
<script type="text/javascript" src="/public/easemob/strophe-custom-2.0.0.js"></script>
<script type="text/javascript" src="/public/easemob/easemob.im-1.0.5.js"></script>
<script type="text/javascript" src="/public/easemob/json2.js"></script>
</body>
</html>