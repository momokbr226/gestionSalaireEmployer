<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\submitDefineAccessRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\ResetCodePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

use Illuminate\Support\Facades\Hash;
use App\Notifications\SendEmailToAdminAfterRegistrationNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;



class AdminController extends Controller
{
    //
    public function index()
    {
        $admins = User::paginate(10);
        return view('admins/index', compact('admins'));
        
        
    }
    
    public function create()
    {
        return view('admins/create');
    }
    public function edit(User $user)
    {
        return view('admins/edit', compact('user'));
    }

//Enregister un admin et envoyer un mail de confirmation
    public function store(StoreAdminRequest $request)
    {

        try{
            //Creation de compte admin
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make('default');
            $user->save();

            //Envoie de mail de confirmation

            //envoyer un code par email pour verification
            if($user)
            {
                try{
                    ResetCodePassword::where('email', $user->email)->delete();
                    $code = rand(100000, 4000);

                    $data=
                    [
                        'code' => $code,
                        'email' => $user->email
                    ];
                    ResetCodePassword::create($data);
                    
                    Notification::route('mail', $user->email)->notify(new SendEmailToAdminAfterRegistrationNotification($code, $user->email));

                    //rediriger vers la page de connexion
                    return redirect()->route('administrateurs')->with('success', 'L\'administrateur a été créé avec succès. Un mail de confirmation a été envoyé à l\'adresse '.$user->email);

                }
                catch(Exception $e)
                {
                    dd($e);
                    return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi du mail de confirmation.');
                }
            
            }

        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de l\'administrateur.');
        }
    }

    public function update(UpdateAdminRequest $request, User $user)
    {
        try{           
            //Mise à jour de compte admin

        }
        catch(Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'administrateur.');
        }
    }

    public function delete(User $user)
    {
         try
        {
            $user->delete() ;
           
            return redirect()->route('administrateurs')->with('success', 'L\'administrateur  á été  supprimé avec succès.');
        }
        catch
        (Exception $e)
        {
            dd($e) ;
        }
    }
    
    public function defineAccess($email)
    {
        try{
            $checkUserExist= User::where('email', $email)->first();
            if($checkUserExist)
            {
                $code = ResetCodePassword::where('email', $email)->first();
                if($code)
                {
                    return view('auth.validate-account', compact('email'));
                }
                else
                {
                    //Si le code n'existe pas, on redirige vers la page de connexion
                    return redirect()->route('login')->with('error', 'Aucun code de validation trouvé pour cet email.');
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Aucun compte trouvé pour cet email.');
            }
        }
        catch(Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la validation du compte.');
        }
    }

    public function submitDefineAccess(submitDefineAccessRequest $request)
    {
       try{
            $user = User::where('email', $request->email)->first();
            if($user)
            {
                $user->password = Hash::make($request->password);
                $user->email_verified_at = Carbon::now();
                $user->update();

                return redirect()->route('login')->with('success', 'Vos accèss ont été correctement defini .');
            }
       }
       catch(Exception $e)
       {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la validation du compte.');
       }
    }

}
