<?php

namespace Swc\ForumBundle\Controller;

use Swc\ForumBundle\Entity\Forum;
use Swc\ForumBundle\Entity\Topic;
use Swc\ForumBundle\Entity\Post;
use Swc\ForumBundle\Service\ForumService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\VarDumper\VarDumper;

class DefaultController extends Controller
{
    public function indexAction($forum = null, $topic = null, $post = null)
    {
        /**
         * @var ForumService $forumService;
         */
        $forumService = $this->get('forum');

        $template = 'SwcForumBundle:Default:404.html.twig';
        $options = [];

        $requestedForum = null;
        $requestedTopic = null;
        $requestedPost  = null;

        if ($forum != null) {
            $requestedForum = $forumService->getForum($forum);
        }

        if ($topic != null && $forum != null && $requestedForum instanceof Forum) {
            $requestedTopic = $forumService->getTopic($requestedForum, $topic);
        }

        if (
            $post != null &&
            $topic != null && $requestedTopic instanceof Topic &&
            $forum != null && $requestedForum instanceof Forum
        ) {
            $requestedPost = $forumService->getPost($requestedForum, $requestedTopic, $post);
        }

        if ($forum === null && $topic === null && $post === null) {
            $template = 'SwcForumBundle:Default:index.html.twig';
            $options = [
                'forums' => $forumService->getForums()
            ];
        }

        if ($requestedForum != null && $requestedTopic == null && $requestedPost == null) {
            $template = 'SwcForumBundle:Default:forum.html.twig';
            $options = [
                'forum' => $requestedForum
            ];

        } else if ($requestedTopic != null && $requestedForum != null & $requestedPost == null) {
            $template = 'SwcForumBundle:Default:topic.html.twig';
            $options = [
                'topic' => $requestedTopic
            ];
        } else if ($requestedPost != null && $requestedForum != null && $requestedPost != null) {
            $template = 'SwcForumBundle:Default:post.html.twig';
            $options = [
                'post' => $requestedPost,
                'replies' => $forumService->getPostReplies($requestedPost)
            ];
        }

        return $this->render($template, $options);
    }
}
