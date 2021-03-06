<!DOCTYPE html>
<html lang='zh-CN'>
<head>
	<title>test</title>
	<meta charset='utf-8'>
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="/easesdk/jquery-1.11.1.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<!-- easemob script -->
	<script type="text/javascript" src="/easesdk/strophe-custom-2.0.0.js"></script>
	<script type="text/javascript" src="/easesdk/easemob.im-1.0.5.js"></script>
	<script type="text/javascript" src="/easesdk/json2.js"></script>

<script type="text/javascript">
	var apiURL = null;
	var curUserId = null;
	var conn = null;
	var bothRoster = [];
	var toRoster = [];
	var appkey = "vampirezzq#mango";

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

	var handleError = function(e) {
		if (curUserId == null) {
			hiddenWaitLoginedUI();
			alert(e.msg + ",请重新登录");
			showLoginUI();
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

	var handleRoster = function(rosterMsg) {
		for (var i = 0; i < rosterMsg.length; i++) {
			var contact = rosterMsg[i];
			alert("handleRoster"+contact.name);
		}
	};
	$(document).ready(function(){
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

	$("#loginbtn").click(function(){
		conn.open({
			user : '001',
			pwd : 'zhangzhiqiang',
			//连接时提供appkey
			appKey : appkey
		//accessToken : 'YWMt8bfZfFk5EeSiAzsQ0OXu4QAAAUpoZFOMJ66ic5m2LOZRhYUsRKZWINA06HI'
		});
	});

	$("#logout").click(function(){
		conn.close();
	});

	$("#send").click(function(){
		var options = {
			to : '001mobile',
			msg : 'hello wlorld 002',
			type : "chat"
		};
		conn.sendTextMessage(options);
		alert('成功发送一个消息');
	});
	});
</script>
</head>
<body>
	<button id="loginbtn">登陆</button>
	<button id="send">发送</button>
	<button id="logout">退出</button>
	<script type="text/javascript">
	</script>
</body>
</html>