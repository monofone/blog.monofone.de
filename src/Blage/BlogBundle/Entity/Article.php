<?php

namespace Blage\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A blog article
 *
 * @ORM\Entity(repositoryClass="Blage\BlogBundle\Repository\ArticleRepository")
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks()
 */
class Article
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="articles")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     *
     * @ORM\Column(type="datetime",nullable=true )
     */
    protected $publishedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $online = false;

    /**
     *  @ORM\Column(type="string")
     */
    protected $slug;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();

        if ($this->publishedAt == null && $this->online == true) {
            $this->publishedAt = new \DateTime();
        }
        $this->slug = $this->createSlug();
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
        $this->slug = $this->createSlug();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getOnline()
    {
        return $this->online;
    }

    public function setOnline($online)
    {
        $this->online = $online;
    }

    public function isOnline()
    {
        return $this->getOnline();
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    private function createSlug()
    {
        $title = strtolower($this->title);
        $title = str_replace(array(
            ' ',
            'ä',
            'ö',
            'ü',
            'ß'
                ), array(
            '-',
            'a',
            'o',
            'u',
            'ss'
                ), $title);

        return $title;
    }

}
