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
       
        $symptoms = Symptom::all(); 
        $solutions = Solution::all(); 
        $rules = Rule::all(); 

      
        return view('pakar', compact('symptoms', 'rules', 'solutions'));
    }

    public function showform()
    {
       
        $symptoms = Symptom::all(); 
        $solutions = Solution::all(); 
        $rules = Rule::all(); 

      
        return view('form', compact('symptoms', 'rules', 'solutions'));
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
                'selected_symptoms' => 'required|string', 
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
