<?php

use Wallforms\EntityForm;

class TestEntityBasicForm extends EntityForm
{

    /**
     * Return the complete class name of the work entity
     * @return string
     */
    public function entity()
    {
        return TestEntity::class;
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'name' => 'text',
            'phone' => 'phone',
            'description' => 'text',
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required', 'phone'],
            'description' => ['required']
        ];
    }
}