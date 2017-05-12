<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/12/17
 * Time: 8:53 AM
 */

namespace Swc\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 * @package Swc\MainBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}