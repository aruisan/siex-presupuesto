<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemplateExport implements  FromView
{

    public function  __construct(string $select) {
        $this->select = $select;
    }

   public function view(): View
    {
        return view('exports.templates', [
            'select' => $this->select
        ]);
    }
}
