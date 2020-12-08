<template>
    <div class="mx-auto">
        <h1 class="text-center">EditFryzjer.vue</h1>

        <form
            method="post"
            class="col-sm-12 col-md-8 col-lg-4 mx-auto"
            @submit="checkForm"
        >
            <div class="form-group">
                <label for="imie">Imie:</label>
                <input
                    id="imie"
                    v-model="fryzjer.imie"
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
                    v-model="fryzjer.nazwisko"
                    type="text"
                    class="form-control"
                />
                <p class="text-danger pt-2" v-if="errors.nazwisko">
                    {{ errors.nazwisko }}
                </p>
            </div>

            <div class="form-group">
                <label for="opis">Opis:</label>
                <textarea
                    id="opis"
                    v-model="fryzjer.opis"
                    name="opis"
                    class="form-control"
                    rows="3"
                >
                </textarea>
            </div>

            <div class="form-group">
                <label for="pic">Zdjęcie:</label>
                <input
                    id="pic"
                    v-model="fryzjer.pic"
                    type="text"
                    class="form-control"
                    disabled
                />
            </div>

            <div class="form-group d-flex justify-content-around">
                <button
                    type="button"
                    class="btn btn-danger"
                    @click="removeFryzjer(fryzjer.id)"
                >
                    Usuń
                </button>
                <button type="submit" class="btn btn-primary">
                    Edytuj
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditFryzjer",

        data: function() {
            return {
                fryzjer: {},
                errors: {}
            };
        },

        methods: {
            getFryzjer: function(id) {
                axios
                    .get("/api/fryzjerzy/" + id)
                    .then(res => (this.fryzjer = res.data));
            },

            removeFryzjer: function(id) {
                axios.delete("/api/fryzjerzy/" + id).then(() =>
                    this.$router.push({
                        name: "fryzjerzy",
                        params: {
                            message: "Pomyślnie usunięto fryzjera."
                        }
                    })
                );
            },

            checkForm: function(e) {
                e.preventDefault();

                this.errors = {};

                //* Sprawdzenie imie
                if (!this.fryzjer.imie) {
                    this.errors.imie = "Imie jest wymagane!";
                } else {
                    if (this.fryzjer.imie.length >= 3) {
                        // console.log("Imie ok");
                    } else {
                        this.errors.imie = "Imie musić mieć co najmniej 3 znaki!";
                    }
                }

                //* Sprawdzenie nazwiska
                if (!this.fryzjer.nazwisko) {
                    this.errors.nazwisko = "Nazwisko jest wymagane!";
                } else {
                    if (this.fryzjer.nazwisko.length >= 3) {
                        // console.log("Imie ok");
                    } else {
                        this.errors.nazwisko =
                            "Nazwisko musić mieć co najmniej 3 znaki!";
                    }
                }

                if (Object.keys(this.errors).length) {
                    //* są errory
                } else {
                    delete this.fryzjer.rezerwacje;
                    axios
                        .put("/api/fryzjerzy/" + this.fryzjer.id, this.fryzjer)
                        .then(() =>
                            this.$router.push({
                                name: "fryzjerzy",
                                params: {
                                    message: "Pomyślnie edytowano fryzjera."
                                }
                            })
                        );
                }
            }
        },

        created: function() {
            this.getFryzjer(this.$route.params.id);
        }
    };
</script>

<style scopet>
textarea {
    resize: none;
}
</style>