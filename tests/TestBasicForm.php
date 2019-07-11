<?php


use Wallforms\EntityForm;

class TestBasicForm extends EntityForm
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
            'phone' => 'int',
            'description' => 'text',
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required', 'numeric'],
            'description' => ['required']
        ];
    }
}