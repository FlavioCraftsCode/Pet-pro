<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'service'  => 'required|string',
        ]);

        // Salva no banco de dados
        Appointment::create($validated);

        // Volta com mensagem de sucesso
        return back()->with('success', 'Agendamento realizado com sucesso!');
    }
}