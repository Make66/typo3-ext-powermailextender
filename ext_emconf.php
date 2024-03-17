<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "powermailextender"
 *
 * Auto generated by Extension Builder 2020-12-11
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Powermail Extender',
    'description' => 'Add a finisher: If formuser is from t-online.de there is a problem sending the mail to receiver. So we send it manually again.',
    'category' => 'services',
    'author' => 'Martin Keller',
    'author_email' => 'martin.keller@taketool.de',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'powermail' => '7.4.1-9.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];