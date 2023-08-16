<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6613901efb924554d3c3130cfa102fa1
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6613901efb924554d3c3130cfa102fa1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6613901efb924554d3c3130cfa102fa1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6613901efb924554d3c3130cfa102fa1::$classMap;

        }, null, ClassLoader::class);
    }
}
