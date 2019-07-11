<?php


class BasicFormRenderTest extends TestCase
{

    public function testSimpleFormLoad()
    {
        $form = new TestEntityBasicForm();
        $form->load($this->getValidFormData($form));
        $this->assertTrue($form->isValid());
    }
}