# Quality Tools

## PHPStan

Static analysis tool.

```
vendor/bin/phpstan analyse src
```

## PHP_CodeSniffer

Check the code style:

````
./vendor/bin/phpcs --standard=PSR12 src/
````

Fix the code style:

````
./vendor/bin/phpcbf --standard=PSR12 src/
````
