<?php

class InputText
{
    public function __construct(private string $name)
    {
    }

    public function render(): string
    {
        return '<input type="text" name="' . $this->name . '"><br>';
    }
}
