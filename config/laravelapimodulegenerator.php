<?php

return [
    'modules' => [
        'PetStore2' => [
            'folder_path' => app_path(), // root path to save the file, default is under your current local path: ../../app/
            'namespace' => 'App',  // class prefix namespace
            'uri' => [
                [
                    'uri' => '/pets',
                    'rules' => [
                        'name' => 'required',
                        'id' => 'integer'
                    ],
                    'method' => 'get',
                    'function' => 'getPets'
                ],
                [
                    'uri' => '/pets',
                    'rules' => [
                        'name' => 'required|nullable',
                        'id' => 'integer'
                    ],
                    'method' => 'post',
                    'function' => 'createPet'
                ],
                [
                    'uri' => '/pets/{id}/{ss}',
                    'rules' => [
                        'name' => 'required',
                        'id' => 'integer'
                    ],
                    'method' => 'put',
                    'function' => 'updatePet'
                ],
                [
                    'uri' => '/pets/{i}',
                    'rules' => [
                        'name' => 'required',
                        'id' => 'integer'
                    ],
                    'method' => 'patch',
                    'function' => 'updatePetWithSomething'
                ],
            ],
            'models' => [
                'pet', 'store', 'customer'
            ]
        ]
    ]

];
