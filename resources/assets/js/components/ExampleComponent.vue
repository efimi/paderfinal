<template>
  <a href="{{ $match->location->website }}" alt="für weitere infos hier clicken" class="card card--result shadow">
        <div class="">
            <div class="card__map">
                 @include('partials.map', ['location' => $match->location])
            </div>
            <div class="card__body">
                <h1>{{ name }}</h1>
                <p>
                    {{ address }}
                </p>
                @include('partials.location--usedplaces', ['location' => $match->location])
            </div>
        </div>
</a>    
</template>

<script>
    export default {
        props: ['name','address', 'webiste', 'usedplaces'],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
