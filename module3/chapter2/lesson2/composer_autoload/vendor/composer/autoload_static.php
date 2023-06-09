<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitddfd45e4189d4156c94377f40b9e5500
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'HennadiiShvedko\\ComposerAutoload\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'HennadiiShvedko\\ComposerAutoload\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitddfd45e4189d4156c94377f40b9e5500::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitddfd45e4189d4156c94377f40b9e5500::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitddfd45e4189d4156c94377f40b9e5500::$classMap;

        }, null, ClassLoader::class);
    }
}
