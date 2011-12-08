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
    
    
    public function __construct()
    {
        $this->updatedAt = new \DateTime();
    }
    
    /**
     * @ORM\preUpdate
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }
    
    /**
     * @ORM\prePersist
     */
    public function setCreatedAt()
    { 
        $this->createdAt = new \DateTime();
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


}
