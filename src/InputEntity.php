<?php namespace Wallforms;

interface InputEntity
{
    public function inputFields(): array;

    public function inputValidators();
}
