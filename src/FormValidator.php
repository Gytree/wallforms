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
     * @var Form
     */
    protected $form;

    /**
     * @var \Valitron\Validator
     */
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

    public function getErrors()
    {
        if (!is_null($this->validator)) {
            return $this->validator->errors();
        }
        return [];
    }

    protected function createValidator()
    {
        $validator = new \Valitron\Validator($this->form->getRawValues());
        $validator->mapFieldsRules($this->form->rules());
        return $validator;
    }
}