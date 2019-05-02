<?php namespace Wallforms;

interface InputEntity
{
    static function inputFields();

    static function inputValidators();
}
