<?php

namespace App\Reporting;

// use App\Reporting\Format\CSVFormater;
// use App\Reporting\Format\HTMLFormater;
// use App\Reporting\Format\HTMLSpecialFormater;
// use App\Reporting\Format\JSONFormater;

use App\Reporting\Format\FormaterInterface;

class ReportExtractor
{
    protected $formaters = [];

    public function addFormater(FormaterInterface $formater): void
    {
        $this->formaters[] = $formater;
    }

    // public function addJsonFormater(JSONFormater $jsonFormater): void
    // {
    //     $this->formaters[] = $jsonFormater;
    // }

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

        foreach ($this->formaters as $formater) {
            $results[] = $formater->format($report);
        }

        // $htmlFormateur = new HTMLFormater();
        // $jsonFormater = new JSONFormater();
        // $csvFormater = new CSVFormater();

        // $htmlSpecialFormater = new HTMLSpecialFormater();

        // $results[] = $htmlFormateur->format($report);
        // $results[] = $jsonFormater->format($report);
        // $results[] = $csvFormater->format($report);
        // $results[] = $htmlSpecialFormater->format($report);

        return $results;
    }
}
