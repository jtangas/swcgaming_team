<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/11/17
 * Time: 10:58 AM
 */

namespace Swc\ForumBundle\Entity\Traits;

use Swc\MainBundle\Entity\User;

trait CreatedBy
{
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Swc\MainBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    protected $createdBy;

    /**
     * @return User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param User $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }
}