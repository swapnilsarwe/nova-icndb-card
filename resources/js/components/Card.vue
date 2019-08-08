<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h2 class="text-center text-2xl text-80 font-light">
                {{ firstName }} {{ lastName }} Joke
            </h2>
            <div class="mt-4 text-center">
                <span class="text-70">{{ joke }}</span>
            </div>
        </div>
    </card>
</template>

<script>
export default {
    data() {
        return {
            joke: '',
            firstName: '',
            lastName: ''
        }
    },

    props: ['card'],

    mounted() {
        this.getName();
        this.getJoke();
    },

    methods: {
        getJoke() {
            Nova.request().get('/nova-vendor/nova-icndb-card/random').then(response => {
                this.joke = response.data;
            })
        },
        getName() {
            Nova.request().get('/nova-vendor/nova-icndb-card/getName').then(response => {
                response = response.data;
                this.firstName = response.firstName;
                this.lastName = response.lastName;
            })
        }
    }
}
</script>
