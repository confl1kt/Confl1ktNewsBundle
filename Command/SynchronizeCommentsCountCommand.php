<?php
namespace Confl1kt\NewsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeCommentsCountCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('sonata:news:sync-comments-count');
        $this->setDescription('Synchronize comments count');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $commentManager = $this->getContainer()->get('sonata.news.manager.comment');

        $commentManager->updateCommentsCount();

        $output->writeln(' done!');
    }
}
