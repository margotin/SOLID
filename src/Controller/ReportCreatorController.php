<?php

namespace App\Controller;

use App\Reporting\Format\HTMLFormater;
use App\Reporting\Format\JSONFormater;
use App\Reporting\Report;

class ReportCreatorController
{
    public function show()
    {
        require_once(TEMPLATES_DIR . 'report-creator/show.html.php');
    }

    public function execute()
    {
        // Extraction des données, on fait au plus simple / rapide mais ce serait à revoir
        $date = $_POST['date'];
        $title = $_POST['title'];
        $data = $_POST['data'];
        $format = $_POST['format'];

        // Début de l'algorithme
        $report = new Report($date, $title, $data);

        if ($format === "html") {
            $formater = new HTMLFormater();
            $reportResult = $formater->formatToHtml($report);
        } else {
            $formater = new JSONFormater();
            $reportResult = $formater->formatToJson($report);
        }

        require_once(TEMPLATES_DIR . 'report-creator/result.html.php');
    }
}
