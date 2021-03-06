<?php

namespace App\Exports;

use App\Link;
use Maatwebsite\Excel\Concerns\FromCollection;

class LinksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Link::select('id','title','link','description','keywords','created_at')->get();
    }
}
