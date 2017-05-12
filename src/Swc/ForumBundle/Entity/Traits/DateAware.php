<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/10/17
 * Time: 4:23 PM
 */

namespace Swc\ForumBundle\Entity\Traits;


trait DateAware
{
    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="modified_at", type="datetime", nullable=false)
     */
    protected $modifiedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        if(is_string($createdAt)){
            $createdAt = new \DateTime($createdAt);
        }
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param \DateTime $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        if(is_string($modifiedAt)){
            $this->createdAt = new \DateTime($modifiedAt);
        }
        $this->modifiedAt = $modifiedAt;
    }
}