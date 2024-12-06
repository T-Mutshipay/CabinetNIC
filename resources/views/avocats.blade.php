<x-layouts.app>
    @section('content') 
        <div class="flex m-2 justify-between items-center">
            <p class="text-2xl md:text-4xl lg:text-6xl font-bold">
                Notre équipe d'Avocats
            </p>
        
            <a href="{{ route('/') }}" class="bg-blue-700 p-2 text-white rounded flex justify-center items-center">
                <svg fill="#fff" version="1.1" id="Layer_1" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.693 490.693" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M351.173,149.227H36.4L124.827,60.8c4.053-4.267,3.947-10.987-0.213-15.04c-4.16-3.947-10.667-3.947-14.827,0
                                L3.12,152.427c-4.16,4.16-4.16,10.88,0,15.04l106.667,106.667c4.267,4.053,10.987,3.947,15.04-0.213
                                c3.947-4.16,3.947-10.667,0-14.827L36.4,170.56h314.773c65.173,0,118.187,57.387,118.187,128s-53.013,128-118.187,128h-94.827
                                c-5.333,0-10.133,3.84-10.88,9.067c-0.96,6.613,4.16,12.267,10.56,12.267h95.147c76.907,0,139.52-66.987,139.52-149.333
                                S428.08,149.227,351.173,149.227z" />
                        </g>
                    </g>
                </svg>
            </a>
        </div>
    
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($avocats as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800">
                        <div class="flex flex-col items-center p-6">
                            <img class="w-48 h-48 object-cover border-4 border-gray-300 dark:border-gray-500" src="{{ asset($item->image) }}" alt="Profil Image">
                            <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mt-4">Nom complet : {{$item->nom_complet}}</h1>
                            <p class="text-center text-gray-700 dark:text-gray-300">{{$item->email}}</p>
                            <p class="mt-4 text-gray-700 dark:text-gray-300 text-center">{{$item->description}}</p>
                            {{-- <button class="bg-gold text-white py-2 px-6 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 mt-6">Contactez</button> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl md:text-4xl lg:text-6xl font-bold m-2">
                Notre équipe de support juridique
              </h1>              
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
               
                @foreach ($collaborateurs as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800">
                        <div class="flex flex-col items-center p-6">
                            <img class="w-48 h-48 object-cover border-4 border-gray-300 dark:border-gray-500" src="{{ asset($item->image) }}" alt="Profil Image">
                            <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mt-4">{{ $item->nom_complet }}</h1>
                            <p class="text-center text-gray-700 dark:text-gray-300">{{ $item->post }}</p>
                            <p class="mt-4 text-gray-700 dark:text-gray-300 text-center">{{ $item->description }}</p>
                            {{-- <button class="bg-blue-700 text-white py-2 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-6">Contactez</button> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        

        
    @endsection
</x-layouts.app>
