<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Glossary',
    'Itemslist',
    'LLL:EXT:glossary/Resources/Private/Language/locallang_db.xlf:tx_glossary_itemslist.plugin_name'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Glossary',
    'Itemsdetail',
    'LLL:EXT:glossary/Resources/Private/Language/locallang_db.xlf:tx_glossary_itemsdetail.plugin_name'
);