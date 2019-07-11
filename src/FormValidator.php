<?php


namespace Wallforms;

/**
 * Class FormValidator
 * It's responsible for the EntityForm validation
 * @package Wallforms
 * @author Gytree <pedroguarimata@gmail.com>
 */
class FormValidator
{
    /**
     * @var EntityForm
     */
    protected $form;

    protected $validator;

    public function __construct($form)
    {
        $this->form = $form;
    }

    public function isValid()
    {
        $this->validator = static::createValidator();
        return $this->validator->validate();
    }

    protected function createValidator()
    {
        $validator = new \Valitron\Validator($this->form->getRawValues());
        $validator->mapFieldsRules($this->form->rules());
        return $validator;
    }
}