<?php


use Wallforms\FormRenderer;

class FormHtmlRenderTest extends TestCase
{
    public function testRenderSimpleHtml()
    {
        $form = new TestBasicForm();
        $renderer = new FormRenderer($form);
        $renderer->render();
    }
}