<?php


namespace Wallforms;


abstract class Form
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

    public function load($data)
    {
        foreach ($this->fields() as $key => $field) {
            $data_key = is_int($key) ? $field : $key;
            if ($value = $this->getDataValue($data, $data_key)) {
                $this->raw_values[$data_key] = $value;
            }
        }
    }

    private function getDataValue($data, $key)
    {
        if (is_array($data) and isset($data[$key])) {
            return $data[$key];
        } else if (is_object($data) and property_exists($data, $key)) {
            return $data->{$key};
        }
        return null;
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

    public function getErrors()
    {
        return $this->validator->getErrors();
    }
}