<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Registration::orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Registration ID',
            'Name',
            'Class',
            'Category',        // ✅ Added new column heading
            'Parent\'s Name',
            'Parent\'s Phone',
            'Email',
            'Address',
            'School/Institution',
            'Alternate Phone',
            'Date'
        ];
    }

    public function map($registration): array
    {
        // ✅ Determine Category based on grade
        $grade = $registration->grade;

        $category1 = ['তৃতীয় শ্রেণি', 'চতুর্থ শ্রেণি', 'পঞ্চম শ্রেণি', 'ষষ্ঠ শ্রেণি'];
        $category = in_array($grade, $category1) ? 'ক্যাটাগরী-১' : 'ক্যাটাগরী-২';

        return [
            $registration->id,
            $registration->registration_id,
            $registration->name,
            $registration->grade,
            $category,  // ✅ Output category
            $registration->parents_name,
            $registration->parents_phone,
            $registration->email,
            $registration->home_address,
            $registration->school,
            $registration->another_phone,
            $registration->created_at->format('Y-m-d H:i:s')
        ];
    }
}
