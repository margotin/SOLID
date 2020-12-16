<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class CSVFormater
{
    public function formatToCsv(Report $report): string
    {
        $contents = $report->getContents();


        $data = implode(";", $contents['data']);

        unset($contents['data']);

        return sprintf('%s;%s', implode(";", $contents), $data);
    }
}
