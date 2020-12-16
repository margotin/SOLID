<?php

namespace App\Reporting;

use App\Reporting\Report;

class StringReport extends Report
{
    public function getStringContents(): string
    {
        return "title:$this->title;date:$this->date;data:" . implode(",", $this->data);
    }
}
