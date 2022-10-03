<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        //dd($input);
        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'prenom' => ['required', 'string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'prenom' => ['required', 'string', 'max:255'],
            'genre' => ['required'],
            'dateNaissance' => ['required'],
            'paysNaissance' => ['required'],
            'nationalite' => ['required'],
            'codePostal' => ['required'],
            'pays' => ['required'],
            'telephone' => ['required'],
            'contactAnnex' => ['required'],
            
        ])->validate();

        
        error_log("=====================================================");


        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'genre' => $input['genre'],
            'prenom' => $input['prenom'],
            'dateNaissance' => $input['dateNaissance'],
            'paysNaissance' => $input['paysNaissance'],
            'nationalite' => $input['nationalite'],
            'codePostal' => $input['codePostal'],
            'pays' => $input['pays'],
            'telephone' => $input['telephone'],
            'contactAnnex' => $input['contactAnnex'],
            
        ]);
    }
}
