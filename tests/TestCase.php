<?php


abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param \Wallforms\Form $form
     * @return array
     */
    protected function getValidFormData($form)
    {
        $values = [];
        foreach ($form->fields() as $key => $field) {
            $type = is_int($key) ? null : $field;
            $data_key = is_int($key) ? $field : $key;
            try {
                $values[$data_key] = $this->getTypeValue($type);
            } catch (Exception $e) {
            }
        }
        return $values;
    }

    /**
     * @param null $type
     * @return int|string
     * @throws Exception
     */
    private function getTypeValue($type = null)
    {
        switch ($type) {
            case 'int':
                return random_int(0, 100);
            case 'numeric':
                return '134812341234';
            case 'text':
            default:
                return 'hello world!';
        }
    }
}