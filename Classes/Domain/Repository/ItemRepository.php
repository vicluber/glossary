<?php

declare(strict_types=1);

namespace Effective\Glossary\Domain\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * This file is part of the "Glossary" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Victor Willhuber <victorwillhuber@gmail.com>, Effective World
 */

/**
 * The repository for Items
 */
class ItemRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * Returns all objects of this repository selected by uid and language id.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function isTranslated($parent, $language)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_glossary_domain_model_item');
        $result = $queryBuilder
        ->select('uid')
        ->from('tx_glossary_domain_model_item')
        ->where(
            $queryBuilder->expr()->eq('l10n_parent', $parent),
            $queryBuilder->expr()->eq('sys_language_uid', $language),
            $queryBuilder->expr()->eq('deleted', 0)
        )
        ->executeQuery();
        return $result->fetch();
    }

        /**
     * Find all items ordered alphabetically by title.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
     */
    public function findAllOrderedAlphabetically()
    {
        $query = $this->createQuery();
        $query->setOrderings(['term' => QueryInterface::ORDER_ASCENDING]);

        return $query->execute();
    }
}
