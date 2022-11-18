<h1>{{ __('site.Info du membre') }}:</h1>
<p>Id: {{$member->id}}</p>
<p>{{ __('site.Prénom') }}: {{$member->prenom}}</p>
<p>{{ __('site.Nom') }}: {{$member->nom}}</p>
<p>{{ __('site.Description') }}: {{$member->bio}}</p>
<p>{{ __('site.Poste') }}: {{$member->poste}}</p>

<a href="/{{ app()->getLocale() }}/equipe">{{ __('site.Voir tous les membres') }}</a>
<h4><a href="/{{ app()->getLocale() }}/equipe/random">{{ __('site.Membre random') }}</a></h4>
<hr>
<a href="/{{ app()->getLocale() }}/accueil">{{ __('site.Accueil') }}</a>