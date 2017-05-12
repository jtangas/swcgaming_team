<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/11/17
 * Time: 10:58 AM
 */

namespace Swc\ForumBundle\Entity\Traits;


trait CreatedBy
{
    /**
     * @var Swc\MainBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="Swc\MainBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    protected $createdBy;

    /**
     * @return Swc\MainBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param Swc\MainBundle\Entity\User $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }
}