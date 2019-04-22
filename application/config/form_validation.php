<?php

    $config = array(

        //controlleur + method qui charge la vue client
        'clientController/clientView' => array(

            array(
                'field' => 'name',
                'label' => 'Nom',
                'rules' => 'required'
            ),

            array(
                'field' => 'phone',
                'label' => 'telephone',
                'rules' => 'required'
            ),

            array(
                'field' => 'mail',
                'label' => 'email',
                'rules' => 'required'
            ),

            array(
                'field' => 'gender',
                'label' => 'genre',
                'rules' => 'required'
            ),

            array(
                'field' => 'age',
                'label' => 'Age',
                'rules' => 'required'
            )
        ),

        // controlleur + methode qui charge la vue agent 
        'agentController/agentView' => array(

            array(
                'field' => 'name',
                'label' => 'Nom',
                'rules' => 'required'
            ),

            array(
                'field' => 'matricule',
                'label' => 'Matricule',
                'rules' => 'required'
            ),

            array(
                'field' => 'photo',
                'label' => 'Photo',
                'rules' => 'required'
            ),

            array(
                'field' => 'adresse',
                'label' => 'Adresse',
                'rules' => 'required'
            ),

            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required'
            ),

            array(
                'field' => 'mail',
                'label' => 'Email',
                'rules' => 'required'
            )

        ),

        // controlleur + methode qui charge la vue entreprise
        'entrepriseController/entrepriseView' => array(

            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),

            array(
                'field' => 'secteur',
                'label' => 'Secteur',
                'rules' => 'required'
            ),

            array(
                'field' => 'adresse',
                'label' => 'adressePhysique',
                'rules' => 'required'
            ),

            array(
                'field' => 'mail',
                'label' => 'email',
                'rules' => 'required'
            ),

            array(
                'field' => 'logo',
                'label' => 'Logo',
                'rules' => 'required'
            ),

            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),

            array(
                'field' => 'phone',
                'label' => 'Telephone',
                'rules' => 'required'
            ),

            array(
                'field' => 'site',
                'label' => 'Site',
                'rules' => 'required'
            ),

            array(
                'field' => 'codePostal',
                'label' => 'Code Postal',
                'rules' => 'required'
            ),

            array(
                'field' => 'pays',
                'label' => 'Pays',
                'rules' => 'required'
            )
        ),

        // controller + methode qui charge la vue horaire
        'horaireController/horaireView' => array(

            array(
                'field' => 'jour',
                'label' => 'Jour',
                'rules' => 'required'
            ),

            array(
                'field' => 'heureDebut',
                'label' => 'Heure Debut',
                'rules' => 'required'
            ),

            array(
                'field' => 'heureFin',
                'label' => 'Heure Fin',
                'rules' => 'required'
            )
        ),

         // controller + methode qui charge la vue rdv
        'rdvController/rdvView' => array(

            array(
                'field' => 'motif',
                'label' => 'Motif',
                'rules' => 'required'
            ),

            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required'
            ),

            array(
                'field' => 'heure',
                'label' => 'Heure',
                'rules' => 'required'
            ),

            array(
                'field' => 'etat',
                'label' => 'Etat',
                'rules' => 'required'
            ),

            array(
                'field' => 'commentaire',
                'label' => 'Commentaire',
                'rules' => 'required'
            )
        ),

         // controller + methode qui charge la vue departement
        'departementController/departementView' => array(

            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ) 

        )



    )
?>