<?php

declare(strict_types=1);


final class Div implements Renderable
{
    private array $elements;

    public function render(): string
    {
        $formCode = '<div>';

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        return $formCode . '</div>';
    }

    public function addElement(Renderable $element): self
    {
        $this->elements[] = $element;
        return $this;
    }
}