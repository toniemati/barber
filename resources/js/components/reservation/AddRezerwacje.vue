<template>
    <div>
        <h1 class="text-center">AddRezerwacje.vue</h1>

        <form method="post" class="col-4 mx-auto" @submit="checkForm">
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
        name: "AddRezerwacje",

        mounted: function() {
            this.setDate();
        },

        data: function() {
            return {
                errors: {},
                user: {
                    imie: null,
                    nazwisko: null,
                    data: null,
                    godzina: null
                },
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
                    axios.post("/api/rezerwacje", this.user).then(() =>
                        this.$router.push({
                            name: "rezerwacje",
                            params: {
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