<?php

class BasicFormRenderTest extends \PHPUnit\Framework\TestCase
{
    public function testFormCreation()
    {
        $entity = new BasicEntity();
        $form = new \Wallforms\Form($entity);
        $html = $form->render();
        $this->assertIsString($html);
        $name_input = '<input type="text" name="name" id="name">';
        $this->assertStringContainsStringIgnoringCase($name_input, $html);
    }
}
