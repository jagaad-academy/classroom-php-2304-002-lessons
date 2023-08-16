<?php

require_once "vendor/autoload.php";

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;

$validator = new EmailValidator();
var_dump($validator->isValid("hennadii.shvedko@gmail.com", new RFCValidation())); //true
var_dump($validator->isValid("example@example.com", new RFCValidation())); //true


$multipleValidations = new MultipleValidationWithAnd([
    new RFCValidation(), //RFCValidation: Standard RFC-like email validation.
    new DNSCheckValidation() //DNSCheckValidation: Will check if there are DNS records that signal that the server accepts emails. This does not entail that the email exists.
]);

var_dump($validator->isValid("hennadii.shvedko@gmail.com", $multipleValidations)); //true
var_dump($validator->isValid("example@example.com", $multipleValidations)); //false
