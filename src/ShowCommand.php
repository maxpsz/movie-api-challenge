<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use GuzzleHttp\ClientInterface;

class ShowCommand extends Command
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;

        parent::__construct();
    }

    public function configure()
    {
        $this->setName('show')
            ->setDescription('Get movie info')
            ->addArgument('movieName', InputArgument::REQUIRED)
            ->addOption('fullPlot', null, InputOption::VALUE_NONE, "Get movie's full plot");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $movieName = $input->getArgument("movieName");
        $fullPlot = $input->getOption("fullPlot");

        $baseUrl = $_ENV["API_BASE_URL"];
        $apiKey = $_ENV["API_KEY"];
        $request = "{$baseUrl}/?apikey={$apiKey}";

        if ($movieName) {
            $request = $request . "&t={$movieName}";
        }

        if ($fullPlot) {
            $request = $request . "&plot=full";
        }

        $response = $this->client->get($request);
        $data = json_decode($response->getBody());
        $keys = array_keys(json_decode($response->getBody(), true));
        $table = new Table($output);

        $excluded_keys = ["Ratings"];
        foreach ($keys as $key) {
            if (in_array($key, $excluded_keys)) { continue; }
            $table->addRow([$key, $data->$key]);
        }

        $table->render();
    }
}
