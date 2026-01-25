<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'service'  => 'required|string',
        ]);

        
        Appointment::create($validated);

        
        return back()->with('success', 'Agendamento realizado com sucesso!');
    }
}