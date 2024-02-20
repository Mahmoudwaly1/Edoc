<!doctype html>
<html>
<head>
	<title>Chat Page</title>
	<style>
		#messages {
			height: 200px;
			overflow-y: scroll;
		}
	</style>
</head>
<body>
	<div id="messages"></div>
	<input type="text" id="message" placeholder="Type your message here...">
	<button id="send">Send</button>
	<script>
		var socket = new WebSocket("ws://localhost:8080/chat");
		var messages = document.getElementById("messages");
		var message = document.getElementById("message");
		var send = document.getElementById("send");

		socket.onmessage = function(event) {
			var messageElement = document.createElement("div");
			messageElement.innerHTML = event.data;
			messages.appendChild(messageElement);
		};

		send.addEventListener("click", function() {
			socket.send(message.value);
			message.value = "";
		});
	</script>
</body>
</html>