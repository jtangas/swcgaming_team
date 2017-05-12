<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/10/17
 * Time: 12:39 PM
 */

namespace Swc\ForumBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Forum
 * @package Swc\ForumBundle\Entity
 * @ORM\Table(name="forum")
 * @ORM\Entity
 */
class Forum
{
    use Traits\DateAware;
    use Traits\StatusAware;
    use Traits\CreatedBy;

    /**
     * @var int
     * @ORM\Column(name="forum_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="clean_name", type="text", nullable=false)
     */
    protected $cleanName;

    /**
     * @var ArrayCollection | Category[]
     * @ORM\ManyToMany(targetEntity="Swc\ForumBundle\Entity\Category")
     * @ORM\JoinTable(name="forums_groups",
     *     joinColumns={@ORM\JoinColumn(name="forum_id", referencedColumnName="forum_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="category_id")}
     *     )
     */
    protected $categories;

    /**
     * @var boolean
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    protected $locked;

    /**
     * @var ArrayCollection | Topic[]
     * @ORM\OneToMany(targetEntity="Swc\ForumBundle\Entity\Topic", mappedBy="forum")
     */
    protected $topics;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->topics = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCleanName()
    {
        return $this->cleanName;
    }

    /**
     * @param string $cleanName
     */
    public function setCleanName($cleanName)
    {
        $this->cleanName = $cleanName;
    }

    /**
     * @return ArrayCollection|Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * @param ArrayCollection|Category[] $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return ArrayCollection|Topic[]
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * @param ArrayCollection|Topic[] $topics
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;
    }

    /**
     * @param Topic $topic
     */
    public function addTopic(Topic $topic)
    {
        $this->topics[] = $topic;
    }

    /**
     * @param Topic $topic
     */
    public function removeTopic(Topic $topic)
    {
        $this->topics->removeElement($topic);
    }

    /**
     * @return boolean
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }
}