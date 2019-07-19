<?php


class FormLoadTest extends TestCase
{
    /** @var \Wallforms\Form */
    private $form;
    private $test_values;

    protected function setUp(): void
    {
        $this->form = new TestBasicForm();
        $this->test_values = [
            'name' => 'Gytree',
            'phone' => '23123123',
            'description' => 'hello world!'
        ];
    }

    public function testArrayLoad()
    {
        $this->form->load($this->test_values);
        $this->assertEquals($this->test_values, $this->form->getRawValues());
    }

    public function testObjectLoad()
    {
        $this->form->load((object)$this->test_values);
        $this->assertEquals($this->test_values, $this->form->getRawValues());
    }


}