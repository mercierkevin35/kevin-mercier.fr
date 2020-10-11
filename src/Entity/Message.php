<?php

namespace App\Entity;

class Message {
    protected $from;
    protected $to;
    protected $message;
    protected $subject;

    public function getFrom(){
        return $this->from;
    }

    public function setFrom($email){
        $this->from = $email;
    }

    public function getTo(){
        return $this->to;
    }

    public function setTo($email){
        $this->to = $email;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getSubject(){
        return $this->message;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

}