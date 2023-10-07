<?php

$title = "Notify All";
$body = "This is notification !";

$firebaseApi = "AAAAmRvjxsE:APA91bEqtSKKniy8F3B6SH-R5zNMDhY091oDn1bcMCeT0MmsWwcVygeEs_qQHjcuB6ToZu6VdXN2HFktr2EdqqCTkjXn9rTXGpjGgVO0FeKoAz3g1Y5-0MIz5UPRO_KaH2Hu8f6squtB";

$topic = "ALL";

$fields = array (
    'to' => '/topics/' . $topic,
    'notification' => array (
        "title" => $title,
        "body" => $body,
        "action" => "url",
        "action_destination" => "https://www.google.com"
    )
);

$url = 'https://fcm.googleapis.com/fcm/send';

$headers = array('Authorization: key=' . $firebaseApi, 'Content-Type: application/json');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

$result = curl_exec($ch);
if ($result === FALSE) {
    die('Curl failed: ' . curl_error($ch));
}
curl_close($ch);

echo '<p><pre>';
echo json_encode($fields, JSON_PRETTY_PRINT);
echo '</pre></p><p><pre>';
echo $result;
echo '</pre></p>';

?>


