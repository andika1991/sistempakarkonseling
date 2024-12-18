<?php

namespace App\Http\Controllers;
use App\Models\Symptom;
use App\Models\Solution;
use App\Models\Rule;
use App\Models\DaftarKonsultasi;

use Illuminate\Http\Request;

class CounselingController extends Controller
{
    public function showExpertSystem()
    {
        // Ambil data dari database
        $symptoms = Symptom::all(); // Mengambil semua data dari tabel symptoms
        $solutions = Solution::all(); // Mengambil semua data dari tabel solutions
        $rules = Rule::all(); // Mengambil semua data dari tabel rules

        // Kirim data ke view
        return view('pakar', compact('symptoms', 'rules', 'solutions'));
    }

    public function saveConsultation(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'solution_code' => 'required|string|max:255',
            'accuracy' => 'required|numeric|min:0|max:100',
        ]);

        // Simpan data ke dalam database
        $consultation = new DaftarKonsultasi();
        $consultation->name = $validated['name'];
        $consultation->class = $validated['class'];
        $consultation->solution_code = $validated['solution_code'];
        $consultation->accuracy = $validated['accuracy'];
        $consultation->save();

        // Redirect atau memberikan response setelah data berhasil disimpan
        return redirect()->route('home')->with('success', 'Hasil diagnosis berhasil disimpan!');
    }
    
}
