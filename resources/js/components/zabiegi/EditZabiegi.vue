<template>
    <div class="mx-auto">
        <h1 class="text-center">EditZabieg.vue</h1>

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
                <button
                    type="button"
                    class="btn btn-danger"
                    @click="removeZabieg(zabieg.id)"
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
        name: "EditZabiegi",

        data: function() {
            return {
                zabieg: {}
            };
        },

        methods: {
            checkForm: function(e) {
                e.preventDefault();
                axios.put("/api/zabiegi/" + this.zabieg.id, this.zabieg).then(() =>
                    this.$router.push({
                        name: "zabiegi",
                        params: {
                            type: "alert-warning",
                            message: "Pomyślnie edytowano zabieg."
                        }
                    })
                );
            },

            getZabieg: function(id) {
                axios
                    .get("/api/zabiegi/" + id)
                    .then(res => (this.zabieg = res.data));
            },

            removeZabieg: function(id) {
                axios.delete("/api/zabiegi/" + id).then(() =>
                    this.$router.push({
                        name: "zabiegi",
                        params: {
                            type: "alert-danger",
                            message: "Pomyślnie usunięto zabieg."
                        }
                    })
                );
            }
        },

        created: function() {
            this.getZabieg(this.$route.params.id);
        }
    };
</script>

<style>
</style>