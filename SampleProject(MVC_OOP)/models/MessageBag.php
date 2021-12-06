<?php

namespace Validation;

class MessageBag
{
    protected $Errors = [];

    public function AddMessage($error, $field)
    {
        $this->Errors[$field][] = $error;
    }

    public function any()
    {
        return count($this->Errors) > 0;
    }

    public function all()
    {
        $arr = [];
        foreach (array_values($this->Errors) as $element) {
            $arr = array_merge($arr, $element);
        }
        return $arr;
    }

    public function has($field)
    {
        return isset($this->Errors[$field]);
    }

    public function get($field)
    {
        return $this->Errors[$field];
    }

    public function first($field)
    {
        return $this->Errors[$field][0];
    }
}
