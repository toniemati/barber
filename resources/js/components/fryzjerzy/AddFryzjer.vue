<template>
    <div class="mx-auto">
        <h1 class="text-center">AddFryzjer.vue</h1>

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
        name: "AddFryzjer",

        data: function() {
            return {
                fryzjer: {},
                errors: {}
            };
        },

        methods: {
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
                console.log(Object.keys(this.errors).length);

                if (Object.keys(this.errors).length) {
                    //* są errory
                } else {
                    axios.post("/api/fryzjerzy", this.fryzjer).then(() =>
                        this.$router.push({
                            name: "fryzjerzy",
                            params: {
                                type: "alert-success",
                                message: "Pomyślnie dodano fryzjera."
                            }
                        })
                    );
                }
            }
        }
    };
</script>

<style scopet>
textarea {
    resize: none;
}
</style>