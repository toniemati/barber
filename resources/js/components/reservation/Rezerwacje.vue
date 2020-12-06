<template>
    <div class="container">
        <h1 class="text-center">Rezerwacje.vue</h1>
        <div class="row">
            <router-link class="btn btn-success" to="/rezerwacje/add"
                >Dodaj rezerwacje</router-link
            >
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.imie }}</td>
                    <td>{{ user.nazwisko }}</td>
                    <td>
                        <router-link
                            class="btn btn-outline-warning"
                            :to="'/rezerwacje/edit/' + user.id"
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
        name: "Reservation",

        data: function() {
            return {
                users: null
            };
        },

        mounted: function() {
            axios
                .get("/api/rezerwacje")
                .then(response => (this.users = response.data))
                .catch(err => console.log(err));
        }
    };
</script>

<style>
</style>