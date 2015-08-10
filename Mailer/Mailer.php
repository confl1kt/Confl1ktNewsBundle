<?php
namespace Confl1kt\NewsBundle\Mailer;

use Confl1kt\NewsBundle\Model\BlogInterface;
use Confl1kt\NewsBundle\Model\CommentInterface;
use Confl1kt\NewsBundle\Util\HashGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Templating\EngineInterface;

class Mailer implements MailerInterface
{
    protected $router;

    protected $templating;

    protected $emails;

    protected $hashGenerator;

    protected $mailer;

    protected $blog;

    /**
     * @param $mailer
     * @param BlogInterface $blog
     * @param \Confl1kt\NewsBundle\Util\HashGeneratorInterface $generator
     * @param \Symfony\Component\Routing\RouterInterface $router
     * @param \Symfony\Component\Templating\EngineInterface $templating
     * @param array $emails
     */
    public function __construct($mailer, BlogInterface $blog, HashGeneratorInterface $generator, RouterInterface $router, EngineInterface $templating, array $emails)
    {
        $this->blog          = $blog;
        $this->mailer        = $mailer;
        $this->hashGenerator = $generator;
        $this->router        = $router;
        $this->templating    = $templating;
        $this->emails        = $emails;
    }

    /**
     * @param CommentInterface $comment
     * @return mixed|void
     */
    public function sendCommentNotification(CommentInterface $comment)
    {
        $rendered = $this->templating->render($this->emails['notification']['template'], array(
            'comment' => $comment,
            'post'    => $comment->getPost(),
            'hash'    => $this->hashGenerator->generate($comment),
            'blog'    => $this->blog,
        ));

        $this->sendEmailMessage($rendered, $this->emails['notification']['from'], $this->emails['notification']['emails']);
    }

    /**
     * @param string $renderedTemplate
     * @param string $fromEmail
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $fromEmail, $toEmail)
    {
        // Render the email, use the first line as the subject, and the rest as the body
        $renderedLines = explode("\n", trim($renderedTemplate));
        $subject = $renderedLines[0];
        $body = implode("\n", array_slice($renderedLines, 1));

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($body);

        $this->mailer->send($message);
    }
}
