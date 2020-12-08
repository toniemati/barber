<template>
    <div class="mx-auto">
        <h1 class="text-center">AddZabieg.vue</h1>

        <form
            method="post"
            class="col-sm-12 col-md-8 col-lg-4 mx-auto"
            @submit="checkForm"
        >
            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input
                    id="name"
                    v-model="zabieg.name"
                    type="text"
                    class="form-control"
                />
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
        name: "AddZabiegi",

        data: function() {
            return {
                zabieg: {
                    name: null
                }
            };
        },

        methods: {
            checkForm: function(e) {
                e.preventDefault();
                axios.post("/api/zabiegi", this.zabieg).then(() =>
                    this.$router.push({
                        name: "zabiegi",
                        params: {
                            message: "Pomyślnie dodano rezerwacje."
                        }
                    })
                );
            }
        }
    };
</script>

<style>
</style>