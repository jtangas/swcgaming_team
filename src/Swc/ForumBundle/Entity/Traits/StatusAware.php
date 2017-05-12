<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/10/17
 * Time: 4:25 PM
 */

namespace Swc\ForumBundle\Entity\Traits;


use Swc\ForumBundle\Entity\Status;

trait StatusAware
{
    /**
     * @var Status
     * @ORM\ManyToOne(targetEntity="Swc\ForumBundle\Entity\Status")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="status_id")
     */
    protected $status;

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}