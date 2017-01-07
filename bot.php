<?php
$access_token = 'yJ0gNoR1OR5PlMtLhfJG7rPnlgp55CNEocKN0MpRKOCq7QEigwE+wbCBN9vl2tQ5wC+SxBtjreOi6u7bjT0vqsO4cx7PeGm4oVZFqN6sL7FUJacYjFWDxfSWDs50timRTLl7dnncvewjvh8JnbcIFgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'สวัสดีครับพี่น้องชาวโลก'
			];
			//check world 
			if($text = "ควย")
			{
				$messages = [
				'type' => 'text',
				'text' => 'กรุณาใช้คำสุภาพ ด้วยครับ'
			];
			}
			/*$messages = [
				  'type:' =>'sticker',
				  'packageId'=> '1',
				  'stickerId'=> '1'
				  ];*/
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
