<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    //
    public function index()
    {
        $departements = Departement::paginate(10);
        return view('departements.index', compact('departements'));
    }
    public function create()
    {
        return view('departements.create');
    }
    public function edit(Departement $departement)
    {
       
        return view('departements.edit', compact('departement'));
    }

    //ACTION D'INTERACTION AVEC LABASE DE DONNEES
    public function store(Departement $departement, saveDepartementRequest $request)
    {
        try
        {
            $departement->name = $request->name;
            $departement->save();
            return redirect()->route('departement.index')->with('success', 'Département créé avec succès.');
        }
        catch
        (Exception $e)
        {
            dd($e) ;
        }
       

    }
    public function update(Departement $departement, saveDepartementRequest $request)
    {
        try
        {
            $departement->name = $request->name;
            $departement->update();
            return redirect()->route('departement.index')->with('success', 'Département mis a jour avec succès.');
        }
        catch
        (Exception $e)
        {
            dd($e) ;
        }
       

    }
    public function delete(Departement $departement)
    {
        try
        {
            $departement->delete() ;
           
            return redirect()->route('departement.index')->with('success', 'Département  á été  supprimé avec succès.');
        }
        catch
        (Exception $e)
        {
            dd($e) ;
        }
       

    }
  
}