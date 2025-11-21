<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\ContactEmailDemande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContacteController extends Controller
{
    public function contacte(Request $request){
        
        $validated = $request->validate([
            'name' =>'required|string|max:100',
            'email' => 'required|email',
            'phone' =>'required|string|max:20',
            'need' => 'required|string|max:1000'
        ]);
        Mail::to('service.client@fly-fret.com')->send(new ContactEmail($validated));
        return back()->with('success', 'Merci pour votre message ! Nous vous contacterons bientôt.');
    }

    public function demandeForm(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:100',
            'client-type' => 'required|string',
            'budget' => 'nullable|string',
            'services' => 'required|array|min:1',
            'services.*' => 'string',
            'deadline' => 'nullable|string|max:50',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L’email est obligatoire.',
            'email.email' => 'L’adresse email doit être valide.',
            'client-type.required' => 'Veuillez sélectionner un type de client.',
            'services.required' => 'Sélectionnez au moins un service.',
            'message.required' => 'Veuillez décrire votre projet.',
        ]);
        // ✅ Envoi de l’email
        Mail::to('service.client@fly-fret.com')->send(new ContactEmailDemande($validated));

        // ✅ Retour avec message de succès
        return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement !');
    
    }
}
