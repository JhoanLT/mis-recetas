<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3c551f59b10e94cf3ac39f66b5c1c47f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mini\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mini\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3c551f59b10e94cf3ac39f66b5c1c47f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3c551f59b10e94cf3ac39f66b5c1c47f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
