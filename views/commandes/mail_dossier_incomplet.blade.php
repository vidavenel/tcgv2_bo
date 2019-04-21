Rappel de votre démarche : {{ $demarcheItem->demarche->nom }}<br>
Numéro de votre commande : {{ $commande->reference }}<br>
<br>
<br>
Bonjour {{$client->civilite}} {{$client->nom}} {{$client->prenom}},<br>
<br>
<br>
Nous avons bien réceptionné votre dossier en date du $now, concernant votre commande {{ $commande->reference }}<br>
Cependant, certains éléments sont incomplets ou manquants.<br>
<br>
<br>
<strong>
    Éléments du dossier concernés : <br>
    <br>
    <br>
</strong>
<br>
<br>
Nous vous remercions par avance de nous retourner ces éléments au plus tôt, afin de nous permettre de traiter votre dossier dans les meilleurs délais.
<br>
Pour tout autre renseignement concernant les éléments à fournir, rendez-vous sur : <a
    href='"{{ route('documents_a_envoyer') }}"'>topcartegrise.fr</a><br>
<br>
<br>
Nous vous remercions de votre confiance.<br>
<br>
Cordialement,<br>
L'équipe TopCarteGrise.fr<br>
$user<br>
<br>
TOP CARTE GRISE<br>
GROUPE MOTORS TRADE FRANCE<br>
Lot 12 , 520 Avenue Blaise Pascal<br>
77550 MOISSY CRAMAYEL<br>
Tél.: 08 97 69 02 02 ({{ config('topcartegrise.prix_telephone') }} €/min + prix appel)<br>
