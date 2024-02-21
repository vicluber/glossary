<?php

declare(strict_types=1);

namespace Effective\Glossary\Domain\Model;


/**
 * This file is part of the "Glossary" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Victor Willhuber <victorwillhuber@gmail.com>, Effective World
 */

/**
 * Item
 */
class Item extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * term
     *
     * @var string
     */
    protected $term = null;

    /**
     * path segment
     *
     * @var string
     */
    protected $pathSegment = null;

    /**
     * teaser
     *
     * @var string
     */
    protected $teaser = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * file
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $file = null;

    /**
     * metaTitle
     *
     * @var string
     */
    protected $metaTitle = null;

    /**
     * metaDescription
     *
     * @var string
     */
    protected $metaDescription = null;

    /**
     * index this page
     *
     * @var bool
     */
    protected $indexThisPage;

    /**
     * follow this page
     *
     * @var bool
     */
    protected $followThisPage;

    /**
     * Returns the term
     *
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Sets the term
     *
     * @param string $term
     * @return void
     */
    public function setTerm(string $term)
    {
        $this->term = $term;
    }

    /**
     * Returns the term
     *
     * @return string
     */

     public function getTitle()
     {
         return $this->term;
     }
 
     /**
      * Sets the title
      *
      * @param string $title
      * @return void
      */
     public function setTitle(string $title)
     {
         $this->term = $title;
     }

    /**
     * Returns the pathSegment
     *
     * @return string
     */
    public function getPathSegment()
    {
        return $this->pathSegment;
    }

    /**
     * Sets the pathSegment
     *
     * @param string $pathSegment
     * @return void
     */
    public function setPathSegment(string $pathSegment)
    {
        $this->pathSegment = $pathSegment;
    }

    /**
     * Returns the teaser
     *
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     *
     * @param string $teaser
     * @return void
     */
    public function setTeaser(string $teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the file
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the file
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     * @return void
     */
    public function setFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $file)
    {
        $this->file = $file;
    }

    /**
     * Returns the metaTitle
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Sets the metaTitle
     *
     * @param string $metaTitle
     * @return void
     */
    public function setMetaTitle(string $metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * Returns the metaDescription
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Sets the metaDescription
     *
     * @param string $metaDescription
     * @return void
     */
    public function setMetaDescription(string $metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * Returns the intexThisPage
     *
     * @return string
     */
    public function getIntexThisPage()
    {
        return $this->intexThisPage;
    }

    /**
     * Sets the intexThisPage
     *
     * @param string $intexThisPage
     * @return void
     */
    public function setIntexThisPage(string $intexThisPage)
    {
        $this->intexThisPage = $intexThisPage;
    }

    /**
     * Returns the followThisPage
     *
     * @return string
     */
    public function getFollowThisPage()
    {
        return $this->followThisPage;
    }

    /**
     * Sets the followThisPage
     *
     * @param string $followThisPage
     * @return void
     */
    public function setFollowThisPage(string $followThisPage)
    {
        $this->followThisPage = $followThisPage;
    }
}
