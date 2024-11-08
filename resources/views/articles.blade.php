<x-layouts.app>
@section('title', 'Résultats des Élections aux États-Unis')

@section('content')
<div class="container mx-auto p-4">
    <!-- En-tête de l'article -->
    <div class="bg-blue-500 text-white p-4 rounded-lg mb-4">
        <h1 class="text-2xl font-bold">Résultats des Élections aux États-Unis</h1>
        <p class="mt-2">Découvrez les dernières informations sur les résultats des élections et leurs implications.</p>
    </div>

    <article class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold">Analyse des Résultats</h2>
        <p class="mt-2">
            Les élections de 2024 aux États-Unis ont été marquées par une participation record, avec plus de 70 % des électeurs inscrits se rendant aux urnes. Les résultats préliminaires montrent une forte tendance vers les candidats démocrates dans plusieurs États clés, notamment la Californie et New York.
        </p>

        <h3 class="mt-4 font-semibold">État des Lieux</h3>
        <p>
            Dans le Midwest, les résultats sont plus partagés. Des États comme le Wisconsin et le Michigan ont vu une lutte serrée entre les candidats républicains et démocrates. Les résultats définitifs devraient être disponibles d'ici la fin de la semaine.
        </p>

        <h3 class="mt-4 font-semibold">Implications Politiques</h3>
        <p>
            Ces élections pourraient redéfinir le paysage politique des États-Unis pour les années à venir. Les résultats des élections de mi-mandat 2022 ont déjà montré un changement dans les priorités des électeurs, et ces résultats semblent confirmer cette tendance.
        </p>

        <h3 class="mt-4 font-semibold">Réactions des Candidats</h3>
        <p>
            Les candidats ont commencé à réagir aux résultats, avec des discours promettant de travailler ensemble pour le bien du pays. Les enjeux des élections de 2024 sont plus élevés que jamais, et chaque voix compte.
        </p>

        <h3 class="mt-4 font-semibold">Conclusion</h3>
        <p>
            Alors que les résultats continuent d'arriver, il est essentiel pour les électeurs de rester informés et engagés. Les élections ne sont pas seulement un moment de vote, mais un processus continu qui façonne l'avenir du pays.
        </p>
    </article>

    <div class="flex justify-between mt-4">
        <a href="{{ url('/articles') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Retour</a>
        <a href="#commentSection" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-400">Commenter</a>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold">Regardez cette vidéo</h2>
        <iframe class="w-full h-64 rounded-lg" src="https://www.youtube.com/watch?v=BuptdePSgQI" title="YouTube video" frameborder="0" allowfullscreen></iframe>
    </div>
    <div id="commentSection" class="mt-6">
        <h2 class="text-xl font-semibold">Commentaires</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <textarea name="comment" rows="4" class="w-full p-2 border rounded" placeholder="Écrivez votre commentaire ici..."></textarea>
            </div>
        </form>
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">Soumettre</button>
</div>  
    <x-contacts/>
@endsection
</x-layouts.app>