<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit268dccc6456137510c20ebfcc339c7b8
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit268dccc6456137510c20ebfcc339c7b8::$classMap;

        }, null, ClassLoader::class);
    }
}
