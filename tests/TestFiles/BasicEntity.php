<?php

class BasicEntity implements \Wallforms\InputEntity
{

    public function inputFields(): array
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

    public function inputValidators()
    {
        // TODO: Implement inputValidators() method.
    }
}