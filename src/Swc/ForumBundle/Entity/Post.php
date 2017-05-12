<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/10/17
 * Time: 12:39 PM
 */

namespace Swc\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Post
 * @package Swc\ForumBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="forum_post")
 */
class Post
{
    use Traits\CreatedBy;
    use Traits\StatusAware;
    use Traits\DateAware;

    /**
     * @var int
     * @ORM\Column(name="post_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(name="title_clean", type="string", length=100, nullable=false)
     */
    protected $titleClean;

    /**
     * @var string
     * @ORM\Column(name="subtitle", type="string", length=255)
     */
    protected $subTitle;

    /**
     * @var string
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    protected $content;

    /**
     * @var boolean
     * @ORM\Column(name="flagged", type="boolean", nullable=false)
     */
    protected $flagged;

    /**
     * @var ArrayCollection | Attachment[]
     * @ORM\OneToMany(targetEntity="Swc\ForumBundle\Entity\Attachment", mappedBy="post")
     */
    protected $attachments;

    /**
     * @var Topic
     * @ORM\ManyToOne(targetEntity="Swc\ForumBundle\Entity\Topic", inversedBy="posts")
     * @ORM\JoinColumn(name="topic_id", referencedColumnName="topic_id")
     */
    protected $topic;

    /**
     * @var Post
     * @ORM\OneToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="post_id")
     */
    protected $parent;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
        $this->attachments = new ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitleClean()
    {
        return $this->titleClean;
    }

    /**
     * @param string $titleClean
     */
    public function setTitleClean($titleClean)
    {
        $this->titleClean = $titleClean;
    }

    /**
     * @return string
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * @param string $subTitle
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return boolean
     */
    public function isFlagged()
    {
        return $this->flagged;
    }

    /**
     * @param boolean $flagged
     */
    public function setFlagged($flagged)
    {
        $this->flagged = $flagged;
    }

    /**
     * @return ArrayCollection|Attachment[]
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param ArrayCollection|Attachment[] $attachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }

    /**
     * @param Attachment $attachment
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
    }

    /**
     * @param Attachment $attachment
     */
    public function removeAttachment(Attachment $attachment)
    {
        $this->attachments->removeElement($attachment);
    }

    /**
     * @return Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param Topic $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return Post
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Post $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
}