<?php


class BasicFormValidationTest extends TestCase
{
    public function testSimpleFormLoad()
    {
        $form = new TestBasicForm();
        $form->load($this->getValidFormData($form));
        $this->assertTrue($form->isValid());
    }
}