<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:100',
            'parents_name' => 'required|string|max:255',
            'parents_phone' => 'required|string|size:11',
            'email' => 'nullable|email|max:255',
            'home_address' => 'required|string',
            'school' => 'required|string|max:255',
            'another_phone' => 'nullable|string|size:11',
        ]);

        $registration = Registration::create($validated);

        return redirect()->route('registration.index')
            ->with('success', 'রেজিস্ট্রেশন সফল হয়েছে!')
            ->with('registration_id', $registration->registration_id)
            ->with('parents_phone', $registration->parents_phone);
    }

    public function download(Request $request)
    {
        $request->validate([
            'registration_id' => 'required|string',
            'parents_phone' => 'required|string|size:11',
        ]);

        $registration = Registration::where('registration_id', $request->registration_id)
            ->where('parents_phone', $request->parents_phone)
            ->first();

        if (!$registration) {
            return back()->with('error', 'রেজিস্ট্রেশন আইডি এবং ফোন নম্বর মিলছে না!');
        }

        return $this->viewAdmitCard($request->registration_id, $request->parents_phone);
    }

    public function downloadDirect($registrationId, $phone)
    {
        $registration = Registration::where('registration_id', $registrationId)
            ->where('parents_phone', $phone)
            ->first();

        if (!$registration) {
            abort(404);
        }

        return $this->viewAdmitCard($registration->registration_id, $phone);
    }

    public function viewAdmitCard($registrationId, $phone)
    {
        $registration = Registration::where('registration_id', $registrationId)
            ->where('parents_phone', $phone)
            ->first();

        if (!$registration) {
            abort(404, 'Registration not found or phone does not match.');
        }

        $qrText = "ID: {$registrationId}\n" .
            "Phone: {$phone}\n" .
            "Parent: {$registration->parents_name}\n";

$qrCode = base64_encode(
    QrCode::format('png')
        ->encoding('UTF-8')
        ->size(200)
        ->errorCorrection('H')
        ->generate($qrText)
);

        return view('registration.admit-card-html', compact('registration', 'qrCode'));
    }
}
