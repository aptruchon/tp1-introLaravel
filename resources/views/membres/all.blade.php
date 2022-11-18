<h1>{{ __('site.Tous les membres') }} </h1>

@foreach ($allMembers as $member)
    <x-equipe :$member />
@endforeach

<h4><a href="/{{ app()->getLocale() }}/equipe/random">{{ __('site.Membre random') }}</a></h4>
<hr>
<a href="/{{ app()->getLocale() }}/accueil">{{ __('site.Accueil') }}</a>