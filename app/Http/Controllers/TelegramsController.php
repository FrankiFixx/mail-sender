<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class TelegramsController extends Controller
{
    public $update_id;
    public $id_chat;
    public $text;
    public $message_id ;
    public $first_name;
    public $last_name ;
    public $username ;
    public $isCallBack = false;
    public $language_code;
    public $callBackdata;


    // public function MessageData(Request $data){
    //     $this->update_id = $data["update_id"];
    //     if(array_key_exists('edited_message',$data)){

    //         $this->message_id = $data['edited_message']['message_id'];
    //         $this->id_chat = $data["edited_message"]['chat']['id'];
    //         $this->text = $data['edited_message']['text'];

    //         if(array_key_exists('first_name',$data['edited_message']['chat'])){
    //             $this->first_name = $data['edited_message']['chat']['first_name'];
    //         }else{
    //             $this->first_name = "Ano";
    //         }
    //         if(array_key_exists('last_name',$data['edited_message']['chat'])){
    //             $this->last_name = $data['edited_message']['chat']['last_name'];
    //         }else{
    //             $this->first_name = "nimus_".time();
    //         }
    //         if(array_key_exists('username',$data['edited_message']['chat'])){
    //             $this->username = $data['edited_message']['chat']['username'];
    //         }else{
    //             $this->username = "Anonimus_".time();
    //         }
    //     }else{
    //         $this->message_id = $data['message']['message_id'];
    //         $this->id_chat = $data["message"]['chat']['id'];
    //         if(array_key_exists('text',$data['message'])){
    //             $this->text = $data['message']['text'];
    //         }
            
    //         if(array_key_exists('first_name',$data['message']['chat'])){
    //             $this->first_name = $data['message']['chat']['first_name'];
    //         }else{
    //             $this->first_name = "Ano";
    //         }
    //         if(array_key_exists('last_name',$data['message']['chat'])){
    //             $this->last_name = $data['message']['chat']['last_name'];
    //         }else{
    //             $this->first_name = "nimus_".time();
    //         }
    //         if(array_key_exists('username',$data['message']['chat'])){
    //             $this->username = $data['message']['chat']['username'];
    //         }else{
    //             $this->username = "Anonimus_".time();
    //         }
    //     }
    //}

public function telega(Request $data){
        
        $type = !empty($data["message"]["text"]) ? $data["message"]["text"] : 'message is empty';
        $chat_id = !empty($data["chat"]["id"]) ? $data["chat"]["id"] : 'no chat id';
        $user_name = !empty($data['edited_message']['chat']['username'])? $data['edited_message']['chat']['username'] : 'no user name';
        Telegram::sendMessage([
            'chat_id' => '551178729', 
            'text' => "Hello $type",
            'disable_web_page_preview' => false,
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
          ]);

         

    }



public function botStart($data){
Telegram::sendMessage([
        'chat_id' => '551178729', 
        'text' => "Hello $type",
        'disable_web_page_preview' => false,
        'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
      ]);

    $keyboard = array(
        array(
           array('text'=>':like:','callback_data'=>'{"action":"like","count":0,"text":":like:"}'),
           array('text'=>':joy:','callback_data'=>'{"action":"joy","count":0,"text":":joy:"}'),
           array('text'=>':hushed:','callback_data'=>'{"action":"hushed","count":0,"text":":hushed:"}'),
           array('text'=>':cry:','callback_data'=>'{"action":"cry","count":0,"text":":cry:"}'),
           array('text'=>':rage:','callback_data'=>'{"action":"rage","count":0,"text":":rage:"}')
        )
     );

    Telegram::sendMessage([
        'chat_id' => '551178729', 
        'text' => "Hello $type",
        'disable_web_page_preview' => false,
        'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
      ]);
}

}