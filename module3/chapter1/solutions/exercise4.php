<?php

require_once __DIR__ . '/classes/Form.php';
require_once __DIR__ . '/classes/InputText.php';

$name = 'user-form';
$method = 'post';
$action = '/handle.php';

$form = new Form($name, $method, $action);
$form->addInput(new InputText('first_name'));
$form->addInput(new InputText('first_name'));
$form->addInput(new InputText('first_name'));
$form->addInput(new InputText('first_name'));
$form->setSubmitButtonLabel('Submit');

echo $form->render();
