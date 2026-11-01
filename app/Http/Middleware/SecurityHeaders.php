<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * En-têtes HTTP de sécurité ajoutés à toutes les pages.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Ne pas annoncer la version de PHP utilisée par le serveur
        // (headers_sent : header_remove lèverait une erreur si une sortie était déjà partie)
        if (! headers_sent()) {
            header_remove('X-Powered-By');
        }
        $response->headers->remove('X-Powered-By');

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');          // empêche d'afficher le site dans une iframe étrangère (clickjacking)
        $response->headers->set('X-Content-Type-Options', 'nosniff');      // le navigateur respecte le type de fichier annoncé
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        // HTTPS obligatoire pendant un an (uniquement en production, servie en HTTPS)
        if (app()->isProduction() && $request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000');
        }

        return $response;
    }
}
