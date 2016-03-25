<?php

namespace AppBundle\Command;

use AppBundle\Entity\Article;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ArticleListCommand
 * @package AppBundle\Command
 */
class ArticleListCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('article:list')
            ->setDescription('Show all articles in list or table mode')
            ->addOption('table', null, InputOption::VALUE_NONE, 'Show articles in table')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getEntityManager();
        $articles = $em->getRepository('AppBundle:Article')->findAll();
        $data = [];

        /** @var Article $article */
        foreach($articles as $article)
        {
            $data[] = [
                'id'    => $article->getId(),
                'title' => $article->getTitle()
            ];

            if (!$input->getOption('table')) {
                $output->writeln(sprintf('<info>-</info> ID: %d %s', $article->getId(), $article->getTitle()));
            }
        }

        if ($input->getOption('table')) {
            $table = new Table($output);
            $table
                ->setHeaders(['ID', 'Title'])
                ->setRows($data)
            ;
            $table->render();
        }
    }

    /**
     * @return EntityManager
     */
    private function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }
}
