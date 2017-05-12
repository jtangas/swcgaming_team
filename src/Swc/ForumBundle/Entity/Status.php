<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/10/17
 * Time: 4:25 PM
 */

namespace Swc\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Status
 * @package Swc\ForumBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="status")
 */
class Status
{
    use Traits\DateAware;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="status_id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="status_name", type="string", length=64, nullable=false)
     */
    protected $name;

    /**
     * @var boolean
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active;

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
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }
}