<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\DatabaseManager;

use DB;

class mailSenderController extends Controller
{

    public $emailFrom  = 'ilyuxa252@gmail.com';
    public $emailTo;
    public $messagesPerMinute = 1;
    public $request;

    public function sendMails(){// основной метод вызываемый в роуте, и отправляет письма
        $this->request = DB::table('lead_ct')->select('email', 'lead_num')->get(); 
        
        $sendedEmails = $this->checkSendedEmails();
            if($sendedEmails == 'no-sendings'){
                $mpm = $this->messagesPerMinute;
                for($i = 0; $i < $mpm; $i++){
                    $this->insertEmailsInDB($i);
                    $this->sendOneMail();
             }
            }else{
                $req = DB::table('sended_emails')->select('id')->orderBy('id', 'desc')->limit(1)->get();
                $id  = $req[0]->id;
                $dif = $id + $this->messagesPerMinute;
            
            for($i = $id; $i < $dif; $i++){
                    $this->insertEmailsInDB($i);
                    $this->sendOneMail();
            }
         }
         echo "$this->messagesPerMinute sended";
    }

    public function sendOneMail(){ // метод отправляющий письма на нужные почты
        Mail::send(['text' => 'mail'], ['name' => 'test exercise'], function($message){
            $message->to($this->emailTo, 'test exercise')->subject('Test mail');
            $message->from($this->emailFrom, 'test exercice');
        });
    }

    public function checkSendedEmails(){ // метод проверяющий, есть ли в базе отправленных писем, отправленные письма
        $request = DB::table('sended_emails')->select('id', 'email', 'iteration')->distinct()->get();
        if(count($request)==0){
            DB::statement('ALTER TABLE sended_emails AUTO_INCREMENT = 1');
            return 'no-sendings';
        }else{
            return 'ok';
        }
    }

    public function insertEmailsInDB($i){
        DB::table('sended_emails')->insert(['email' => $this->request[$i]->email, 'iteration' => $this->request[$i]->lead_num]);
        $this->emailTo = $this->request[$i]->email;
    }
}
