<?php

declare(strict_types=1);

namespace Effective\Glossary\Controller;

use EffectiveWorld\Rkg\Controller\AbstractController;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Effective\Glossary\PageTitle\ItemPageTitleProvider;
use Effective\Glossary\Domain\Model\Item;
use TYPO3\CMS\Core\Page\PageRenderer;

/**
 * This file is part of the "Glossary" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Victor Willhuber <victorwillhuber@gmail.com>, Effective World
 */

/**
 * ItemController
 */
class ItemController extends AbstractController
{

    /**
     * itemRepository
     *
     * @var \Effective\Glossary\Domain\Repository\ItemRepository
     */
    protected $itemRepository = null;

    /**
     * @param \Effective\Glossary\Domain\Repository\ItemRepository $itemRepository
     */
    public function injectItemRepository(\Effective\Glossary\Domain\Repository\ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $items = $this->itemRepository->findAllOrderedAlphabetically();
        $this->view->assign('items', $items);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Effective\Glossary\Domain\Model\Item $item
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Effective\Glossary\Domain\Model\Item $item): \Psr\Http\Message\ResponseInterface
    {
        if(isset($item)){
            $this->createMetaTags($item);
            $this->addAlternateLinks($item);
            $this->view->assign('item', $item);
        }
        
        return $this->htmlResponse();
    }

    /**
     * Adds alternate links for all enabled languages for a particular item BUT JUST IF THAT TRANSLATION EXIST
     * @param Item $item
     */
    public function addAlternateLinks(Item $item)
    {
        // Get context for knowing and getting the current language
        $languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
        // And with that setting the url for the canonical link
        $currentUriForCanonical = $this->uriBuilder->setArguments(array('L' => $languageAspect->getId()))->setAddQueryString(TRUE)->build();
        // Getting array of avaliable languages to check for the item translation one by one
        $languagesArray = $this->request->getAttribute('site')->getAllLanguages();
        // Building canonical link string to give later to PageRenderer
        $linkTag = '<link rel="canonical" href="'.$currentUriForCanonical.'"/>
        
';
        // Looping languages and checkin for isTranslated item so we build or not the uri for that alternate link
        foreach ($languagesArray as &$language) {
            // Check if there is a translation for this language of this item OR is the default language in which case doesn't need a translation
            if(($this->itemRepository->isTranslated($item->getUid(), $language->getLanguageId())) || ($language->getLanguageId() == 0)){
                $uri = $this->uriBuilder->setArguments(array('L' => $language->getLanguageId()))->setAddQueryString(TRUE)->build();
                $linkTag .= '<link rel="alternate" hreflang="'.$language->getHreflang().'" href="'.$uri.'" />
';
            }
        }
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addHeaderData($linkTag);
    }
}
