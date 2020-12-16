<?php

namespace App\Reporting\Format;

use App\Reporting\Format\HTMLFormater;
use App\Reporting\Report;

class HTMLSpecialFormater extends HTMLFormater
{
    public function formatToHtml(Report $report): string
    {
        $html = parent::formatToHtml($report);
        return "
            <div style='font-weight:bold;'>
            $html
            </div>
        ";
    }
}
