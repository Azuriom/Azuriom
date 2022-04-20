<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__.'/app')
    ->in(__DIR__.'/config')
    ->in(__DIR__.'/database/factories')
    ->in(__DIR__.'/database/seeders')
    ->in(__DIR__.'/resources/lang')
    ->in(__DIR__.'/routes')
    ->in(__DIR__.'/tests');

return (new Config())
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHPUnit75Migration:risky' => true,

        'not_operator_with_successor_space' => true,

        // Override some rules from @PhpCsFixer preset
        'blank_line_before_statement' => [
            'statements' => ['declare', 'return', 'throw', 'try'],
        ],
        'increment_style' => ['style' => 'post'],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'native_constant_invocation' => false,
        'native_function_invocation' => false,
        'no_empty_comment' => false,
        'no_extra_blank_lines' => true,
        'no_superfluous_phpdoc_tags' => false,
        'ordered_class_elements' => false, // Maybe add this later ?
        'php_unit_internal_class' => false,
        'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_align' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_order' => false,
        'phpdoc_separation' => false,
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'none',
        ],
        'protected_to_private' => false,
        'single_line_comment_style' => false,
        'yoda_style' => [
            'always_move_variable' => false,
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
    ]);
