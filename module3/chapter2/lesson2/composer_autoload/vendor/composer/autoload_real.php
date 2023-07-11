<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitddfd45e4189d4156c94377f40b9e5500
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitddfd45e4189d4156c94377f40b9e5500', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitddfd45e4189d4156c94377f40b9e5500', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitddfd45e4189d4156c94377f40b9e5500::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
