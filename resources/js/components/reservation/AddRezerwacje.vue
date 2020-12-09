<template>
    <div>
        <h1 class="text-center">AddRezerwacje.vue</h1>

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
                    <option selected disabled>Wybierz fryzjera</option>
                    <option
                        v-for="(fryzjer, i) in fryzjerzy"
                        :key="i"
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
                    v-model="user.zabieg_id"
                    id="zabieg"
                    class="form-control"
                >
                    <option selected disabled>Wybierz zabieg</option>
                    <option
                        v-for="(zabieg, i) in zabiegi"
                        :key="i"
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
                <p
                    class="text-danger pt-2 font-weight-bold text-center"
                    v-else-if="errors.busy"
                >
                    {{ errors.busy }}
                </p>
            </div>

            <div class="form-group d-flex justify-content-around">
                <button type="reset" class="btn btn-warning">
                    <svg
                        width="1.5rem"
                        height="1.5rem"
                        viewBox="0 0 16 16"
                        class="bi bi-dash"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"
                        />
                    </svg>
                </button>
                <button type="submit" class="btn btn-success">
                    <svg
                        width="1.5rem"
                        height="1.5rem"
                        viewBox="0 0 16 16"
                        class="bi bi-plus"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
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

        created: function() {
            this.getReservation();
            this.getFryzjerzy();
            this.getZabiegi();
            this.setDate();
        },

        data: function() {
            return {
                errors: {},
                reservations: null,
                zabiegi: null,
                user: {
                    fryzjer_id: null,
                    zabieg_id: null,
                    imie: null,
                    nazwisko: null,
                    data: null,
                    godzina: null
                },
                fryzjerzy: null,
                data: {
                    min: null,
                    max: null
                }
            };
        },

        methods: {
            getReservation: function() {
                axios
                    .get("/api/rezerwacje")
                    .then(res => (this.reservations = res.data));
            },

            getFryzjerzy: function() {
                axios
                    .get("/api/fryzjerzy")
                    .then(res => (this.fryzjerzy = res.data));
            },

            getZabiegi: function() {
                axios.get("/api/zabiegi").then(res => (this.zabiegi = res.data));
            },

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

                //* Sprawdzenie fryzjera
                if (!this.user.fryzjer_id) {
                    this.errors.fryzjer = "Należy wybrać fryzjera!";
                }

                //* Sprawdzenie zabiegu
                if (!this.user.zabieg_id) {
                    this.errors.zabieg = "Należy wybrać zabieg!";
                }

                //* Sprawdzenie daty i godziny
                if (!this.user.data) {
                    this.errors.data = "Data rezerwacji jest wymagana!";
                }
                if (!this.user.godzina) {
                    this.errors.godzina = "Godzina rezerwacji jest wymagan!";
                }

                //* Sprawdzenie czy termin jest zajęty
                let godz = this.user.godzina + ":00";
                this.reservations.forEach(res => {
                    if (res.data === this.user.data && res.godzina === godz) {
                        this.errors.busy =
                            "Ta godzina w wybranym przez ciebie dniu jest zajęta!";
                    }
                });

                //* Sprawdzenie czy sa errory, jak nie to dodajemy do bazy
                if (Object.keys(this.errors).length) {
                    // console.log("sa err");
                } else {
                    axios.post("/api/rezerwacje", this.user).then(() =>
                        this.$router.push({
                            name: "rezerwacje",
                            params: {
                                type: "alert-success",
                                message: "Pomyślnie dodano rezerwacje."
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
            }
        }
    };
</script>

<style>
</style>