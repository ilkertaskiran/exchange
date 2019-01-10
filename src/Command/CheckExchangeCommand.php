<?php

namespace App\Command;

use App\Controller\RestController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CheckExchangeCommand extends Command
{
    protected static $defaultName = 'app:check-exchange';

    protected function configure()
    {
        $this
            ->setName('app:check-exchange')
            ->setDescription('...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        include_once '../Controller/ExchangeValueController.php';
        include_once '../Controller/AdapterController.php';

        $adapter = new AdapterController();
        $exchangeValue = new ExchangeValueController();

        $cleanDataArr = $adapter->getCleanData();
        $result = $exchangeValue->addByParams($cleanDataArr['eur'],$cleanDataArr['usd'],$cleanDataArr['gbp']);

        $output->writeln("Add operation is done");
    }
}
