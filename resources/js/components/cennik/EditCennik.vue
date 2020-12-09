<template>
    <div class="mx-auto">
        <h1 class="text-center">EditCennik.vue</h1>

        <form
            method="post"
            class="col-sm-12 col-md-8 col-lg-4 mx-auto"
            @submit="checkForm"
        >
            <div class="form-group">
                <label for="fryzjer">Fryzjer:</label>
                <select
                    id="fryzjer"
                    v-model="cennik.fryzjer_id"
                    class="form-control"
                >
                    <option disabled selected>Wybierz fryzjera</option>
                    <option
                        v-for="(fryzjer, idx) in fryzjerzy"
                        :key="idx"
                        :value="fryzjer.id"
                    >
                        {{ fryzjer.imie + " " + fryzjer.nazwisko }}
                    </option>
                </select>
                <p class="text-danger pt-2" v-if="errors.fryzjer">
                    {{ errors.fryzjer }}
                </p>
            </div>

            <div class="form-group">
                <label for="zabieg">Zabieg:</label>
                <select
                    id="zabieg"
                    v-model="cennik.zabieg_id"
                    class="form-control"
                >
                    <option disabled selected>Wybierz zabieg</option>
                    <option
                        v-for="(zabieg, idx) in zabiegi"
                        :key="idx"
                        :value="zabieg.id"
                    >
                        {{ zabieg.name }}
                    </option>
                </select>
                <p class="text-danger pt-2" v-if="errors.zabieg">
                    {{ errors.zabieg }}
                </p>
            </div>

            <div class="form-group">
                <label for="cena">Cena:</label>
                <input
                    id="cena"
                    type="text"
                    v-model="cennik.cena"
                    class="form-control"
                />
                <p class="text-danger pt-2" v-if="errors.cena">
                    {{ errors.cena }}
                </p>
            </div>

            <div class="form-group d-flex justify-content-around">
                <button
                    type="button"
                    class="btn btn-danger"
                    @click="removeCennik(cennik.id)"
                >
                    <svg
                        width="1.5rem"
                        height="1.5rem"
                        viewBox="0 0 16 16"
                        class="bi bi-trash text-light"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                        />
                    </svg>
                </button>
                <button type="submit" class="btn btn-primary">
                    <svg
                        width="1.5rem"
                        height="1.5rem"
                        viewBox="0 0 16 16"
                        class="bi bi-pencil-square text-light"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                        />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddCennik",

        created: function() {
            this.getCennik(this.$route.params.id);
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
                    cena: null
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
                    this.errors.zabieg = "Należy wybrać zabieg!";
                }

                //* Sprawdzenie ceny
                if (!this.cennik.cena) {
                    this.errors.cena = "Należy podać cenę!";
                }

                //* Sprawdzenie czy są errory, jak nie to dodajemy do bazy
                if (Object.keys(this.errors).length) {
                    // są errory
                } else {
                    delete this.cennik.zabieg;
                    delete this.cennik.fryzjer;

                    axios
                        .put("/api/cennik/" + this.cennik.id, this.cennik)
                        .then(() =>
                            this.$router.push({
                                name: "cennik",
                                params: {
                                    type: "alert-warning",
                                    message: "Pomyślnie dodano cennik."
                                }
                            })
                        );
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

            getCennik: function(id) {
                axios
                    .get("/api/cennik/" + id)
                    .then(res => (this.cennik = res.data));
            },

            removeCennik: function(id) {
                axios.delete("/api/cennik/" + id).then(() =>
                    this.$router.push({
                        name: "cennik",
                        params: {
                            type: "alert-danger",
                            message: "Pomyślnie usunięto cennik."
                        }
                    })
                );
            }
        }
    };
</script>

<style>
</style>