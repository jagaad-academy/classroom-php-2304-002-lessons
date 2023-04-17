<?php

require_once __DIR__ . '/Renderable.php';
require_once __DIR__ . '/Form.php';
require_once __DIR__ . '/Input.php';
require_once __DIR__ . '/Button.php';
require_once __DIR__ . '/Div.php';

$input = new Input;
$button = new Button;

$form = new Form;
$form
    ->addElement($input)
    ->addElement($input)
    ->addElement($button);

$div = new Div();
$div->addElement($form);

echo $div->render();

