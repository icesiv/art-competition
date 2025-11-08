<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Excel as ExcelType;

class AdminController extends Controller
{
    private $adminPin = '770022'; // Change this

    public function index(Request $request)
    {
        if (!session('admin_authenticated')) {
            return view('admin.login');
        }

        $registrations = Registration::orderBy('created_at', 'desc')
            ->paginate(50);

        $totalRegistrations = Registration::count();

        return view('admin.dashboard', compact('registrations', 'totalRegistrations'));
    }

    public function login(Request $request)
    {
        if ($request->pin === $this->adminPin) {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'ভুল পিন!');
    }

    public function logout()
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.dashboard');
    }

    public function exportCsv()
    {
        if (!session('admin_authenticated')) {
            abort(403);
        }

        $registrations = Registration::orderBy('created_at', 'desc')->get();

        $filename = 'registrations_' . date('Y-m-d') . '.csv';
        $handle = fopen('php://output', 'w');

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Add BOM for UTF-8
        fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($handle, [
            'Registration ID', 'Name', 'Class', 'Category', 'special_needs' ,
           'Parents Name', 'Parents Phone', 'Email', 'Address', 
           'School/Institution', 'Other Phone', 'Date'
        ]);

        foreach ($registrations as $reg) {
               $grade = $reg->grade;

        $category1 = ['তৃতীয় শ্রেণি', 'চতুর্থ শ্রেণি', 'পঞ্চম শ্রেণি', 'ষষ্ঠ শ্রেণি'];
        $category = in_array($grade, $category1) ? 'ক্যাটাগরী-১' : 'ক্যাটাগরী-২';

            fputcsv($handle, [
                $reg->registration_id,
                $reg->name,
                $grade,
                $category,
                $reg->special_needs,
                $reg->parents_name,
                $reg->parents_phone,
                $reg->email,
                $reg->home_address,
                $reg->school,
                $reg->another_phone,
                $reg->created_at->format("d M Y h:i A")
            ]);
        }

        fclose($handle);
        exit;
    }

    public function exportExcel()
    {
        if (!session('admin_authenticated')) {
            abort(403);
        }

        return Excel::download(new RegistrationsExport, 'registrations_' . date('d-M') . '.xlsx', ExcelType::XLSX);
    }
}