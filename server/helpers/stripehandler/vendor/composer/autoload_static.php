<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit29b1d6cf6cbf34db40bfac0e3bcc938e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit29b1d6cf6cbf34db40bfac0e3bcc938e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit29b1d6cf6cbf34db40bfac0e3bcc938e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
