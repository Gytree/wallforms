<?php


namespace Wallforms;


abstract class EntityForm extends Form
{

    /**
     * Return the complete class name of the work entity
     * @return string
     */
    public abstract function entity();

}