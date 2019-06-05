<?php

use Wallforms\EntityForm;
use PHPUnit\Framework\TestCase;

class BasicFormRenderTest extends TestCase
{
    public function testFormCreation()
    {
        $entity = new BasicEntity();
        $form = new EntityForm($entity);
        $html = $form->render();
        $this->assertIsString($html);
        $name_input = '<input type="text" name="name" id="name">';
        $this->assertStringContainsStringIgnoringCase($name_input, $html);
    }
}
