<?php namespace Wallforms;

use FormManager\Factory;
use FormManager\Form as MForm;
use FormManager\Inputs\Input;

class Form
{
    /**
     * @var InputEntity
     */
    private $entity;

    /**
     * @var MForm
     */
    private $form;

    public static $inputs_template = null;
    public static $default_inputs_class = null;

    public function __construct(InputEntity $entity)
    {
        $this->entity = $entity;
        $this->form = $this->generateForm();
    }

    public function generateForm()
    {
        $form = new MForm();
        foreach ($this->entity->inputFields() as $name => $field) {
            $type = isset($field['type']) ? $field['type'] : 'text';

            /** @var Input $input */
            $input = Factory::$type();
            if (!is_null(self::$inputs_template)) {
                $input->setTemplate(self::$inputs_template);
            }
            $input->name = $name;

            $label = isset($field['label']) ? $field['label'] : $name;
            unset($field['label']);

            if (!is_null(self::$default_inputs_class)) {
                $class = self::$default_inputs_class;
                if (isset($field['class'])) {
                    $class .= " " . $field['class'];
                }
                $field['class'] = $class;
            }

            $input->setAttributes($field);
            $input->setLabel($label);
            if (isset($this->entity->{$name})) {
                $input->setValue($this->entity->{$name});
            }
            $form->offsetSet($name, $input);
        }
        return $form;
    }

    public function render()
    {
        return (string)$this->form;
    }

    public function getInputs()
    {
        return $this->form->getIterator();
    }

    public function __toString()
    {
        return $this->render();
    }
}