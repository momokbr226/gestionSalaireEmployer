<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    //
    public function index()
    {
        return view('employers.index');
    }
    public function create()
    {
        return view('employer.create');
    }
    public function edit(Employer $employer)
    {
       
        return view('employer.edit', compact('employer'));
    }
  
}