<x-layouts.app>
    @section('services')
        <div id="services" class="p-8 flex justify-center mt-10">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Nos services</h2>
                <div class="border-t border-gold my-4"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                    <!-- Service 1: Consultations et Conseils Juridiques -->
                    <div class="flex flex-col items-center m-1">
                        <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center">
                            <h1 class="text-xl md:text-2xl font-bold mb-4">Consultations et Conseils Juridiques</h1>
                            <p class="text-center text-sm md:text-base">
                                Consultations juridiques, Conseils juridiques, et Conciliations
                            </p>
                        </div>
                    </div>

                    <!-- Service 2: Assistance et Représentation Extrajudiciaire -->
                    <div class="flex flex-col items-center m-1">
                        <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center">
                            <h1 class="text-xl md:text-2xl font-bold mb-4">Assistance et Représentation Extrajudiciaire</h1>
                            <p class="text-center text-sm md:text-base">
                                Rédaction des actes juridiques, Assistance extrajudiciaire, et Représentation
                                extrajudiciaire
                            </p>
                        </div>
                    </div>

                    <!-- Service 3: Assistance et Représentation Judiciaire -->
                    <div class="flex flex-col items-center m-1">
                        <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center">
                            <h1 class="text-xl md:text-2xl font-bold mb-4">Assistance et Représentation Judiciaire</h1>
                            <p class="text-center text-sm md:text-base">
                                Assistance judiciaire, Représentation judiciaire
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
    @section('team')
        <div class="p-8 bg-gray-100 rounded-md">
            <div class="container mx-auto text-start p-6">
                <h2 class="text-4xl md:text-5xl font-bold text-gold mb-6">
                    Rencontrez notre équipe d'avocats
                </h2>
                <div class="text-lg md:text-xl text-gray-800 text-justify space-y-6">
                    <p>
                        Chez <span class="font-semibold">N.I.C & Associés</span>, notre équipe est composée d’avocats hautement qualifiés et passionnés, dédiés à défendre vos droits et à offrir des conseils juridiques adaptés à vos besoins. Chaque membre de notre équipe possède une expertise approfondie dans des domaines variés du droit, garantissant une assistance complète et personnalisée.
                    </p>
                    <p>
                        Nous privilégions une approche collaborative et sur mesure, car chaque client est unique. Que vous fassiez face à des problématiques complexes en droit commercial, à des litiges familiaux, ou à des défis liés à la conformité réglementaire, notre équipe vous accompagne avec professionnalisme et empathie.
                    </p>
                    <p>
                        Nos valeurs fondamentales – <span class="font-semibold">intégrité, transparence et dévouement</span> – reflètent notre engagement envers l’excellence. Nous sommes fiers de notre réputation de cabinet d’avocats de confiance, reconnu pour sa capacité à obtenir des résultats favorables pour nos clients.
                    </p>
                    <p>
                        Découvrez nos avocats et comment <span class="font-semibold">N.I.C & Associés</span> peut vous aider à naviguer dans le paysage juridique avec assurance. Votre réussite est notre priorité.
                    </p>
                </div>
            </div>
        </div>
        <section class="m-14">
            <div id="team" class="container mx-auto">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Notre équipe</h2>
                <div class="border-t border-gold  my-4"></div>
            </div>
            <div class="container mx-auto mt-10">
                <div
                    class="mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 relative overflow-visible">
                    @if ($avocats->count() > 0)
                        @foreach ($avocats as $item)
                        <div class="mt-20">
                            <div class="bg-white dark:bg-slate-500 rounded-sm border border-gold shadow-lg overflow-visible relative">
                                <div class="flex items-center justify-center relative">
                                    <img src="{{ asset($item->image) }}" alt="Avocat" class="object-cover absolute -top-20 w-56 h-56 border-4 border-white shadow-lg">
                                </div>
                                <div class="p-10 mt-24 text-center">
                                    <h3 class="text-xl font-semibold mt-5">{{ $item->nom_complet }}</h3>
                                    <p class="text-gray dark:text-black mt-2">{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="flex items-end m-3">
                    <a href="{{ route('avocats') }}"
                        class="mt-6 md:text-sm bg-slate-800 hover:bg-gold text-white rounded px-6 py-2">voir toute
                        l'épique</a>
                </div>
            </div>
        </section>
    @endsection
    @section('articles')
        <div class="p-4 bg-gray-100 rounded-md m-4">
            <div class="container mx-auto text-center p-6">
                <h2 class="text-4xl md:text-5xl text-start font-bold text-gold mb-6">
                    L'Importance de rester informé
                </h2>

                <div class="text-lg md:text-xl text-gray-800 text-justify space-y-6">
                    <p>
                        Le monde évolue rapidement, et être informé des dernières actualités et développements juridiques est essentiel pour prendre des décisions éclairées. Chez <span class="font-semibold">N.I.C & Associés</span>, nous mettons à votre disposition une section dédiée aux <strong>actualités et articles</strong>, pour vous tenir à jour des informations qui impactent votre quotidien.
                    </p>
                    <p>
                        Vous y trouverez des analyses approfondies, des conseils pratiques et des mises à jour sur les changements législatifs. Nos experts partagent leurs perspectives pour vous aider à naviguer dans le paysage juridique, que vous soyez professionnel, entrepreneur ou particulier.
                    </p>
                    <p>
                        Explorez cette section pour découvrir des études de cas, des commentaires d'experts et des tendances actuelles du droit. Notre objectif est de vous fournir un contenu fiable, pertinent et à jour pour vous accompagner dans vos décisions.
                    </p>
                    <p class="font-semibold">
                        Bienvenue dans notre section "Actualités et Articles" – votre source d'informations juridiques précieuses.
                    </p>
                </div>
            </div>
        </div>
        <section class="m-4">
            <div class="container mx-auto mt-10">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Actualités et Articles</h2>
                <div class="border-t border-gold my-4"></div>
                <div class="grid grid-cols-1 sm:grid-cols-  2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @if ($actualites->count() > 0)
                        @foreach ($actualites as $item)
                            <div class="bg-white dark:bg-gray-200 rounded-lg shadow-lg overflow-hidden border border-gold">
                                <img src="{{ asset("$item->image") ?? asset('img/fond.jpg') }}"
                                    alt="Titre de l'article 4" class="w-full h-60 object-cover">
                                <div class="p-4 flex flex-col justify-center">
                                    <h3 class="text-xl font-semibold">{{ $item }}</h3>
                                    <p class="text-gray dark:text-black mt-1">{{ Str::limit($item->contenu, 20) }} ...</p>
                                </div>
                                <div class="flex float-end m-3">
                                    <a href="{{ route('articles') }}"
                                        class="mt-6 md:text-sm bg-slate-800 hover:bg-gold text-white rounded px-6 py-2">voir
                                        plus</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endsection
    @section('content')
        <div class="container mx-auto">
            <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Les domaines d'interventions</h2>
            <div class="border-t border-gold  my-4"></div>
        </div>
        <div class="flex items-center justify-center bg-blue-950">
            <div id="carousel" class="relative w-full m-4 overflow-hidden rounded-lg">
                <div class="flex transition-transform duration-300 ease-in-out" id="carousel-content">
                    <!-- Grid Container 1 -->
                    <div class="flex-shrink-0 w-full grid grid-cols-2 gap-2 p-4 md:grid-rows-2">
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-balance-scale fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit des affaires</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Notre cabinet offre des conseils
                                    juridiques pour les entreprises de toutes tailles.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit des sociétés</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Nous assistons dans la création et la
                                    gestion des sociétés.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-briefcase fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit du travail et de la sécurité sociale</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Nos experts vous accompagnent dans la
                                    gestion des relations de travail.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit bancaire</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Nous proposons des services en matière de
                                    régulation bancaire et financière.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-lightbulb fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit de la propriété intellectuelle et
                                    industrielle</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Protection et gestion de vos actifs
                                    immatériels.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-gavel fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Mise en œuvre et suivi des procédures
                                    judiciaires</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Accompagnement complet dans les démarches
                                    judiciaires.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Grid Container 2 -->
                    <div class="flex-shrink-0 w-full grid grid-cols-2 gap-2 p-4 md:grid-cols-2 md:grid-rows-2">
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2 ">
                                <i class="fas fa-cogs fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Mise en œuvre et suivi des procédures
                                    administratives</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Nous facilitons les démarches
                                    administratives complexes.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-signal fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit de la télécommunication</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Conseils spécialisés dans les
                                    technologies de l'information.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-home fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit immobilier</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Assistance dans les transactions et
                                    litiges immobiliers.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-hand-holding-usd fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Recouvrement de créances civiles et commerciales</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Solutions efficaces pour le recouvrement
                                    de créances.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit de la famille</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Accompagnement juridique dans les
                                    affaires familiales.</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-transform duration-300 ease-in-out hover:scale-105 hover:border hover:border-white m-4">
                            <div class="absolute top-2 left-2 text-black p-2 rounded-md mt-2">
                                <i class="fas fa-leaf fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit des successions</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Gestion des successions et héritages.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="prev" type="button"
                    class="absolute top-1/2 -translate-y-1/2 left-0 z-30 p-2 rounded-full bg-white hover:bg-gray-800 text-black font-bold">
                    <span>&larr;</span>
                </button>
                <button id="next" type="button"
                    class="absolute top-1/2 -translate-y-1/2 right-0 z-30 p-2 rounded-full bg-white hover:bg-gray-800 text-black">
                    <span>&rarr;</span>
                </button>
            </div>
        </div>
    @endsection
    @section('commentaire')
        <div class="container mx-auto p-6 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-md">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nous laisser un message</h2>
                    <form action="{{route('comment.store')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium dark:text-black text-gray-800">Nom</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full px-3 py-2 border dark:bg-slate-500 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2focus:border-transparent"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full px-3 py-2 border dark:bg-slate-500 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2  focus:border-transparent"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-800">Commentaire</label>
                            <textarea id="comment" name="comment" rows="4"
                                class="mt-1 block w-full px-3 py-2 border dark:bg-slate-500 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:border-transparent"
                                required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="bg-slate-800 text-white py-2 px-6 rounded-lg hover:bg-gold focus:outline-none focus:ring-2 focus:ring-gold focus:ring-opacity-50">
                                Soumettre
                            </button>
                        </div>
                    </form>
                </div>
                <div class="bg-white rounded-md p-6 space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Commentaires</h2>
                    <div class="overflow-y-auto max-h-96 space-y-4">
                        @foreach ($commentaires as $item)
                            <div class=" shadow-md rounded-md p-4 border border-gray-200">
                                <p class="text-lg text-black font-semibold">
                                    Nom complet : {{$item->user->name}}
                                </p>
                                <p class="text-md text-gray-700">
                                    Sujet : 
                                    @if ($item->actualite_id != null)
                                        {{$item->actualite->titre}}
                                    @endif
                                </p>
                                <p class="text-sm text-gray-600">
                                    Email : {{$item->user->email}}
                                </p>
                                <p class="text-gray-800 mt-2">
                                    Commentaire : {{$item->contenu}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-layouts.app>
<script>
    const carouselContent = document.getElementById("carousel-content");
    const nextButton = document.getElementById("next");
    const prevButton = document.getElementById("prev");
    let currentIndex = 0;
    nextButton.addEventListener("click", () => {
        if (currentIndex < carouselContent.children.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });
    prevButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    function updateCarousel() {
        const width = carouselContent.children[0].offsetWidth;
        carouselContent.style.transform = `translateX(-${currentIndex * width}px)`;
    }
</script>
