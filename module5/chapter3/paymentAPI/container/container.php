<?php
/**
 * container.php
 * hennadii.shvedko
 * 18.09.2023
 */

use DI\Container;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use PaymentApi\Controller\MethodsController;
use PaymentApi\Repository\BasketRepository;
use PaymentApi\Repository\BasketRepositoryDoctrine;
use PaymentApi\Repository\CustomersRepository;
use PaymentApi\Repository\CustomersRepositoryDoctrine;
use PaymentApi\Repository\MethodsRepository;
use PaymentApi\Repository\MethodsRepositoryDoctrine;
use PaymentApi\Repository\PaymentsRepository;
use PaymentApi\Repository\PaymentsRepositoryDoctrine;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$container = new Container;

const APP_ROOT = __DIR__ . "/..";
$container->set('settings', function ($container) {
    return [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,

        'doctrine' => [
            // Enables or disables Doctrine metadata caching
            // for either performance or convenience during development.
            'dev_mode' => true,

            // Path where Doctrine will cache the processed metadata
            // when 'dev_mode' is false.
            'cache_dir' => APP_ROOT . '/var/doctrine',

            // List of paths where Doctrine will search for metadata.
            // Metadata can be either YML/XML files or PHP classes annotated
            // with comments or PHP8 attributes.
            'metadata_dirs' => [APP_ROOT . '/src'],

            // The parameters Doctrine needs to connect to your database.
            // These parameters depend on the driver (for instance the 'pdo_sqlite' driver
            // needs a 'path' parameter and doesn't use most of the ones shown in this example).
            // Refer to the Doctrine documentation to see the full list
            // of valid parameters: https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
            'connection' => [
                'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
                'host' => $_ENV['MARIADB_HOST'] ?? 'localhost',
                'port' => 3306,
                'dbname' => $_ENV['MARIADB_DB_NAME'] ?? 'mydb',
                'user' => $_ENV['MARIADB_DB_USER'] ?? 'user',
                'password' => $_ENV['MARIADB_DB_USER_PASSWORD'] ?? 'pass'
            ]
        ]

    ];
});

$container->set(EntityManager::class, function (Container $c): EntityManager {
    /** @var array $settings */
    $settings = $c->get('settings');

    // Use the ArrayAdapter or the FilesystemAdapter depending on the value of the 'dev_mode' setting
    // You can substitute the FilesystemAdapter for any other cache you prefer from the symfony/cache library
    $cache = $settings['doctrine']['dev_mode'] ?
        DoctrineProvider::wrap(new ArrayAdapter()) :
        DoctrineProvider::wrap(new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']));

    $config = Setup::createAttributeMetadataConfiguration(
        $settings['doctrine']['metadata_dirs'],
        $settings['doctrine']['dev_mode'],
        null,
        $cache
    );

    return EntityManager::create($settings['doctrine']['connection'], $config);
});

$container->set(MethodsRepository::class, function (Container $container) {
    $em = $container->get(EntityManager::class);
    return new MethodsRepositoryDoctrine($em);
});

$container->set(CustomersRepository::class, function (Container $container) {
    $em = $container->get(EntityManager::class);
    return new CustomersRepositoryDoctrine($em);
});

$container->set(PaymentsRepository::class, function (Container $container) {
    $em = $container->get(EntityManager::class);
    return new PaymentsRepositoryDoctrine($em);
});

$container->set(BasketRepository::class, function (Container $container) {
    $em = $container->get(EntityManager::class);
    return new BasketRepositoryDoctrine($em);
});

$container->set(Logger::class, function (Container $container){
    $logger = new Logger('paymentAPI');
    $logger->pushHandler((new StreamHandler(__DIR__ . '/../logs/alert.log', Level::Alert)));
    $logger->pushHandler((new StreamHandler(__DIR__ . '/../logs/critical.log', Level::Critical)));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/error.log', Level::Error));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/warning.log', Level::Warning));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/notice.log', Level::Notice));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/info.log', Level::Info));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/debug.log', Level::Debug));
    return $logger;
});

return $container;
