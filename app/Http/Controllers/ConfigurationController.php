<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigRequest;
use App\Models\Configuration;
use Exception;
use Illuminate\Http\Request;
use PSpell\Config;

class ConfigurationController extends Controller
{
    //
    public function index()
    {
        $allConfigurations = Configuration::latest()->paginate(10);
        return view('/configurations/index', compact('allConfigurations'));
    }
    public function create()
    {
        return view('configurations.create');
    }

    public function store(StoreConfigRequest $request)
    {
        try
        {
            Configuration::create($request->all());
            return redirect()->route('configurations')->with('success', 'Configuration créée avec succès');
        }
        catch
        (Exception $e)
        {
            return redirect()->back()->with('error', 'Erreur lors de la création de la configuration');
        }
        
    }

    public function delete(Configuration $configuration)
    {
        try
        {
            $configuration->delete();
            return redirect()->route('configurations')->with('success', 'Configuration supprimée avec succès');
        }
        catch
        (Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', 'Erreur lors de la suppression de la configuration');
        }
    }
}
