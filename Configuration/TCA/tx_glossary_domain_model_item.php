<?php
$ll = 'LLL:EXT:glossary/Resources/Private/Language/locallang_db.xlf:';
return [
    'ctrl' => [
        'title' => $ll.'tx_glossary_domain_model_item',
        'label' => 'term',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'translationSource' => 'l10n_source',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'term',
        'iconfile' => 'EXT:glossary/Resources/Public/Icons/itemsdetail.svg'
    ],
    'types' => [
        '1' => ['showitem' =>   'term, path_segment, teaser, description, file,
                                --div--;'.$ll.'tx_glossary_domain_model_item.seo_tab,
                                    --palette--;'.$ll.'tx_glossary_domain_model_item.general_seo_settings;general_seo_settings,
                                    --palette--;'.$ll.'tx_glossary_domain_model_item.robot_instructions;checkboxes,
                                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'palettes' => [
        'checkboxes' => [
            'showitem' =>   'index_this_page;'.$ll.'tx_glossary_domain_model_item.index_this_page,
                            follow_this_page;'.$ll.'tx_glossary_domain_model_item.follow_this_page',
        ],
        'general_seo_settings' => [
            'showitem' =>   'meta_title;'.$ll.'tx_glossary_domain_model_item.meta_title,
                            meta_description;'.$ll.'tx_glossary_domain_model_item.meta_description'
        ],
        //'canonical' => [],
        //'sitemap' => []
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_glossary_domain_model_item',
                'foreign_table_where' => 'AND {#tx_glossary_domain_model_item}.{#pid}=###CURRENT_PID### AND {#tx_glossary_domain_model_item}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'term' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.term',
            'eval' => 'required',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required',
                'default' => ''
            ],
        ],
        'teaser' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.teaser',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 20,
                'rows' => 5,
                'eval' => 'trim, required',
            ],
            
        ],
        'description' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim, required',
            ],
            
        ],
        'file' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.file',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'file',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'file',
                        'tablenames' => 'tx_glossary_domain_model_item',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ]
            ),
            
        ],
        'path_segment' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.path_segment',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['term'],
                    'replacements' => [
                        '/' => '-'
                    ],
                ],
                'fallbackCharacter' => '-'
            ]
        ],
        'meta_title' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.meta_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'meta_description' => [
            'exclude' => true,
            'label' => $ll.'tx_glossary_domain_model_item.meta_description',
            'config' => [
                'type' => 'text',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'index_this_page' => [
            'exclude' => 1,
            'label' => $ll.'tx_glossary_domain_model_item.index_this_page',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 1,
                'items' => [
                    [
                        0 => 'enabled',
                        1 => 'disabled',
                    ]
                ],
            ]
        ],
        'follow_this_page' => [
            'exclude' => 1,
            'label' => $ll.'tx_glossary_domain_model_item.follow_this_page',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 1,
                'items' => [
                    [
                        0 => 'enabled',
                        1 => 'disabled',
                    ]
                ],
            ]
        ]
    
    ],
];
