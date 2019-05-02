<?php namespace Wallforms;

interface InputEntity
{
    public function keyField(): string;

    public function inputFields(): array;
}
