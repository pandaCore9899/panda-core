<?php

namespace App\Utils;

class MessageManager
{

    private $error_messages = null;
    private $success_messages = null;

    public function __construct()
    {
        $this->error_messages = collect();
        $this->success_messages = collect();
    }

    public function getErrorMessages()
    {
        return $this->error_messages;
    }

    public function getSuccessMessages()
    {
        return $this->success_messages;
    }

    public function addErrorMsg($msg)
    {
        $this->error_messages->push($msg);
    }

    public function addSuccessMsg($msg)
    {
        $this->success_messages->push($msg);
    }

    public function all(){
        return collect(array_merge($this->error_messages->toArray(),$this->success_messages->toArray()));
    }


}
