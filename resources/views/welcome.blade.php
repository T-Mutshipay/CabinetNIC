<x-layouts.app>
    @section('title', 'Titre de la Page')
    @section('services')
    <div class="p-8 flex justify-center">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Nos domaines</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 m-4">
                <div class="flex flex-col items-center">
                    <img class="h-auto max-w-56 rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
                    <div class="mt-2 text-center">
                        <p class="text-black">Maitre Associé</p>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <img class="h-auto max-w-56 rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    <div class="mt-2 text-center">
                        <p class="text-black">Membre de l'Équipe</p>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <img class="h-auto max-w-56 rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                    <div class="mt-2 text-center">
                        <p class="text-black">Collaborateur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    @section('team')  
    {{-- <img class="h-auto max-w-56 rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt=""> --}}
    <div class="bg-red-600">
        <h2 class="text-3xl font-bold text-center mb-6">Notre Equipe</h2>
    </div>
    <section class="p-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 m-5">
                <div class="rounded-lg shadow-lg">
                    <div class="relative">
                        <div class=" absolute inset-4 flex items-center justify-center ">
                            <img class="h-auto max-w-56 rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
                        </div>
                    </div>
                    div.border
                    <div class="m-16">
                        <p class="text-gray-600 mt-12">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                        <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Lire plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    @endsection
    @section('articles')
    <section class="p-6 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-6">Actualités et Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Article 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article1.jpg" alt="Titre de l'article 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Titre de l'article 1</h3>
                        <p class="text-gray-600 mt-2">Un bref extrait de l'article 1 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <!-- Article 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article2.jpg" alt="Titre de l'article 2" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Titre de l'article 2</h3>
                        <p class="text-gray-600 mt-2">Un bref extrait de l'article 2 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <!-- Article 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article3.jpg" alt="Titre de l'article 3" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Titre de l'article 3</h3>
                        <p class="text-gray-600 mt-2">Un bref extrait de l'article 3 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <!-- Article 4 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article4.jpg" alt="Titre de l'article 4" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Titre de l'article 4</h3>
                        <p class="text-gray-600 mt-2">Un bref extrait de l'article 4 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <!-- Article 5 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article5.jpg" alt="Titre de l'article 5" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Titre de l'article 5</h3>
                        <p class="text-gray-600 mt-2">Un bref extrait de l'article 5 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
                <!-- Article 6 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="img/article6.jpg" alt="Titre de l'article 6" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Titre de l'article 6</h3>
                        <p class="text-gray-600 mt-2">Un bref extrait de l'article 6 pour donner un aperçu du contenu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('content')

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