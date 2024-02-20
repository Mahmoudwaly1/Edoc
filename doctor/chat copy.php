<?php
require 'config.php';


?>


<DOCTYPE html>
<head>
<link rel="stylesheet" href="2.css">
</head>
<body>
    

<div class="chat-box">
  <div class="chat-header">
    <h2>Chat</h2>
  </div>
  <div class="chat-messages">
    <?php

      // عرض الرسائل الموجودة في قاعدة البيانات
      
      $result = mysqli_query($conn, "SELECT * FROM messages ORDER BY id aSC");
      while($row = mysqli_fetch_assoc($result)) {
        $message = $row['message'];
        $sender = $row['sender'];
        $time = $row['time'];
        echo "<div class='message'>";
        echo "<p class='message-text'>$message</p>";
        echo "<span class='message-sender'>$sender</span>";
        echo "<span class='message-time'>$time</span>";
        echo "</div>";
      }
      mysqli_close($conn);
    ?>
  </div>
  <div class="chat-input">
    <form method="post" action="send-message.php">
      <input type="hidden" name="sender" value="User1">
      <input type="text" name="message" placeholder="Type your message...">
      <button type="submit">Send</button>
    </form>
  </div>
</div>








</body>
</html>

