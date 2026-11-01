@php
    $auteur = $commentaire->user;
    $article = $commentaire->actualite;
@endphp
<!DOCTYPE html>
<html lang="fr">

<body style="margin:0;padding:24px;background:#f6f3f2;font-family:Arial,Helvetica,sans-serif;color:#1b1c1c;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
        style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:8px;overflow:hidden;">
        <tr>
            <td style="background:#0b1f3a;padding:20px 28px;color:#ffffff;font-family:Georgia,serif;font-size:20px;">
                {{ config('cabinet.name') }}
            </td>
        </tr>
        <tr>
            <td style="padding:28px;">
                <p style="margin:0 0 4px;font-size:12px;letter-spacing:1px;text-transform:uppercase;color:#755a23;">
                    {{ $article ? "Commentaire à valider" : 'Message de contact' }}
                </p>
                <h1 style="margin:0 0 20px;font-family:Georgia,serif;font-size:22px;color:#0b1f3a;">
                    {{ $article ? $article->titre : 'Nouveau message depuis le site' }}
                </h1>

                <p style="margin:0 0 4px;"><strong>Nom :</strong> {{ $auteur->name }}</p>
                <p style="margin:0 0 20px;"><strong>Email :</strong>
                    <a href="mailto:{{ $auteur->email }}" style="color:#755a23;">{{ $auteur->email }}</a>
                </p>

                <div style="padding:16px;background:#f6f3f2;border-radius:6px;line-height:1.6;">
                    {!! nl2br(e($commentaire->contenu)) !!}
                </div>

                @if ($article)
                    <p style="margin:24px 0 12px;">Ce commentaire n'est <strong>pas encore visible</strong> sur le site.</p>
                    <a href="{{ $lienPublier }}"
                        style="display:inline-block;padding:12px 22px;margin:0 8px 8px 0;background:#0b1f3a;color:#ffffff;text-decoration:none;border-radius:6px;font-weight:bold;">Publier</a>
                    <a href="{{ $lienSupprimer }}"
                        style="display:inline-block;padding:12px 22px;margin:0 0 8px;background:#ffffff;color:#ba1a1a;text-decoration:none;border:1px solid #ba1a1a;border-radius:6px;font-weight:bold;">Supprimer</a>
                    <p style="margin:12px 0 0;font-size:12px;color:#44474d;">Liens valables 30 jours. Une page de
                        confirmation s'ouvrira avant toute action.</p>
                @else
                    <p style="margin:24px 0 0;">Pour répondre, utilisez simplement « Répondre » dans votre messagerie.
                    </p>
                @endif
            </td>
        </tr>
    </table>
</body>

</html>
