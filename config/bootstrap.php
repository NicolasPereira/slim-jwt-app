<?php

use DI\ContainerBuilder;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Slim\App;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/container.php');
// Build PHP-DI Container instance
$container = $containerBuilder->build();
//Doctrine EntityManager Factory
/*
$container->set(EntityManager::class, static function ($container): EntityManager {
   //Variaveis de config
    $settings = $container->get('settings');

    // Use the ArrayAdapter or the FilesystemAdapter depending on the value of the 'dev_mode' setting
    // You can substitute the FilesystemAdapter for any other cache you prefer from the symfony/cache library
    $cache = $settings['db']['dev_mode'] ?
        DoctrineProvider::wrap(new ArrayAdapter()) :
        DoctrineProvider::wrap(new FilesystemAdapter(directory: $settings['db']['cache_dir']));

    $config = Setup::createAttributeMetadataConfiguration(
        $settings['db']['metadata_dirs'],
        $settings['db']['dev_mode'],
        null,
        $cache
    );

    return EntityManager::create($settings['db']['connection'], $config);
});
*/

// Create App instance
$app = $container->get(App::class);
// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;