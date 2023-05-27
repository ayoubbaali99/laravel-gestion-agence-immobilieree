@component('mail::message')
# Nouvelle demande de contact

Une nouvelle demande de contact a été fait pour le bien <a href="{{route('property.show', ['slug' => $property->getSlug(), 'property' => $property->id])}}">{{$property->title}}.</a>


    - Prénom : {{$data['firstname']}}
    - Nom    : {{$data['lastname']}}
    - Phone  : {{$data['phone']}}
    - Email     : {{$data['email']}}

#    Message :
    {{$data['message']}}

@endcomponent
