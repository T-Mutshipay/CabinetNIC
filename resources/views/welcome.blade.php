<x-layouts.app>
    @section('title', 'N.I.C & Associes')
    @section('services')
    <div class="p-8 flex justify-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Nos Services</h2>
            <div class="border-t border-gold my-4"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Service 1 -->
                <div class="flex flex-col items-center">
                    <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="mt-2 text-center">
                        <h1 class="text-xl md:text-2xl font-bold mb-4">Conseil juridique</h1>
                    </div>
                </div>
        
                <!-- Service 2 -->
                <div class="flex flex-col items-center">
                    <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="mt-2 text-center">
                        <h1 class="text-xl md:text-2xl font-bold mb-4">Rédaction des actes juridiques</h1>
                        <p class="text-center text-sm md:text-base">Administrative, préjuridictionnelle, transactionnelle <br> et assistance judiciaire</p>
                    </div>
                </div>
        
                <!-- Service 3 -->
                <div class="flex flex-col items-center">
                    <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="mt-2 text-center">
                        <h1 class="text-xl md:text-2xl font-bold mb-4">Représentation extrajudiciaire</h1>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @endsection
    
    @section('team')  
    <section class=" m-14">
        <div class="container mx-auto">
            <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Notre Equipe</h2>
            <div class="border-t border-gold  my-4"></div>
        </div>
        <div class="container mx-auto">
            <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 relative overflow-visible">
                <!-- Article 1 -->
                <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/agent.png')}}" alt="Titre de l'article 1" class=" object-cover absolute -top-20">
                        </div>
                        <div class="p-10 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/agent.png')}}" alt="Titre de l'article 1" class=" object-cover absolute -top-20">
                        </div>
                        <div class="p-10 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/agent.png')}}" alt="Titre de l'article 1" class=" object-cover absolute -top-20">
                        </div>
                        <div class="p-10 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/agent.png')}}" alt="Titre de l'article 1" class=" object-cover absolute -top-20">
                        </div>
                        <div class="p-10 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/agent.png')}}" alt="Titre de l'article 1" class=" object-cover absolute -top-20">
                        </div>
                        <div class="p-10 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div>

                {{-- <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/avocat1.jpg')}}" alt="Avocat" class=" rounded-md w-2/3 h-auto object-cover absolute -top-20">
                        </div>
                        <div class="p-4 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="mt-20">
                    <div class="bg-white rounded-lg shadow-lg overflow-visible relative">
                        <div class="flex items-center justify-center relative">
                            <img src="{{asset('img/avocat2.jpg')}}" alt="Avocat" class=" rounded-md w-58 h-40 object-cover absolute -top-20">
                        </div>
                        <div class="p-4 mt-24 text-center">
                            <h3 class="text-xl font-semibold mt-5">Avocat Associé 1</h3>
                            <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                            <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                        </div>
                    </div>
                </div> --}}
            </div>  
        </div>
    </section>
    @endsection
    @section('articles')
    <section class="m-16">
        <div class="container mx-auto">
            <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Actualités et Articles</h2>
            <div class="border-t border-gold  my-4"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article4.jpg" alt="Titre de l'article 4" class="w-full md:w-1/2 h-48 md:h-auto object-cover">
                    <div class=p-1 flex flex-col justify-center">
                        <h3 class="text-xl font-semibold">Titre de l'article 4</h3>
                        <p class="text-gray-600 mt-1">Un bref extrait de l'article 4 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article4.jpg" alt="Titre de l'article 4" class="w-full md:w-1/2 h-48 md:h-auto object-cover">
                    <div class=p-1 flex flex-col justify-center">
                        <h3 class="text-xl font-semibold">Titre de l'article 4</h3>
                        <p class="text-gray-600 mt-1">Un bref extrait de l'article 4 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <div class=" bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article4.jpg" alt="Titre de l'article 4" class="w-full md:w-1/2 h-48 md:h-auto object-cover">
                    <div class=p-1  justify-center">
                        <h3 class="text-xl font-semibold">Titre de l'article 4</h3>
                        <p class="text-gray-600 mt-1">Un bref extrait de l'article 4 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('content')
    <div class="p-8 flex justify-center">
        <div class="container mx-auto">
            <h2 class=" text-6xl font-bold mb-4 text-gold text-center">Nos domaines</h2>
            <div class="border-t border-gold  my-4"></div>
        </div>
    </div>
    @endsection
    @section('commentaire')
    <div class="p-8">
        <div class="container mx-auto flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-8">
            <!-- Comment Form -->
            <div class="bg-white p-6 rounded shadow-lg w-full md:w-1/2">
                <h2 class="text-xl font-bold mb-4">Commenter</h2>
                <form action="#" method="POST" class="space-y-4">
                    <!-- Name and Email -->
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom Complet</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="w-1/2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <!-- Comment Textarea -->
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Libellé</label>
                        <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
        
                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Valider</button>
                    </div>
                </form>
            </div>
        
            <!-- Comments List -->
            <div class="bg-white p-6 rounded shadow-lg w-full md:w-1/2">
                <h2 class="text-xl font-bold mb-4">Commentaires</h2>
                <ul class="space-y-2">
                    <li class="border-b pb-2">Héritier</li>
                    <li class="border-b pb-2">heritier@example.com</li>
                    <li>Lorem ipsum dolor sit amet</li>
                </ul>
            </div>
        </div>
    
    </div>
    @endsection
</x-layouts.app>