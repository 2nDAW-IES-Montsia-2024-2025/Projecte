<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb71ee2b6e3af4523e171fe07542b7f0a
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

        spl_autoload_register(array('ComposerAutoloaderInitb71ee2b6e3af4523e171fe07542b7f0a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb71ee2b6e3af4523e171fe07542b7f0a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb71ee2b6e3af4523e171fe07542b7f0a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
