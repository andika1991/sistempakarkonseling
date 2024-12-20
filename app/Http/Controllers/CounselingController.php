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

    public function saveconsultation(Request $request)
    {
        try {
       
    
            // Validate the data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'class' => 'required|string|max:255',
                'solution_code' => 'required|string|max:255',
                'accuracy' => 'required',
                'selected_symptoms' => 'required|string', // Assuming this field holds selected symptoms
            ]);
    
          
    
            // Save the data to the database
            $consultation = DaftarKonsultasi::create([
                'name' => $validated['name'],
                'class' => $validated['class'],
                'solution_code' => $validated['solution_code'],
                'accuracy' => $validated['accuracy'],
                'selected_symptoms' => $validated['selected_symptoms'],
            ]);
    
          
    
            return redirect()->back()->with('success', 'Hasil konsultasi berhasil disimpan.');
        } catch (\Exception $e) {
       
  
    
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan hasil konsultasi. Silakan coba lagi.');
        }
    }
    
    
}
