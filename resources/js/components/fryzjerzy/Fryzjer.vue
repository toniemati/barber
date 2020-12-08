<template>
    <div class="mx-auto">
        <h1 class="text-center">Fryzjer.vue</h1>
        <p
            v-if="this.message"
            class="alert alert-success text-center"
            role="alert"
        >
            {{ message }}
        </p>
        <div class="row">
            <div
                class="col-sm-12 col-md-8 col-lg-4 mx-auto my-2 d-flex justify-content-around"
            >
                <router-link
                    class="btn btn-success d-flex align-items-center"
                    to="/fryzjerzy/add"
                >
                    Dodaj fryzjera
                </router-link>
            </div>
        </div>
        <div class="row col-11 d-flex justify-content-around mx-auto">
            <div
                v-for="(fryzjer, i) in fryzjerzy"
                :key="i"
                class="card col-sm-12 col-md-5 col-lg-3 mt-4 mx-1"
            >
                <img
                    v-if="fryzjer.pic"
                    class="card-img-top mt-2"
                    :src="fryzjer.pic"
                    alt="profilowe"
                />
                <div class="card-body">
                    <h5 class="card-title">{{ fryzjer.imie }}</h5>
                    <h5 class="card-title">{{ fryzjer.nazwisko }}</h5>
                    <p class="card-text">
                        {{ fryzjer.opis }}
                    </p>
                    <div class="row">
                        <router-link
                            class="btn btn-sm btn-outline-info mx-auto"
                            :to="`/rezerwacje/fryzjer/${fryzjer.id}`"
                        >
                            Rezerwacje
                        </router-link>
                        <router-link
                            :to="'/fryzjerzy/edit/' + fryzjer.id"
                            class="btn btn-primary w-100 mt-2"
                        >
                            Edit
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Fryzjer",

        data: function() {
            return {
                fryzjerzy: null,
                message: null
            };
        },

        methods: {
            getFryzjerzy: function() {
                axios
                    .get("/api/fryzjerzy")
                    .then(res => (this.fryzjerzy = res.data));
            },

            getMessage: function() {
                this.message = this.$route.params.message;
            }
        },

        created: function() {
            this.getFryzjerzy();
            this.getMessage();
        }
    };
</script>

<style>
</style>