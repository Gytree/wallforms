<?php namespace Wallforms;

use FormManager\Factory;
use FormManager\Form as MForm;

class Form
{
    /**
     * @var InputEntity
     */
    private $entity;

    public function __construct(InputEntity $entity)
    {
        $this->entity = $entity;
    }

    public function render()
    {
        $form = new MForm();
        foreach ($this->entity->inputFields() as $name => $field) {
            $type = isset($field['type']) ? $field['type'] : 'text';
            $input = Factory::$type();
            $input->name = $name;

            $label = isset($field['label']) ? $field['label'] : $name;
            unset($field['label']);

            $input->setAttributes($field);
            $input->setLabel($label);

            $form->appendChild($input);
        }
        return (string)$form;
    }
}