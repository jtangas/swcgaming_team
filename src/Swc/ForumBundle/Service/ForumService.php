<?php
/**
 * Created by PhpStorm.
 * User: justintangas
 * Date: 5/11/17
 * Time: 9:35 AM
 */

namespace Swc\ForumBundle\Service;


use Doctrine\ORM\EntityManager;
use Swc\ForumBundle\Entity\Forum;
use Swc\ForumBundle\Entity\Post;
use Swc\ForumBundle\Entity\Status;
use Swc\ForumBundle\Entity\Topic;
use Symfony\Component\VarDumper\VarDumper;

class ForumService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $forumRepo;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $statusRepo;

    /**
     * ForumService constructor.
     * @param EntityManager $em
     */
    public function __construct(
        EntityManager $em
    ) {
        $this->em = $em;
        $this->statusRepo = $this->em->getRepository(Status::class);
        $this->forumRepo = $this->em->getRepository(Forum::class);
    }

    /**
     * @param Forum $forum
     * @param Topic $topic
     * @param $post
     * @return null|object|Post
     */
    public function getPost(Forum $forum,Topic $topic, $post)
    {
        $activeStatus = $this->statusRepo->findBy(['name' => 'active', 'active' => true]);
        return $this->em->getRepository(Post::class)->findOneBy([
            'topic' => $topic,
            'titleClean' => $post,
            'status' => $activeStatus
        ]);
    }

    public function getPostReplies(Post $post)
    {
        $activeStatus = $this->statusRepo->findBy(['name' => 'active', 'active' => true]);
        return $this->em->getRepository(Post::class)->findBy([
            'parent' => $post,
            'status' => $activeStatus
        ]);
    }

    /**
     * @param Forum $forum
     * @param $topic
     * @return null|object|Topic
     */
    public function getTopic(Forum $forum, $topic)
    {
        $activeStatus = $this->statusRepo->findBy(['name' => 'active', 'active' => true]);
        return $this->em->getRepository(Topic::class)->findOneBy([
            'forum' => $forum,
            'cleanName' => $topic,
            'status' => $activeStatus]);
    }

    /**
     * @param $forum
     * @return null|object|Forum
     */
    public function getForum($forum)
    {
        return $this->forumRepo->findOneBy(['cleanName' => $forum]);
    }

    /**
     * @return array|\Swc\ForumBundle\Entity\Forum[]
     */
    public function getForums()
    {
        $activeStatus = $this->statusRepo->findBy(['name' => 'active', 'active' => true]);
        return $this->forumRepo->findBy(['status' => $activeStatus]);
    }


}