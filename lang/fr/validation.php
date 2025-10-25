<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le :attribute doit être accepté.',
    'accepted_if' => 'Le :attribute doit être accepté quand :other est :value.',
    'active_url' => 'Le :attribute n\'est par une URL valide.',
    'after' => 'Le :attribute doit être une date après le :date.',
    'after_or_equal' => 'Le :attribute doit être une date après ou égale à :date.',
    'alpha' => 'Le :attribute doit contenir uniquement des lettres alphabétiques.',
    'alpha_dash' => 'Le  :attribute ne doit contenire que des lettres, des nombres, des tirets et des tirets bas.',
    'alpha_num' => 'The :attribute doit seulement contenir des lettres et des chiffres.',
    'array' => 'The :attribute doit être un tableau.',
    'before' => 'The :attribute doit être une date avant :date.',
    'before_or_equal' => 'The :attribute doit être une date avant ou égale à :date.',
    'between' => [
        'numeric' => 'Le :attribute doit être entre :min et :max.',
        'file' => 'Le :attribute doit être entre :min et :max kilobytes.',
        'string' => 'Le :attribute doit être entre :min et :max caractères.',
        'array' => 'Le :attribute doit avoir entre :min et :max items.',
    ],
    'boolean' => 'Le :attribute champ doit être vrai ou faux.',
    'confirmed' => 'Le :attribute confirmation does not match.',
    'current_password' => 'Le mot de passe est incorrecte.',
    'date' => 'Le :attribute n\'est pas une date valide.',
    'date_equals' => 'Le :attribute doit être un date égale à :date.',
    'date_format' => 'Le format de l\' :attribute ne correspond pas au format :format.',
    'declined' => 'Le :attribute doit être refusé.',
    'declined_if' => 'Le :attribute must be declined when :other is :value.',
    'different' => 'Le :attribute et l\' :other doivent être différents.',
    'digits' => 'Le :attribute doit être de :digits digits.',
    'digits_between' => 'Le :attribute doit être entre :min and :max digits.',
    'dimensions' => 'Le :attribute contient des dimensions d\'image invalides.',
    'distinct' => 'Le :attribute champ a une valeur dupliquée.',
    'email' => 'Le :attribute doit être un courriel valide.',
    'ends_with' => 'Le :attribute doit se terminé avec la following: :values.',
    'enum' => 'Le :attribute sélectionné est valide.',
    'exists' => 'Le :attribute sélectionné est invalide.',
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le :attribute doit être plus grand que:value.',
        'file' => 'Le :attribute doit être plus grand que:value kilobytes.',
        'string' => 'Le :attribute doit être plus grand que:value characters.',
        'array' => 'Le :attribute doit avoirmore than :value items.',
    ],
    'gte' => [
        'numeric' => 'Le :attribute doit être plus grand ou égal à :value.',
        'file' => 'Le :attribute doit être plus grand ou égal à :value kilobytes.',
        'string' => 'Le :attribute doit être plus grand ou égal à :value characters.',
        'array' => 'Le :attribute doit avoir:value items or more.',
    ],
    'image' => 'Le :attribute must be an image.',
    'in' => 'Le selected :attribute is invalid.',
    'in_array' => 'Le :attribute n\'existe pas dans :other.',
    'integer' => 'Le :attribute doit être un nombre.',
    'ip' => 'Le :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'Le :attribute doit être moins que :value.',
        'file' => 'Le :attribute doit être moins que :value kilobytes.',
        'string' => 'Le :attribute doit être moins que :value caractères.',
        'array' => 'Le :attribute doit avoir moins que :value items.',
    ],
    'lte' => [
        'numeric' => 'Le :attribute doit être moins ou égal à :value.',
        'file' => 'Le :attribute doit être moins ou égal à :value kilobytes.',
        'string' => 'Le :attribute doit être moins ou égal à :value caractères.',
        'array' => 'Le :attribute ne doit pas avoir plus de :value items.',
    ],
    'mac_address' => 'Le :attribute doit être un adresse MAC valide.',
    'max' => [
        'numeric' => 'Le :attribute ne doit pas être plus grand que :max.',
        'file' => 'Le :attribute ne doit pas être plus grand que :max kilobytes.',
        'string' => 'Le :attribute ne doit pas être plus grand que :max characters.',
        'array' => 'Le :attribute ne doit pas avoir plus que :max items.',
    ],
    'mimes' => 'Le :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le :attribute doit être au moins :min.',
        'file' => 'Le :attribute doit avoir au moins :min kilobytes.',
        'string' => 'Le :attribute doit avoir au moins :min characters.',
        'array' => 'Le :attribute doit avoir au moins :min items.',
    ],
    'multiple_of' => 'Le :attribute must be a multiple of :value.',
    'not_in' => 'Le selected :attribute is invalid.',
    'not_regex' => 'Le :attribute format is invalid.',
    'numeric' => 'Le :attribute must be a number.',
    'password' => 'Le password is incorrect.',
    'present' => 'Le :attribute field must be present.',
    'prohibited' => 'Le :attribute field is prohibited.',
    'prohibited_if' => 'Le :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'Le :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'Le :attribute field prohibits :other from being present.',
    'regex' => 'Le :attribute format is invalid.',
    'required' => 'Le :attribute field is required.',
    'required_array_keys' => 'Le :attribute field must contain entries for: :values.',
    'required_if' => 'Le :attribute field is required when :other is :value.',
    'required_unless' => 'Le :attribute field is required unless :other is in :values.',
    'required_with' => 'Le :attribute champ est requis lorsque la :values est présente.',
    'required_with_all' => 'Le :attribute champ est requis quand les :values sont présentes.',
    'required_without' => 'Le :attribute champ est requis quant les :values ne sont pas présentes.',
    'required_without_all' => 'Le :attribute champ est requis lorsque qu\'aucune des :values sont présentes.',
    'same' => 'Le :attribute et le :other doivent être identiques.',
    'size' => [
        'numeric' => 'Le :attribute doit être :size.',
        'file' => 'Le :attribute doit être :size kilobytes.',
        'string' => 'Le :attribute doit être de :size characters.',
        'array' => 'Le :attribute doit contenir :size items.',
    ],
    'starts_with' => 'Le :attribute doit commencre par une des Le following: :values.',
    'string' => 'Le :attribute doit être une chaîne de caractères.',
    'timezone' => 'Le :attribute doit être un valide timezone.',
    'unique' => 'Le :attribute a déjà été pris.',
    'uploaded' => 'Le :attribute n\'a pas été téléchargé.',
    'url' => 'Le :attribute doit être une URL valide.',
    'uuid' => 'Le :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Le
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
