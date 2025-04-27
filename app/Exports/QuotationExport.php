<?php

namespace App\Exports;

use App\Models\Quotation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuotationExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Quotation::select('name', 'email', 'phone', 'created_at')->latest()->get();
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone', 'Submitted At'];
    }
}
