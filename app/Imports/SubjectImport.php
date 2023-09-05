<?php

namespace App\Imports;


use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;


class SubjectImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {
        return $rows;
    }


}

