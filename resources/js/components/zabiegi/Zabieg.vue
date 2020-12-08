<template>
    <div class="mx-auto">
        <h1 class="text-center">Zabieg.vue</h1>
        <p
            v-if="this.message"
            class="alert alert-success text-center"
            role="alert"
        >
            {{ message }}
        </p>
        <div class="row">
            <div
                class="col-sm-12 col-md-8 col-lg-4 mx-auto my-2 d-flex justify-content-around"
            >
                <router-link
                    class="btn btn-success d-flex align-items-center"
                    to="/zabiegi/add"
                    >Dodaj zabieg</router-link
                >
            </div>
        </div>
        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="zabieg in zabiegi" :key="zabieg.id">
                    <td>{{ zabieg.id }}</td>
                    <td>{{ zabieg.name }}</td>
                    <td>
                        <router-link
                            :to="'/zabiegi/edit/' + zabieg.id"
                            class="btn btn-info"
                        >
                            Edit
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Zabieg",

        data: function() {
            return {
                zabiegi: null,
                message: null
            };
        },

        methods: {
            getZabiegi: function() {
                axios
                    .get("/api/zabiegi")
                    .then(response => (this.zabiegi = response.data));
            },

            getMessage: function() {
                this.message = this.$route.params.message;
            }
        },

        created: function() {
            this.getZabiegi();
            this.getMessage();
        }
    };
</script>

<style>
</style>