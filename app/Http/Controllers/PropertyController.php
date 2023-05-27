<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PropertyController extends Controller
{

        public function index(SearchPropertiesRequest $request)
        {

            $query = Property::query()->orderBy('created_at','desc');

            $validatedData = $request->validated();

                if (isset($validatedData['price'])) {
                    $query = $query->where('price', '<=', $validatedData['price']);
                    }

                  if (isset($validatedData['surface'])) {
                     $query = $query->where('surface', '>=', $validatedData['surface']);
                     }

                  if (isset($validatedData['rooms'])) {
                     $query = $query->where('rooms', '>=', $validatedData['rooms']);
                     }

                  if (isset($validatedData['title'])) {
                     $query = $query->where('title', 'like', '%' . $validatedData['title'] . '%');
                     }

                  return view('property.index', [
                 'properties' => $query->paginate(16),
                 'input' => $validatedData
                  ]);


        }

        public function show(string $slug, Property $property)
        {
            $expectedSlug = $property->getSlug();
            if($slug =! $expectedSlug)
            {
                return redirect()->route('property.show',['slug'=>$expectedSlug,'property'=>$property]);
            }

            return view('property.show',[
                'property'=> $property
            ]);

        }

        public function contact(Property $property, PropertyContactRequest $request)
        {
            // Valider les données du formulaire et les récupérer
             $data = $request->validate([
             'firstname' => 'required',
             'lastname' => 'required',
             'phone' => 'required',
             'email' => 'required|email',
             'message' => 'required',
                ]);

    // Envoyer l'e-mail
             Mail::to('admin@doe.fr')->send(new PropertyContactMail($property,$data));

    // Rediriger ou retourner une réponse
    // ...
    return Redirect::back()->with('success', 'Votre message a été envoyé avec succès.');
        }

}
