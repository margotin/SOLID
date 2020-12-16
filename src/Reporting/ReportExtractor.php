<?php

namespace App\Reporting;

use App\Reporting\Format\CSVFormater;
use App\Reporting\Format\HTMLFormater;
use App\Reporting\Format\HTMLSpecialFormater;
use App\Reporting\Format\JSONFormater;

class ReportExtractor
{

    /**
     * Doit afficher l'ensemble des formats possibles pour un rapport en se servant
     * des formatters ajoutés dans le tableau
     *
     * @param Report $report
     *
     * @return array
     */
    public function process(Report $report): array
    {
        $results = [];
        $htmlFormateur = new HTMLFormater();
        $jsonFormater = new JSONFormater();
        $csvFormater = new CSVFormater();

        $htmlSpecialFormater = new HTMLSpecialFormater();

        $results[] = $htmlFormateur->format($report);
        $results[] = $jsonFormater->format($report);
        $results[] = $csvFormater->format($report);
        $results[] = $htmlSpecialFormater->format($report);

        return $results;
    }
}
