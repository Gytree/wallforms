<?php


namespace Wallforms;


class FormRenderer
{
    /**
     * @var Form
     */
    protected $form;

    /**
     * FormRenderer constructor.
     * @param Form $form
     */
    public function __construct($form)
    {
        $this->form = $form;
    }

    public function render()
    {
        $html = "<form></form>"; # ?
    }
}