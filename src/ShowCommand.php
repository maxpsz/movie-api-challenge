<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class ShowCommand extends Command
{
    public function configure()
    {
        $this->setName('show')
            ->setDescription('Get movie info')
            ->addArgument('movieName', InputArgument::REQUIRED)
            ->addOption('fullPlot', null, InputOption::VALUE_OPTIONAL, "Get movie's full plot", 'Hello');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $movieName = $input->getArgument("movieName");
        $output->writeln("<info>Searching movie: {$movieName}</info>");

        $this->showMovieInfo($output);
    }

    private function showMovieInfo(OutputInterface $output)
    {
        $table = new Table($output);

        $table->setHeaders([])
            ->setRows([])
            ->render();
    }
}
