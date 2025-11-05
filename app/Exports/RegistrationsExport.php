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
            'আইডি',
            'রেজিস্ট্রেশন আইডি',
            'নাম',
            'শ্রেণী',
            'অভিভাবকের নাম',
            'অভিভাবকের ফোন',
            'ইমেইল',
            'ঠিকানা',
            'স্কুল/প্রতিষ্ঠান',
            'অন্য ফোন',
            'তারিখ'
        ];
    }

    public function map($registration): array
    {
        return [
            $registration->id,
            $registration->registration_id,
            $registration->name,
            $registration->grade,
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