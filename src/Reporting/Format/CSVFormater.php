<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class CSVFormater implements FormaterInterface, DeserializerInterface
{
    public function format(Report $report): string
    {
        $contents = $report->getContents();

        $data = implode(";", $contents['data']);

        unset($contents['data']);

        return sprintf('%s;%s', implode(";", $contents), $data);
    }

    public function deserialize(string $str): Report
    {
        $contents = explode(";", $str);
        $data = [
            $contents[2],
            $contents[3]
        ];

        return new Report($contents[1], $contents[0], $data);
    }
}
