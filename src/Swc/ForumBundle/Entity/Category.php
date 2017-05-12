<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/10/17
 * Time: 1:09 PM
 */

namespace Swc\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @package Swc\ForumBundle\Entity
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    use Traits\DateAware;
    use Traits\StatusAware;
    /**
     * @var int
     * @ORM\Column(name="category_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    protected $name;

    /**
     * @var bool
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    protected $locked;

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