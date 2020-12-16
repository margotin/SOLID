<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

interface FormaterInterface
{
    public function format(Report $report): string;
    // public function deserialize(string $str): Report;
}
