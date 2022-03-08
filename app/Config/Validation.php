<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    public $register = [
        'name' => [
            'rules'  => 'required|min_length[3]|max_length[60]',
            'errors' => [
                'required' => 'Ingresa un nombre de usuairo',
                'min_length' => 'Tu nombre debe tener al menos 3 caracteres.',
                'max_length' => 'Tu nombre es demasiado largo.'
            ],
        ],
        'email' => [
            'rules'  => 'required|valid_email|is_unique[users.user_email]',
            'errors' => [
                'required' => 'Ingresa un correo electrónico',
                'valid_email' => 'El correo no es válido',
                'is_unique' => 'El correo ya está registrado.'
            ],
        ],
        'password'    => [
            'rules'  => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Ingresa una contraseña.',
                'min_length' => 'Tu contraseña es muy débil.',
                'max_length' => 'Tu contraseña es demasiado larga.'
            ],
        ],
        'r_password'    => [
            'rules'  => 'required|matches[password]',
            'errors' => [
                'required' => 'Repite la contraseña.',
                'matches' => 'Las contraseñas no coinciden.'
            ],
        ],
        'phone'    => [
            'rules'  => 'required|numeric|min_length[3]|max_length[100]|is_unique[phones.phone_number]',
            'errors' => [
                'required' => 'Ingresa un número de telefono.',
                'min_length' => 'Tu teléfono no parece válido.',
                'max_length' => 'Tu teléfono es demasiado largo.',
                'is_unique' => 'El teléfono ya está registrado',
                'numeric' => 'El teléfono debe contener sólo números'
            ],
        ],
    ];

    public $login = [
        'email' => [
            'rules'  => 'required|valid_email|is_not_unique[users.user_email]',
            'errors' => [
                'required' => 'Debes ingresar un correo',
                'valid_email' => 'El correo no es válido',
                'is_not_unique' => 'El correo ingresado no existe'
            ],
        ],
        'password'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Debes ingresar una contraseña',
            ],
        ],
    ];

    public $devices = [
        'serie' => [
            'rules'  => 'required|is_unique[devices.device_serie]',
            'errors' => [
                'required' => 'Ingresá un número de serie',
                'is_unique' => 'El dispositivo ya está registrado',
            ],
        ],
        'alias'    => [
            'rules'  => 'required|min_length[3]|max_length[10]',
            'errors' => [
                'required' => 'Ingresá un alias.',
                'min_length' => 'Es demasiado corto',
                'max_length' => 'Es demasiado largo'
            ],
        ],
    ];

    public $phone = [
        'phone'    => [
            'rules'  => 'required|numeric|min_length[3]|max_length[100]|is_unique[phones.phone_number]',
            'errors' => [
                'required' => 'Ingresa un número de telefono.',
                'min_length' => 'Tu teléfono no parece válido.',
                'max_length' => 'Tu teléfono es demasiado largo.',
                'is_unique' => 'El teléfono ya está registrado',
                'numeric' => 'El teléfono debe contener sólo números'
            ],
        ],
    ];

    public $edit_user = [
        'name' => [
            'rules'  => 'required|min_length[3]|max_length[60]',
            'errors' => [
                'required' => 'Ingresa un nombre de usuairo',
                'min_length' => 'Tu nombre debe tener al menos 3 caracteres.',
                'max_length' => 'Tu nombre es demasiado largo.'
            ],
        ],
        'email' => [
            'rules'  => 'required|valid_email|is_unique[users.user_email]',
            'errors' => [
                'required' => 'Ingresa un correo electrónico',
                'valid_email' => 'El correo no es válido',
                'is_unique' => 'El correo ya está registrado.'
            ],
        ],

    ]; 

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'my_list'   => 'App\Views\Validations\list_boostrap',
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
