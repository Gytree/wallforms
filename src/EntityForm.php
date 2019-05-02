<?php namespace Wallforms;

use FormManager\Form;
use FormManager\Factory;
use FormManager\Inputs\Input;

class EntityForm
{
    /**
     * @var InputEntity
     */
    private $entity;

    /**
     * @var Form
     */
    public $form;

    public static $inputs_template = null;
    public static $default_inputs_class = null;

    public function __construct(InputEntity $entity)
    {
        $this->entity = $entity;
        $this->form = $this->generateForm();
        $this->form->setAttribute('method', 'POST');
    }


    public function setAction($url)
    {
        $this->form->setAttribute('action', $url);
    }

    public function generateForm()
    {
        $form = new Form();

        if (property_exists($this->entity, $this->entity->keyField())) {
            $key_field = $this->entity->keyField();
            $form->offsetSet($key_field, Factory::hidden($this->entity->{$key_field}));
        }

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
            if (isset($field['constraints'])) {
                foreach ($field['constraints'] as $validator) {
                    $input->addConstraint($validator);
                }
                unset($field['constraints']);
            }
            $form->offsetSet($name, $input);
        }
        return $form;
    }

    public function render()
    {
        if (!$this->form->offsetExists('submit')) {
            $this->form->offsetSet('submit', Factory::submit('Submit'));
        }
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

    public function isValid()
    {
        return $this->form->isValid();
    }
}