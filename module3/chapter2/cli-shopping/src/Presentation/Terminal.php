<?php

namespace Jagaad\Presentation;

use Jagaad\Presentation\Option\QuitOption;

class Terminal
{
    /** @var Option[] */
    private array $options = [];

    private Option $defaultOption;

    public function __construct()
    {
        $this->defaultOption = new QuitOption();
    }

    public function addOption(Option $option): void
    {
        $this->options[$option->key()] = $option;
    }

    public function execute(): void
    {
        $this->options[] = $this->defaultOption;

        while (true) {
            $this->displayOptions();
            $option = readline('Choose an option: ');
            if ($option === $this->defaultOption->key()) {
                break;
            }
            $this->handleOption($option);
        }
    }

    private function handleOption(string $optionChosen): void
    {
        if (isset($this->options[$optionChosen])) {
            $this->options[$optionChosen]->handle();
            return;
        }
        $this->handleError();
    }

    private function handleError(): void
    {
        system('clear');
        echo 'I can not handle the option chosen';
    }

    private function displayOptions(): void
    {
        $output = '';
        foreach ($this->options as $option) {
            $output .= $option->key() . ': ' . $option->description() . PHP_EOL;
        }
        echo $output;
    }
}
