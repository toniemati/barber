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
                            type: "alert-success",
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