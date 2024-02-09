<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator, ContainerBuilder $containerBuilder) {
    $services = $configurator->services();

    $services->defaults()
        ->private()
        ->autowire()
        ->autoconfigure();

    $services->load('Passionweb\\FormPrefill\\', __DIR__ . '/../Classes/')->exclude([
        __DIR__ . '/../Classes/Domain/Model',
    ]);

    $services->set(\Passionweb\FormPrefill\Hooks\PrefillForms::class)
        ->public();
};
