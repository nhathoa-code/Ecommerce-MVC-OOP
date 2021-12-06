<?php

namespace Validation;

use Models\Model;

class Validator
{
    protected $messages = [
        'required' => 'không được để trống',
        'email' => 'email không hợp lệ',
        'min' => 'Độ dài ký tự không được nhỏ hơn :min',
        'max' => 'Độ dài ký tự không được lớn hơn :max',
        'confirmed' => 'Xác nhận không đúng',
        'unique' => 'Dữ liệu đã tồn tại'
    ];
    protected $fail = false;

    public static function make($Fields, $Rules)
    {
        $ob = new static;
        $ob->fields = $Fields;
        $ob->error = new MessageBag();
        $ob->db = new Model();
        foreach ($Rules as $field => $rules) {
            if (!in_array($field, array_keys($ob->fields)) && strpos($rules, "required") !== false) {
                $ob->fail = true;
                $ob->error->AddMessage($ob->messages["required"], $field);
                continue;
            }
            $ob->validate($field, $ob->fields[$field], $rules);
        }
        return $ob;
    }

    public function old($field)
    {
        return isset($this->fields[$field]) ? $this->fields[$field] : null;
    }

    public function errors()
    {
        return $this->error;
    }

    public function fails()
    {
        return $this->fail;
    }

    protected function validate($field, $value, $rules)
    {
        $bail = strpos($rules, "bail") !== false;
        if ($bail) {
            $rules = explode("|", $rules);
            array_shift($rules);
        } else {
            $rules = explode("|", $rules);
        }
        foreach ($rules as $rule) {
            if (strpos($rule, ":")) {
                $rul = explode(":", $rule)[0];
                $lim = explode(":", $rule)[1];
                if (strpos($rule, "except") !== false) {
                    $primary_key = isset(explode(":", $rule)[4]) ? explode(":", $rule)[4] : "id";
                    $primary_key_value = explode(":", $rule)[3];
                    if (!call_user_func_array([$this, "unique_except"], [$lim, $field, $value, $primary_key_value, $primary_key])) {
                        $this->fail = true;
                        $this->error->AddMessage($this->messages[$rul], $field);
                    }
                    continue;
                }
                if (!call_user_func_array([$this, $rul], [$value, $lim, $field])) {
                    $this->fail = true;
                    switch ($rul) {
                        case "min":
                        case "max":
                            $this->error->AddMessage(str_replace(":" . $rul, $lim, $this->messages[$rul]), $field);
                            break;
                        default:
                            $this->error->AddMessage($this->messages[$rul], $field);
                            break;
                    }
                    if ($bail) break;
                };
            } else {
                if (!call_user_func_array([$this, $rule], [$value, $field])) {
                    $this->fail = true;
                    $this->error->AddMessage($this->messages[$rule], $field);
                    if ($bail) break;
                };
            }
        }
    }


    protected function required($value)
    {
        return trim($value) !== "";
    }

    protected function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function min($value, $limit)
    {
        return strlen(trim($value)) >= $limit;
    }

    protected function max($value, $limit)
    {
        return strlen(trim($value)) <= $limit;
    }

    protected function confirmed($value, $field)
    {
        return $value == $this->fields[$field . "_confirmed"];
    }

    protected function unique($value, $table, $field)
    {
        $this->db->querybuilder = "SELECT * FROM $table WHERE $field = '$value'";
        return count($this->db->get()) > 0 ? false : true;
    }

    protected function unique_except($table, $field, $value, $primary_key_value, $primary_key)
    {
        $this->db->querybuilder = "SELECT * FROM $table WHERE $field = '$value' AND $primary_key != '$primary_key_value'";
        return count($this->db->get()) > 0 ? false : true;
    }
}
