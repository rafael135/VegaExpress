<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8ed6724f3697df7db078339977c6683
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Db',
            1 => __DIR__ . '/../..' . '/app/Entity',
            2 => __DIR__ . '/../..' . '/app/Funcs',
            3 => __DIR__ . '/../..' . '/ActionPHP/verificarEmail.php',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Detection' => 
            array (
                0 => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/namespaced',
            ),
        ),
    );

    public static $classMap = array (
        'App\\Autor' => __DIR__ . '/../..' . '/app/Entity/Autor.php',
        'App\\Database' => __DIR__ . '/../..' . '/app/Db/Database.php',
        'App\\Email' => __DIR__ . '/../..' . '/app/Entity/Email.php',
        'App\\Produto' => __DIR__ . '/../..' . '/app/Entity/Produto.php',
        'App\\Publicacao' => __DIR__ . '/../..' . '/app/Entity/Publicacao.php',
        'App\\Usuario' => __DIR__ . '/../..' . '/app/Entity/Usuario.php',
        'App\\money_format' => __DIR__ . '/../..' . '/app/Funcs/money_format.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Detection\\MobileDetect' => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/namespaced/Detection/MobileDetect.php',
        'Mobile_Detect' => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/Mobile_Detect.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8ed6724f3697df7db078339977c6683::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8ed6724f3697df7db078339977c6683::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd8ed6724f3697df7db078339977c6683::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd8ed6724f3697df7db078339977c6683::$classMap;

        }, null, ClassLoader::class);
    }
}