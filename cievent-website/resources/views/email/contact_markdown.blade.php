@component('mail::message')

![]({{asset('images/logo.png')}})


# Inscription pour l'évènement {{$datas->name}}

Votre inscription pour l'évènement {{$datas->name}} a bien été reçue.<br>
Vous serez contacter d'ici peu pour finaliser l'inscription.<br>
<br>
Evènement: {{$datas->name}}<br>
Invité: {{$datas->name_invit}} {{$datas->surname_invit}}<br>
Date: {{$datas->date}}<br>
Heure: {{$datas->time}}<br>
Lieu: {{$datas->place}}<br>
Pass standard: {{$datas->standard}}<br>
Pass vip: {{$datas->vip}}<br>


@component('mail::button', ['url' => $url, 'color' => 'success'])
Voir plus
@endcomponent

Merci,<br>
{{ config('app.name') }}<br>
Tél. : (225) 27 22 49 78 73 – Cel. : (225) 07 09 18 13 42
@endcomponent
