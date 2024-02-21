<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Glossary',
        'Itemslist',
        [
            \Effective\Glossary\Controller\ItemController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Effective\Glossary\Controller\ItemController::class => ''
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Glossary',
        'Itemsdetail',
        [
            \Effective\Glossary\Controller\ItemController::class => 'show'
        ],
        // non-cacheable actions
        [
            \Effective\Glossary\Controller\ItemController::class => ''
        ]
    );

    /***************
     * PageTS
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:glossary/Configuration/TsConfig/Page/All.tsconfig">');

})();