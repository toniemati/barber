<template>
    <div class="mx-auto">
        <h1 class="text-center">Cennik.vue</h1>
        <p
            v-if="message"
            class="alert text-center"
            v-bind:class="type"
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
                    to="/cennik/add"
                >
                    Dodaj cennik
                </router-link>
            </div>
        </div>

        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <svg
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            class="bi bi-calendar"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"
                            />
                        </svg>
                    </th>
                    <th v-for="(fryzjer, i) in fryzjerzy" :key="i">
                        {{
                            fryzjer.imie.substr(0, 1) + ". " + fryzjer.nazwisko
                        }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(zabieg, i) in zabiegi" :key="i">
                    <td>{{ zabieg.name }}</td>
                    <td v-for="(fryzjer, idx) in fryzjerzy" :key="idx">
                        <span v-for="cennik in cenniki" :key="cennik.id">
                            <router-link
                            :to="'/cennik/edit/'+cennik.id"
                                v-if="
                                    cennik.zabieg_id === zabieg.id &&
                                        cennik.fryzjer_id === fryzjer.id
                                "
                                class="badge badge-pill bg-secondary text-light px-3 py-2"
                                >
                                {{ cennik.cena + 'zł' }}
                                </router-link
                            >
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Cennik",

        data() {
            return {
                cenniki: null,
                zabiegi: null,
                fryzjerzy: null,
                message: null,
                type: null
            };
        },

        methods: {
            getCenniki: function() {
                axios.get("/api/cennik").then(res => (this.cenniki = res.data));
            },

            getZabiegi: function() {
                axios.get("/api/zabiegi").then(res => (this.zabiegi = res.data));
            },

            getFryzjerzy: function() {
                axios
                    .get("/api/fryzjerzy")
                    .then(res => (this.fryzjerzy = res.data));
            },

            getMessage: function() {
                this.message = this.$route.params.message;
                this.type = this.$route.params.type;
            },
        },

        created() {
            this.getCenniki();
            this.getZabiegi();
            this.getFryzjerzy();
            this.getMessage();
        }
    };
</script>

<style>
</style>