<?php
namespace Confl1kt\NewsBundle\Model;

interface BlogInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getLink();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @param string $link
     */
    public function setLink($link);

    /**
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @return \Confl1kt\NewsBundle\Permalink\PermalinkInterface
     */
    public function getPermalinkGenerator();
}
