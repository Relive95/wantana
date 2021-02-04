<?php



require "vendor/autoload.php";

$access_token = '5o05EX0TrUOd/7U1ZyW5FUFMkCXgOipLkZaXa2IpE85WR9IJgQ9xflvOM/9EozfB1J+tTDzq9A1E0KuEO1qysCiGFTX6cK7OegDFv6EEnPOm0jDn/eF+bR2Y9ykeUF1O+ed8WJ5YOii9YCBW3vFX/QdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'adae61a8b61f3dff08746971448a586c';

$pushID = 'Ud1455ddc6fd48b258325da64daf78c70';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







