<?php
session_start();
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blackless(2)";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'A') {
    header("location: login.php");
    exit();
}

// Fetch open messages
$sql_fetch_open_messages = "SELECT m.message_id, m.message, m.date_sent, 
                                   u.user_id, u.user_name
                            FROM messages AS m
                            JOIN users AS u ON m.user_id = u.user_id
                            WHERE m.status = 'open'
                            ORDER BY m.date_sent ASC";
$result_open_messages = mysqli_query($conn, $sql_fetch_open_messages);

// Fetch closed messages
$sql_fetch_closed_messages = "SELECT m.message_id, m.message, m.date_sent, 
                                     u.user_id, u.user_name, r.reply_text
                              FROM messages AS m
                              JOIN users AS u ON m.user_id = u.user_id
                              JOIN admin_replies AS r ON m.message_id = r.message_id
                              WHERE m.status = 'closed'
                              ORDER BY m.date_sent DESC";
$result_closed_messages = mysqli_query($conn, $sql_fetch_closed_messages);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body
        {
            background-color: rgb(253, 231, 201);
        }
        .message-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #c2a97c;
            background-color: white;
            border-radius: 5px;

        }
        .message {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .message .username {
            font-weight: bold;
        }
        .message .timestamp {
            font-size: 0.8em;
            color: #4c3228;
        }
        .reply-form {
            margin-top: 20px;
        }
        .reply-form textarea {
            width: 100%;
            height: 60px;
            margin-bottom: 10px;
            color: #4c3228;
        }
        .reply-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #cfb690;
        }
        .closed-message {
            background-color: #f9f9f9;
        }
        .closed-message .reply-text {
            margin-top: 10px;
            padding: 10px;
            background-color: #e9e9e9;
        }
        .delete-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>
<div class="message-container">
    <h2>Open Messages from Users</h2>
    <?php while ($message = mysqli_fetch_assoc($result_open_messages)) { ?>
        <div class="message">
            <div class="username"><?php echo htmlspecialchars($message['user_name']); ?>:</div>
            <div class="text"><?php echo htmlspecialchars($message['message']); ?></div>
            <div class="timestamp"><?php echo $message['date_sent']; ?></div>
            <form class="reply-form" action="A_message_process.php" method="post">
                <textarea name="reply_text" required></textarea>
                <input type="hidden" name="message_id" value="<?php echo $message['message_id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $message['user_id']; ?>">
                <input type="submit" value="Reply">
            </form>
        </div>
    <?php } ?>
</div>

<div class="message-container">
    <h2>Closed Messages</h2>
    <?php while ($message = mysqli_fetch_assoc($result_closed_messages)) { ?>
        <div class="message closed-message">
            <div class="username"><?php echo htmlspecialchars($message['user_name']); ?>:</div>
            <div class="text"><?php echo htmlspecialchars($message['message']); ?></div>
            <div class="timestamp"><?php echo $message['date_sent']; ?></div>
            <div class="reply-text">Reply: <?php echo htmlspecialchars($message['reply_text']); ?></div>
            <form action="delete_message.php" method="post">
                <input type="hidden" name="message_id" value="<?php echo $message['message_id']; ?>">
                <input type="submit" class="delete-button" value="Delete">
            </form>
        </div>
    <?php } ?>
</div>
</body>
</html>