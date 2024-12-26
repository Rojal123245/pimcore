<?php
namespace App\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use App\Controller\AllDataController;
use App\Importers\AllDataImporter;

#[AsCommand(
    name: 'import:data',
    description: 'Imports data for brands, flavor and strain'
)]

class AllDataCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
           ->addArgument('dataobject', InputArgument::REQUIRED, 'Required the name of Data Object')
           ->addArgument('source', InputArgument::REQUIRED, 'Required the source of Data Object');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       
        $startTime = microtime(true);
        $dataobject = $input->getArgument('dataobject');
        $source = $input->getArgument('source');
        $controller = new AllDataController();
        $controller->importAction(
            new AllDataImporter(),
            $dataobject,
            $source
        );
        $endTime = microtime(true);
       return Command::SUCCESS;
    }
}

?>
