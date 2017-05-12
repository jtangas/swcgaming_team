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
 * Class Topic
 * @package Swc\ForumBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="topic")
 */
class Topic
{
    use Traits\DateAware;
    use Traits\StatusAware;
    use Traits\CreatedBy;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="topic_id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="topic_name", type="string", length=64, nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="topic_clean_name", type="string", length=64, nullable=false)
     */
    protected $cleanName;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var ArrayCollection | Post[]
     * @ORM\OneToMany(targetEntity="Swc\ForumBundle\Entity\Post", mappedBy="topic")
     */
    protected $posts;

    /**
     * @var boolean
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    protected $locked;

    /**
     * @var Forum
     * @ORM\ManyToOne(targetEntity="Swc\ForumBundle\Entity\Forum", inversedBy="topics")
     * @ORM\JoinColumn(name="forum_id", referencedColumnName="forum_id")
     */
    protected $forum;

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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return ArrayCollection|Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param ArrayCollection|Post[] $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param Post $post
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;
    }

    /**
     * @param Post $post
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);
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

    /**
     * @return Forum
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * @param Forum $forum
     */
    public function setForum($forum)
    {
        $this->forum = $forum;
    }
}