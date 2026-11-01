<?php

return [
    'name' => 'N.I.C & Associés',
    'tagline' => "Cabinet d'avocats",
    'description' => "Cabinet d'avocats dédié à la défense de vos droits et à la fourniture de conseils juridiques de qualité.",
    'phone' => '+243 816 301 931',
    'phone_link' => '+243816301931',
    'email' => 'cabinetnicetassocies@gmail.com',
    'address' => ['287, Mweka, 1er étage, appartement 1 A', 'Q/Pakadjuma, Lingwala', 'Kinshasa, République Démocratique du Congo'],
    'maps_url' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode('287 Mweka, Lingwala, Kinshasa'),
    'reseaux' => [
        ['nom' => 'Facebook', 'url' => 'https://www.facebook.com/share/1DomMXAhMA/'],
        ['nom' => 'Instagram', 'url' => 'https://www.instagram.com/nica_asso'],
    ],

    // Fichier servi par la route « honoraires » (attention à la casse sur un serveur Linux)
    'honoraires_pdf' => 'Honoraire.pdf',

    // SEO : image affichée lors du partage d'un lien (WhatsApp, Facebook…), 1200x630
    'og_image' => 'img/og-image.jpg',
    // Données structurées (schema.org) : adresse découpée pour Google
    'adresse_structuree' => [
        'streetAddress' => '287, Mweka, 1er étage, appartement 1 A, Q/Pakadjuma',
        'addressLocality' => 'Lingwala, Kinshasa',
        'addressCountry' => 'CD',
    ],

    'hero_image' => 'img/balance.jpg',
    'presentation_image' => 'img/maitre_christian_ngandu.JPG',

    // Année d'inscription au Barreau de l'avocat fondateur (Me Christian Ngandu Ilunga)
    'fondateur_inscrit_en' => 2007,

    // Devise inscrite sur le logo du cabinet
    'devise' => 'Portons la justice',

    'valeurs' => [
        ['icon' => 'shield', 'titre' => 'Intégrité', 'texte' => 'Nous exerçons dans le strict respect de la déontologie de la profession et du secret professionnel.'],
        ['icon' => 'visibility', 'titre' => 'Transparence', 'texte' => 'Des explications claires sur votre dossier, la stratégie retenue et nos honoraires.'],
        ['icon' => 'workspace_premium', 'titre' => 'Excellence', 'texte' => 'Une exigence de qualité constante, dans chaque consultation, chaque acte et chaque plaidoirie.'],
    ],

    'atouts' => [
        ['icon' => 'verified', 'titre' => 'Expertise', 'texte' => 'Une maîtrise du droit congolais et du droit OHADA, au service de chaque dossier.'],
        ['icon' => 'lock', 'titre' => 'Confidentialité', 'texte' => 'Le secret professionnel est au cœur de notre relation avec chaque client.'],
        ['icon' => 'balance', 'titre' => 'Rigueur', 'texte' => 'Une analyse précise des faits et du droit, dans le conseil comme dans les procédures.'],
        ['icon' => 'handshake', 'titre' => 'Proximité', 'texte' => 'Une écoute attentive et un suivi personnalisé, du premier rendez-vous à la clôture du dossier.'],
    ],

    'services' => [
        [
            'icon' => 'forum',
            'titre' => 'Consultations et Conseils Juridiques',
            'texte' => 'Nous analysons votre situation et vous orientons vers la solution la plus sûre, avant que le litige ne naisse.',
            'points' => ['Consultations juridiques', 'Conseils juridiques', 'Conciliations'],
        ],
        [
            'icon' => 'gavel',
            'titre' => 'Assistance et Représentation Judiciaire',
            'texte' => 'Nous défendons vos intérêts devant les juridictions congolaises, de la première instance aux voies de recours.',
            'points' => ['Assistance judiciaire', 'Représentation judiciaire'],
        ],
        [
            'icon' => 'handshake',
            'titre' => 'Assistance et Représentation Extrajudiciaire',
            'texte' => 'Nous sécurisons vos actes et vous représentons dans vos démarches et négociations hors des tribunaux.',
            'points' => ['Rédaction des actes juridiques', 'Assistance extrajudiciaire', 'Représentation extrajudiciaire'],
        ],
    ],

    'domaines' => [
        ['icon' => 'business_center', 'titre' => 'Droit des affaires', 'texte' => 'Notre cabinet offre des conseils juridiques pour les entreprises de toutes tailles.'],
        ['icon' => 'savings', 'titre' => 'Droit bancaire', 'texte' => 'Nous proposons des services en matière de régulation bancaire et financière.'],
        ['icon' => 'work', 'titre' => 'Droit du travail et de la sécurité sociale', 'texte' => 'Nos experts vous accompagnent dans la gestion des relations de travail.'],
        ['icon' => 'corporate_fare', 'titre' => 'Droit des sociétés', 'texte' => 'Nous assistons dans la création et la gestion des sociétés.'],
        ['icon' => 'lightbulb', 'titre' => 'Droit de la propriété intellectuelle et industrielle', 'texte' => 'Protection et gestion de vos actifs immatériels.'],
        ['icon' => 'assignment', 'titre' => 'Mise en œuvre et suivi des procédures judiciaires', 'texte' => 'Accompagnement complet dans les démarches judiciaires.'],
        ['icon' => 'domain', 'titre' => 'Mise en œuvre et suivi des procédures administratives', 'texte' => 'Nous facilitons les démarches administratives complexes.'],
        ['icon' => 'cell_tower', 'titre' => 'Droit de la télécommunication', 'texte' => "Conseils spécialisés dans les technologies de l'information."],
        ['icon' => 'home_work', 'titre' => 'Droit immobilier', 'texte' => 'Assistance dans les transactions et litiges immobiliers.'],
        ['icon' => 'request_quote', 'titre' => 'Recouvrement de créances civiles et commerciales', 'texte' => 'Solutions efficaces pour le recouvrement de créances.'],
        ['icon' => 'family_restroom', 'titre' => 'Droit de la famille', 'texte' => 'Accompagnement juridique dans les affaires familiales.'],
        ['icon' => 'volunteer_activism', 'titre' => 'Droit des successions', 'texte' => 'Gestion des successions et héritages.'],
    ],
    'appetences' => [
        'Droit judiciaire',
        'Droit du recouvrement',
        'Propriété intellectuelle',
        'Droit du travail',
        'Contentieux fiscal et administratif',
        'Communication audiovisuelle',
        'Droit des affaires',
    ],
];
