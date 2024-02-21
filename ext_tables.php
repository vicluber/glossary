<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_glossary_domain_model_item', 'EXT:glossary/Resources/Private/Language/locallang_csh_tx_glossary_domain_model_item.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_glossary_domain_model_item');

    // Flexform - Glossarylist
    $pluginSignature = 'glossary_itemslist';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:glossary/Configuration/FlexForms/flexform_itemslist.xml');
})();