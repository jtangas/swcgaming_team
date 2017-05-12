<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/12/17
 * Time: 8:41 AM
 */

namespace Swc\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Attachment
 * @package Swc\ForumBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="attachment")
 */
class Attachment
{
    use Traits\CreatedBy;
    use Traits\DateAware;
    use Traits\StatusAware;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="attachment_id", type="integer", nullable=false)
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

    /**
     * @var string
     * @ORM\Column(name="file_location", type="text", nullable=false)
     */
    protected $fileLocation;

    /**
     * @var Object
     * @ORM\Column(name="file_info", type="json_array", nullable=false)
     */
    protected $fileInfo;

    /**
     * @var Post
     * @ORM\ManyToOne(targetEntity="Swc\ForumBundle\Entity\Post", inversedBy="attachments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="post_id")
     */
    protected $post;

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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getFileLocation()
    {
        return $this->fileLocation;
    }

    /**
     * @param string $fileLocation
     */
    public function setFileLocation($fileLocation)
    {
        $this->fileLocation = $fileLocation;
    }

    /**
     * @return Object
     */
    public function getFileInfo()
    {
        return $this->fileInfo;
    }

    /**
     * @param Object $fileInfo
     */
    public function setFileInfo($fileInfo)
    {
        $this->fileInfo = $fileInfo;
    }
}