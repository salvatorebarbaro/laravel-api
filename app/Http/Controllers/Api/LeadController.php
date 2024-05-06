<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {

        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required|email',
            'message' => 'required'
        ], [
            'name.required' => "Devi inserire il tuo nome",
            'address.required' => "Devi inserire la tua email",
            'address.email' => "Devi inserire una mail corretta",
            'message.required' => "Devi inserire un messaggio",
        ]);

        // if it fails
        if($validator->fails()) {
            // return error message
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
            
        }

        $newLead = new Lead();
        // fill
        $newLead->fill($request->all());
        $newLead->save();

        Mail::to('alberto.arrighetti1571@gmail.com')->send(new NewContact($newLead));



        // respond to the customer here
        return response()->json([
            'success' => true,
            'message' => 'Richiesta di contatto inviata correttamente',
            'request' => $request->all()
        ]);
    }

}