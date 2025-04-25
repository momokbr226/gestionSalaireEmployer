<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;
use Exception;

class EmployerController extends Controller
{
    //
    public function index()
    {
        $employers = Employer::with('departement')->paginate(10);
        return view('employers.index', compact('employers'));
    }
    public function create()
    {
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }
    public function edit(Employer $employer)
    {
        $departements = Departement::all();
        return view('employers.edit', compact('employer', 'departements'));
    }

    public function store(Employer $employer ,StoreEmployerRequest $request)
    {
        try{
            $query = Employer::create($request->all());
        if ($query) {
            return redirect()->route('employer.index')->with('success', 'Employé créé avec succès');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'employé');
        }

        }

        catch(Exception $e){
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'employé');
        }
        

    }

    public function update(Employer $employer, UpdateEmployerRequest $request)
    {
        try{
                $employer->nom = $request->nom;
                $employer->prenom = $request->prenom;
                $employer->email = $request->email;
                $employer->contact = $request->contact;
                $employer->montant_journalier = $request->montant_journalier;
                $employer->departement_id = $request->departement_id;
                $employer->update();

                return redirect()->route('employer.index')->with('success', 'Employé modifié avec succès');

        }
        
        catch(Exception $e){
            return redirect()->back()->with('error', 'Erreur lors de la modification de l\'employé');
        
        }
    }

     public function delete(Employer $employer)
    {
        try
        {
            $employer->delete() ;
           
            return redirect()->route('employer.index')->with('success', 'L\'employer  á été  supprimé avec succès.');
        }
        catch
        (Exception $e)
        {
            dd($e) ;
        }
       

    }
}