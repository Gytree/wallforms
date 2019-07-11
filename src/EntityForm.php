<?php


namespace Wallforms;


abstract class EntityForm
{
    protected $raw_values;

    /**
     * @var FormValidator
     */
    protected $validator;

    public function __construct()
    {
        $this->raw_values = [];
        $this->validator = new FormValidator($this);
    }

    /**
     * Return the complete class name of the work entity
     * @return string
     */
    public abstract function entity();

    /**
     * Return an array with the form fields
     * @return array
     */
    public abstract function fields();

    /**
     * Return an array with the form validators
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @param array $data
     */
    public function load($data)
    {
        foreach ($this->fields() as $key => $field) {
            $data_key = is_int($key) ? $field : $key;
            if (isset($data[$data_key])) {
                $this->raw_values[$data_key] = $data[$data_key];
            }
        }
    }

    /**
     * @param string $field
     * @param null $default
     * @return mixed|null
     */
    public function getValue($field, $default = null)
    {
        if (isset($this->raw_values[$field])) {
            return $this->raw_values[$field];
        }
        return $default;
    }

    public function getRawValues()
    {
        return $this->raw_values;
    }

    public function isValid()
    {
        return $this->validator->isValid();
    }


}