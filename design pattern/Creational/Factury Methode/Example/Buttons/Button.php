<?php
namespace App\Buttons;

abstract class Button
{
    abstract public function show():string;
    abstract public function click():void;
}