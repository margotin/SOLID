<?php

namespace App\Controller;

use App\Reporting\Format\CSVFormater;
use App\Reporting\Format\HTMLFormater;
use App\Reporting\Format\HTMLSpecialFormater;
use App\Reporting\Format\JSONFormater;
use App\Reporting\Report;
use App\Reporting\ReportExtractor;

class BulkReportController
{
    public function show()
    {
        require_once(TEMPLATES_DIR . 'bulk-report/show.html.php');
    }

    public function execute()
    {
        // Extraction des données, on fait au plus simple / rapide mais ce serait à revoir
        $date = $_POST['date'];
        $title = $_POST['title'];
        $data = $_POST['data'];

        // Début de l'algorithme
        $report = new Report($date, $title, $data);

        $extractor = new ReportExtractor();

        $extractor->addFormater(new HTMLFormater);
        $extractor->addFormater(new JSONFormater);
        $extractor->addFormater(new HTMLSpecialFormater);
        $extractor->addFormater(new CSVFormater);

        $results = $extractor->process($report);

        require_once(TEMPLATES_DIR . 'bulk-report/result.html.php');
    }
}
