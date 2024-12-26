<?php
namespace App\Controller;

use Symfony\Component\Console\Output\ConsoleOutput;
use App\Importers\AllDataImporter;

class AllDataController
{


    public function importAction(AllDataImporter $allDataImporter, $dataobject, $source){
        $output = new ConsoleOutput();
        $output->writeln('Importing data for ' . $dataobject);

        $allDataImporter->processImport($output, $dataobject, $source);

        $output->writeln('Data imported successfully');
    }
}

?>