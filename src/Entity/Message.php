<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class Message {
    /**
     * @Assert\Email(
     *     message = "L'adresse email {{ value }} n'est pas valide"
     * )
     * 
     * 
     * @Assert\NotBlank(
     *  message = "Ce champ est requis"
     * )
     */
    protected $from;
    protected $to;

    /**
     * @Assert\NotBlank(
     *  message = "Ce champ est requis"
     * )
     */
    protected $message;

    /**
     * @Assert\NotBlank(
     *  message = "Ce champ est requis"
     * )
     */
    protected $subject;

    public function getFrom(){
        return $this->from;
    }

    public function setFrom($email){
        $this->from = htmlspecialchars($email);
    }

    public function getTo(){
        return $this->to;
    }

    public function setTo($email){
        $this->to = htmlspecialchars($email);
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = htmlspecialchars($message);
    }

    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($subject){
        $this->subject = htmlspecialchars($subject);
    }

    public function escapeVars(){
        foreach($this as $prop => $value){
            $method = "set" . ucfirst($prop);
            $this->$method($value);
        }
    }

}