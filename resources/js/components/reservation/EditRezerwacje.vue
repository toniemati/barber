<template>
    <div>
        <h1 class="text-center">EditRezerwacje.vue</h1>

        <form
            method="post"
            class="col-sm-12 col-md-8 col-lg-4 mx-auto"
            @submit="checkForm"
        >
            <div class="form-group">
                <label for="imie">Imie:</label>
                <input
                    id="imie"
                    v-model="user.imie"
                    type="text"
                    class="form-control"
                />
                <p class="text-danger pt-2" v-if="errors.imie">
                    {{ errors.imie }}
                </p>
            </div>

            <div class="form-group">
                <label for="nazwisko">Nazwisko:</label>
                <input
                    id="nazwisko"
                    v-model="user.nazwisko"
                    type="text"
                    class="form-control"
                />
                <p class="text-danger pt-2" v-if="errors.nazwisko">
                    {{ errors.nazwisko }}
                </p>
            </div>

            <div class="form-group">
                <label for="fryzjer">Fryzjer: </label>
                <select
                    v-model="user.fryzjer_id"
                    id="fryzjer"
                    class="form-control"
                >
                    <option
                        v-for="(fryzjer, i) in fryzjerzy"
                        :key="i"
                        :value="fryzjer.id"
                    >
                        {{ fryzjer.imie + " " + fryzjer.nazwisko }}
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="zabieg">Zabieg:</label>
                <select
                    v-model="user.zabieg_id"
                    id="zabieg"
                    class="form-control"
                >
                    <option
                        v-for="(zabieg, i) in zabiegi"
                        :key="i"
                        :value="zabieg.id"
                    >
                        {{ zabieg.name }}
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input
                    id="data"
                    :min="this.data.min"
                    :max="this.data.max"
                    v-model="user.data"
                    type="date"
                    class="form-control"
                />
                <p class="text-danger pt-2" v-if="errors.data">
                    {{ errors.data }}
                </p>
            </div>

            <div class="form-group">
                <label for="godzina">Godzina:</label>
                <input
                    id="godzina"
                    min="10:00"
                    max="20:00"
                    step="1800"
                    v-model="user.godzina"
                    type="time"
                    class="form-control"
                />
                <p class="text-danger pt-2" v-if="errors.godzina">
                    {{ errors.godzina }}
                </p>
            </div>

            <div class="form-group d-flex justify-content-around">
                <button
                    type="button"
                    class="btn btn-danger"
                    @click="removeReservation(user.id)"
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
        name: "AddRezerwacje",

        data: function() {
            return {
                errors: {},
                user: {},
                fryzjerzy: null,
                zabiegi: null,
                data: {
                    min: null,
                    max: null
                }
            };
        },

        methods: {
            checkForm: function(e) {
                e.preventDefault();

                this.errors = {};

                //* Sprawdzenie imie
                if (!this.user.imie) {
                    this.errors.imie = "Imie jest wymagane!";
                } else {
                    if (this.user.imie.length >= 3) {
                        // console.log("Imie ok");
                    } else {
                        this.errors.imie = "Imie musić mieć co najmniej 3 znaki!";
                    }
                }

                //* Sprawdzenie nazwiska
                if (!this.user.nazwisko) {
                    this.errors.nazwisko = "Nazwisko jest wymagane!";
                } else {
                    if (this.user.nazwisko.length >= 3) {
                        // console.log("Nazwisko ok");
                    } else {
                        this.errors.nazwisko =
                            "Nazwisko musić mieć co najmniej 3 znaki!";
                    }
                }

                //* Sprawdzenie daty i godziny
                if (!this.user.data) {
                    this.errors.data = "Data rezerwacji jest wymagana!";
                }
                if (!this.user.godzina) {
                    this.errors.godzina = "Godzina rezerwacji jest wymagan!";
                }

                //* Sprawdzenie czy sa errory, jak nie to dodajemy do bazy
                if (Object.keys(this.errors).length) {
                    // console.log("sa err");
                } else {
                    delete this.user.fryzjer;
                    delete this.user.zabieg;

                    axios
                        .put("/api/rezerwacje/" + this.user.id, this.user)
                        .then(() =>
                            this.$router.push({
                                name: "rezerwacje",
                                params: {
                                    type: "alert-warning",
                                    message: "Pomyślnie edytowano rezerwacje."
                                }
                            })
                        );
                }
            },

            setDate: function() {
                //* Now date
                let date = new Date();
                let year = date.getFullYear();
                let month = date.getMonth() + 1;
                let day = date.getDate();
                if (month < 10) {
                    month = "0" + month;
                }
                if (day < 10) {
                    day = "0" + day;
                }
                const now = year + "-" + month + "-" + day;
                this.data.min = now;

                //* in2Months
                let in2Months = new Date(year, month + 2, day);
                year = in2Months.getFullYear();
                month = in2Months.getMonth();
                day = in2Months.getDate();
                if (month < 10) {
                    month = "0" + month;
                }
                if (day < 10) {
                    day = "0" + day;
                }
                in2Months = year + "-" + month + "-" + day;
                this.data.max = in2Months;
            },

            getReservation: function(id) {
                axios
                    .get("/api/rezerwacje/" + id)
                    .then(res => (this.user = res.data));
            },

            removeReservation: function(id) {
                axios.delete("/api/rezerwacje/" + id).then(() =>
                    this.$router.push({
                        name: "rezerwacje",
                        params: {
                            type: "alert-danger",
                            message: "Pomyślnie usunięto rezerwacje."
                        }
                    })
                );
            },

            getFryzjerzy: function() {
                axios
                    .get("/api/fryzjerzy")
                    .then(res => (this.fryzjerzy = res.data));
            },

            getZabiegi: function() {
                axios.get("/api/zabiegi").then(res => (this.zabiegi = res.data));
            }
        },

        created: function() {
            this.getReservation(this.$route.params.id);
            this.getFryzjerzy();
            this.getZabiegi();
            this.setDate();
        }
    };
</script>

<style>
</style>