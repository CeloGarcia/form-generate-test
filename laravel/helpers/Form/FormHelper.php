<?php


class FormHelper {

    public $attributes;
    public $actions;

    public function __construct($attributes, $actions)
    {
        $this->attributes = $attributes;
        $this->actions = $actions;
    }
}
