<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit83e4153102a790cd363eff96d627f305
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gideon\\Test\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gideon\\Test\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit83e4153102a790cd363eff96d627f305::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit83e4153102a790cd363eff96d627f305::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit83e4153102a790cd363eff96d627f305::$classMap;

        }, null, ClassLoader::class);
    }
}