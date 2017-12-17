<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="shortcut icon" href="http://www.yoursite.com/" />
	<style>
		#chat-area {
			height: 100%;
			width: 100%;
		}
		
		.input-group {
			position: fixed;
			bottom: 0;
			left: 0;
		}
	</style> 
</head>

<body>
<?php
include '../config/connection.php';
session_start();

if ($_SESSION['level'] == 2) {
	$id_live = $_GET['id_live'];

	$sql = "SELECT
			t.id_user,
			t.id_doctor,
			u.NAME as dari
		FROM
			live_chat t
			JOIN users u ON u.id_user = t.id_user 
		WHERE
			t.id_live_chat = '$id_live' AND u.level != 2";
	$query = mysql_query($sql);
	$data = mysql_fetch_assoc($query);
} elseif ($_SESSION['level'] == 3) {
	$id_dokter = $_GET['id_doctor'];
	$id_user = $_SESSION['id_user'];

	$sql = "SELECT
			t.id_live_chat,
			t.id_user,
			t.id_doctor,
			u.NAME as dari
		FROM
			live_chat t
		JOIN users u ON u.id_user = t.id_doctor
		WHERE
			t.id_user = '$id_user' AND t.id_doctor = '$id_dokter'";
	$query = mysql_query($sql);
	$data = mysql_fetch_assoc($query);
}

$idLive = ($_SESSION['level'] == 2) ? $_GET['id_live'] : $data['id_live_chat'];

?>
<div class="col-md-9 f_car">
	<div class="panel-heading">
		<div class="panel-title">
			<h3>Chat</h3>
			<hr>
		</div>
	</div>
	<div id="chat-area">
		<ul class="list-group">
		</ul>
	</div>
	<form id="chat-form">
		<div class="input-group">
			<input type="text" id="id_live" value="<?= $idLive ?>">
			<input type="text" id="from" value="<?= $data['dari'] ?>">
			<input type="text" id="me" value="<?= $_SESSION['name'] ?>">
			<input id="message" type="text" autocomplete="off" class="form-control" placeholder="Enter your message...">
			<span class="input-group-btn">
			<input class="btn btn-primary" type="submit" value="Send">
		</span>
		</div>
	</form>
</div>
	<script>
		var conn = new WebSocket('ws://localhost:3000');
		conn.onopen = function (e) {
			console.log("Connection established!");
		};

		conn.onmessage = function (e) {
			var from = document.querySelector('#from').value;			
			showMessage(e.data, from);
		};

		document.querySelector('#chat-form').addEventListener('submit', function (e) {
			e.preventDefault();

			var messageElement = document.querySelector('#message');
			var idLive = document.querySelector('#id_live').value;
			var me = document.querySelector('#me').value;
			var message = messageElement.value;
			console.log(idLive)
			var messageData = {
				'id': '',
				'id_live_chat': idLive,
				'chat': message
			}
			var messageDataJson = JSON.stringify(messageData);

			conn.send(JSON.stringify(messageDataJson));
			showMessage(message, me);
			messageElement.value = '';
		});

		function showMessage(msg, sender) {
			var messageItem = document.createElement('li');
			var className = 'list-group-item';
			
			if (messageItem.classList) 
				messageItem.classList.add(className); 
			else 
				messageItem.className += ' ' + className;

			messageItem.innerHTML = '<strong>' + sender + ': </strong>' + msg;	
			document.querySelector('#chat-area > ul').appendChild(messageItem);
		}
	</script>
</body>

</html>