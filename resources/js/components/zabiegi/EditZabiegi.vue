<template>
    <div class="mx-auto">
        <h1 class="text-center">EditZabieg.vue</h1>

        <form method="post" class="col-4 mx-auto" @submit="checkForm">
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