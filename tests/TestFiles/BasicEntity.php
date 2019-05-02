<?php

class BasicEntity implements \Wallforms\InputEntity
{

    static function inputFields()
    {
        return [
            'name' => [
                'id' => 'name',
                'type' => 'text',
            ],
            'phone' => [
                'type' => 'number'
            ],
        ];
    }

    static function inputValidators()
    {
        // TODO: Implement inputValidators() method.
    }
}