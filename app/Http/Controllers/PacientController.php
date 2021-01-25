<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PacientController extends Controller
{
    //

    public function schedule(){
        return \view('theme.frontoffice.pages.user.pacient.schedule');
    }

    public function back_schedule(User $user){
        return \view('theme.backoffice.pages.pacient.schedule',[
            'user' => $user
        ]);
    }

    public function appointments(){
        return \view('theme.frontoffice.pages.user.pacient.appointments');
    }

    public function back_appointments(User $user){
        return \view('theme.backoffice.pages.pacient.appointment',[
            'user' => $user
        ]);
    }

    public function prescripciones(){
        return \view('theme.frontoffice.pages.user.pacient.prescripciones');
    }

    public function invoices(){
        return \view('theme.frontoffice.pages.user.pacient.invoices');
    }


    public function back_invoices(User $user){
        return \view('theme.backoffice.pages.pacient.facturas',[
            'user' => $user
        ]);
    }
}
