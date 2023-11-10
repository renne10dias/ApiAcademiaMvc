<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf480adb6256e64079da43fb7f6697923
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf480adb6256e64079da43fb7f6697923::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf480adb6256e64079da43fb7f6697923::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf480adb6256e64079da43fb7f6697923::$classMap;

        }, null, ClassLoader::class);
    }
}
