<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{

    public function collection()
    {
        return User::with('country')->get()->map(function ($user) {
            return [
                'names' => $user->names,
                'lastnames' => $user->lastnames,
                'email' => $user->email,
                'gender' => $user->gender,
                'country' => $user->country ? $user->country->name : null, 
                'phone' => $user->phone,   
                'address' => $user->address,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Names',
            'Lastnames',
            'Email',
            'Gender',
            'Country',
            'Phone Number',
            'Address',
        ];
    }
   
    public function styles(Worksheet $sheet)
    {
        return [
            // Apply styles to the first row (headings)
            1    => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'], // White text color
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['argb' => 'FF4CAF50'], // Green background color
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ]
            ],
        ];
    }
}
