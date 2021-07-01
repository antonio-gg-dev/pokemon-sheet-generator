<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->files()
    ->in(__DIR__);

return (new Config())
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'array_indentation' => true,
        'array_syntax' => true,
        'cast_spaces' => true,
        'clean_namespace' => true,
        'no_unused_imports' => true,
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'psr_autoloading' => true,
        'void_return' => true,
    ]);

