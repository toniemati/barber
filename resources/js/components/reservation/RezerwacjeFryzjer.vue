<template>
    <div class="mx-auto">
        <h1 class="text-center">Rezerwacje dla fryzjera {{ fryzjer.imie }}</h1>

        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Data</th>
                    <th>Godzina</th>
                    <th>Zabieg</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(rez, i) in fryzjer.rezerwacje" :key="i">
                    <td>{{ rez.imie }}</td>
                    <td>{{ rez.nazwisko }}</td>
                    <td>{{ rez.data }}</td>
                    <td>{{ rez.godzina }}</td>
                    <td>{{ rez.zabieg.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "RezerwacjeFryzjer",

        data: function() {
            return {
                fryzjer: {
                    imie: ""
                }
            };
        },

        methods: {
            getFryzjer: function(id) {
                axios
                    .get("/api/fryzjerzy/" + id)
                    .then(res => (this.fryzjer = res.data));
            }
        },

        created: function() {
            this.getFryzjer(this.$route.params.id);
        }
    };
</script>

<style>
</style>