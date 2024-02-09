<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Form prefill',
    'description' => 'Shows the usage of the hook "afterBuildingFinished" of EXT:form, for example to prefill forms',
    'category' => 'fe',
    'author' => 'Manuel Schnabel',
    'author_email' => 'service@passionweb.de',
    'author_company' => 'PassionWeb Manuel Schnabel',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-12.4.99',
            'form' => '12.0.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
