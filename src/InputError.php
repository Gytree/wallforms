<?php namespace Wallforms;

use FormManager\Node;

class InputError extends Node
{
    public function __construct($message)
    {
        parent::__construct('div', ['class' => 'error bg-danger']);
        $this->innerHTML = $message;
    }
}
