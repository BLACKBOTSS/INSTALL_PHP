<?php
$settings = json_decode(file_get_contents("settings.json"),true);
if (!$settings['Token']){
$tokenbot =  readline("- Enter Token bot => ");
$settings['Token'] = $tokenbot;
file_put_contents("settings.json",json_encode($settings,128|32|256));
}
if (!$settings['sudo']) {
$idsudo = readline("- Enter iD sudo => ");
$settings['sudo'] = $idsudo;
file_put_contents("settings.json",json_encode($settings,128|32|256));
}
$admin = $settings['sudo'];
$API_KEY = $settings['Token'];
define('API_KEY',$token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res,true);
}
}
$LastUpdates = 1; 
while(true){ 
$getUpdates = bot("getUpdates",[
"offset"=>$LastUpdates,
]); 
if(isset($getUpdates['result'][0])){ 
#start
$text = $getUpdates['result'][0]['message']['text']; 
$chat_id = $getUpdates['result'][0]['message']['chat']['id']; 
$from_id = $getUpdates['result'][0]['message']['from']['id']; 
$message = $getUpdates['result'][0]['message']; 
if($text == '/start'){
bot('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"hi",
'parse_mode' => "MarkDown",
]);
}

#end
$LastUpdates = $getUpdates['result'][0]['update_id'] + 1; 
}
}
