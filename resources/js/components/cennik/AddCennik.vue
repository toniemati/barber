<template>
    <div class="mx-auto">
        <h1 class="text-center">Cennik.vue</h1>

        <form
            method="post"
            class="col-sm-12 col-md-8 col-lg-4 mx-auto"
            @submit="checkForm"
        >
            <div class="form-group">
                <label for="fryzjer">Fryzjer:</label>
                <select id="fryzjer" v-model="cennik.fryzjer_id" class="form-control">
                    <option disabled selected >Wybierz fryzjera</option>
                    <option v-for="(fryzjer, idx) in fryzjerzy" :key="idx" :value="fryzjer.id">
                        {{fryzjer.imie + ' ' + fryzjer.nazwisko}}
                    </option>
                </select>
                <p class="text-danger pt-2" v-if="errors.fryzjer">
                    {{ errors.fryzjer }}
                </p>
            </div>

            <div class="form-group">
                <label for="zabieg">Zabieg:</label>
                <select id="zabieg" v-model="cennik.zabieg_id" class="form-control">
                    <option disabled selected >Wybierz zabieg</option>
                    <option v-for="(zabieg, idx) in zabiegi" :key="idx" :value="zabieg.id">
                        {{zabieg.name}}
                    </option>
                </select>
                <p class="text-danger pt-2" v-if="errors.zabieg">
                    {{ errors.zabieg }}
                </p>
            </div>

            <div class="form-group">
                <label for="cena">Cena:</label>
                <input id="cena" type="text" v-model="cennik.cena" class="form-control">
                <p class="text-danger pt-2" v-if="errors.cena">
                    {{ errors.cena }}
                </p>
            </div>

            <div class="form-group d-flex justify-content-around">
                <button type="reset" class="btn btn-warning">
                    Reset
                </button>
                <button type="submit" class="btn btn-success">
                    Dodaj
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddCennik",

        created: function() {
            this.getFryzjerzy();
            this.getZabiegi();
        },

        data: function() {
            return {
                errors: {},
                fryzjerzy: null,
                zabiegi: null,
                cennik: {
                    fryzjer_id: null,
                    zabieg_id: null,
                    cena: null,
                }
            };
        },

        methods: {
            checkForm: function(e) {
                e.preventDefault();

                this.errors = {};

                //* Sprawdzenie fryzjer
                if (!this.cennik.fryzjer_id) {
                    this.errors.fryzjer = "Należy wybrać fryzjera!";
                }

                //* Sprawdzenie zabiegu
                if (!this.cennik.zabieg_id) {
                    this.errors.zabieg = 'Należy wybrać zabieg!';
                }

                //* Sprawdzenie ceny
                if (!this.cennik.cena) {
                    this.errors.cena = "Należy podać cenę!";
                }

                //* Sprawdzenie czy są errory, jak nie to dodajemy do bazy
                if(Object.keys(this.errors).length) {
                    // są errory
                } else {
                    axios.post('/api/cennik', this.cennik)
                    .then(()=> this.$router.push({
                            name: "cennik",
                            params: {
                                type: "alert-success",
                                message: "Pomyślnie dodano cennik."
                            }
                        }))
                }
            },

            getFryzjerzy: function() {
                axios
                    .get("/api/fryzjerzy")
                    .then(res => (this.fryzjerzy = res.data));
            },

            getZabiegi: function() {
                axios.get("/api/zabiegi").then(res => (this.zabiegi = res.data));
            },
        }
    };
</script>

<style>
</style>