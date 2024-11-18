<x-layouts.app>
    @section('content')
    <div class="main-section flex flex-col lg:flex-row lg:space-x-4 p-4">
        <div class="lg:w-1/3 w-full mb-4 lg:mb-0 flex justify-center">
            <img src="{{asset('img/avocat2.jpg')}}" alt="Image" class="w-full h-60 lg:w-80">
        </div>
        <div class="lg:w-2/3 w-full flex items-center">
            <div class="lg:w-3/5 w-full flex items-center my-20">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Informations sur l'avocat</h2>
                    <p class="text-gray-700 "><strong>Nom :</strong> Maître Jean Dupont</p>
                    <p class="text-gray-700 "><strong>Spécialisation :</strong> Droit des affaires</p>
                    <p class="text-gray-700 "><strong>Expérience :</strong> 10 ans dans le domaine du droit commercial et des contrats</p>
                    <p class="text-gray-700 "><strong>Adresse :</strong> 123 Rue de la Loi, Paris, 75001</p>
                    <p class="text-gray-700 "><strong>Téléphone :</strong> +33 1 23 45 67 89</p>
                    <p class="text-gray-700 "><strong>Email :</strong> jean.dupont@cabinetexemple.com</p>
                    <p class="text-gray-700 "><strong>Langues parlées :</strong> Français, Anglais, Espagnol</p>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-layouts.app>
