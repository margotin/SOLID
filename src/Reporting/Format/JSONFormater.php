<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class JSONFormater
{
    public function formatToJson(Report $report): string
    {
        return json_encode($report->getContents());
    }
}
