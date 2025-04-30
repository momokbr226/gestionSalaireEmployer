<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Configuration;
use Carbon\Carbon;
use App\Models\Employer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class PaymentController extends Controller
{
    //

    public function index()
    {
        $defaultPaymentDateQuery = Configuration::where('type','PAYMENT_DATE')->first();
        $defaultPaymentDate = $defaultPaymentDateQuery->value;
        $convertedPaymentDate = intval($defaultPaymentDate);
        $payments = Payment::latest()->orderBy('id', 'desc')->paginate(10);

        $today = date('d');
        $isPaymentDay = false;
        if($today == $convertedPaymentDate)
        {
            $isPaymentDay = true;

        }
        return view('paiements.index', compact('payments', 'isPaymentDay'));

    }

    public function initPayment()
    {
        $monthMapping = ['JANUARY'=>'JANVIER',
        'FEBRUARY'=>'FEVRIER',
        'MARCH' => 'MARS',
        'APRIL' => 'AVRIL',
        'MAY' => 'MAI',
        'JUNE' => 'JUIN',
        'JULY' => 'JUILLET',
        'AUGUST' => 'AOUT',
        'SEPTEMBER' => 'SEPTEMBRE',
        'OCTOBER' => 'OCTOBRE',
        'NOVEMBRE' => 'NOVEMBRE',
        'DECEMBER' => 'DECEMBRE' ];

        $currentMonth = strtoupper($currentMonthName = Carbon::now()->format('F'));
        //mois en cours en francais
        $currentMonthInFrench = $monthMapping[$currentMonth] ?? null;

        //annee en cours 
        $currentYear = Carbon::now()->format('Y');

        //simuler des paiement pour tous les employers dans le mois en cours.Les paiements concerncent les employers qui n'ont pas encore été payés dans le mois actuel.


        //recuperer la liste des employer qui n'ont pas ete payer pour le mois en cours
        $employers = Employer::whereDoesntHave('payments', function($query) use ($currentMonthInFrench, $currentYear)
        {
            $query->where('month', '=',$currentMonthInFrench)
                  ->where('year', '=', $currentYear);
        })->get();

        if($employers->count() ==0)
        {
            return redirect()->back()->with('error_msg', 'Tous les employers ont été payés');
        }

        //faire les paiements pour ces employers
        foreach($employers as $employer)
        {
            $aEtePayer= $employer->payments()->where('month','=', $currentMonthInFrench)->where('year','=', $currentYear)->exists();
            if(!$aEtePayer)
            {
                $salaire = $employer->montant_journalier*31;

                $payment = new Payment([
                    'reference' => strtoupper(Str::random(10)),
                    'employer_id' => $employer->id,
                    'amount' => $salaire,
                    'status' => 'SUCCESS',
                    'month' => $currentMonthInFrench,
                    'year' => $currentYear,
                    'launch_date' => Carbon::now(),
                    'done_time' => Carbon::now(),
                ]);
                $payment->save();
                //enregistrer le paiement
                
            }

           
        }
        //rediriger l'utilisateur
        return redirect()->back()->with('success', 'Les paiements ont été effectués avec succès pour le mois de '.$currentMonthInFrench.' '.$currentYear);
    }

    public function download_invoice(Payment $payment)
    {
        try
        {
            $fullPaymentInfo = Payment::with('employer')->find($payment->id);
            //Generer le pdf
            $pdf = PDF::loadView('paiements.facture', compact('fullPaymentInfo'));
            return $pdf->download('facture_'.$fullPaymentInfo->employer->nom.'.pdf');



           //return view('paiements.facture', compact('fullPaymentInfo'));


        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error_msg', 'Erreur lors du téléchargement de la facture');
        }
    
    }
}