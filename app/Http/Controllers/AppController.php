<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuration;
use Carbon\Carbon;

class AppController extends Controller
{
    //
    public function index()
    {
        $totalDepartements= Departement::all()->count();
        $totalEmployers= Employer::all()->count();
        $totalAdministrateurs= User::all()->count();

        //$appName = Configuration::where('type','APP_NAME')->first();

        $defaultPaymentDate= null;
        $paymentNotification= null;

        $currentDate = Carbon::now()->day;


        $defaultPaymentDateQuery = Configuration::where('type','PAYMENT_DATE')->first();


        if($defaultPaymentDateQuery)
        {
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertedPymentDate = intval($defaultPaymentDate);

            if($convertedPymentDate > $currentDate)
            {
                $paymentNotification = "Le paiement est prévu pour le $defaultPaymentDate. de ce mois";
            }
            elseif($convertedPymentDate == $currentDate)
            {
                $paymentNotification = "Le paiement est prévu pour aujourd'hui";
            }
            else
            {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->format('F');
                $paymentNotification = "Le paiement est prévu pour le " . $defaultPaymentDate." du  mois de " .$nextMonthName;
            }

        }
         
        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdministrateurs', 'paymentNotification'));
    }
}
