<template>
    <div>
        <h1 class="text-center">Rezerwacje.vue</h1>
        <p
            v-if="this.message"
            class="alert alert-success text-center"
            role="alert"
        >
            {{ message }}
        </p>
        <div class="row">
            <router-link class="btn btn-success" to="/rezerwacje/add"
                >Dodaj rezerwacje</router-link
            >
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
                <th>Godziny</th>
                <th v-for="data in dates" :key="data">
                    {{ data }}
                </th>
            </thead>
            <tbody>
                <tr v-for="godz in godziny" :key="godz">
                    <td>{{ godz }}</td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[0]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[1]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[2]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[3]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[4]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[5]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
                    <td
                        v-for="user in users"
                        :key="user.id"
                        v-if="user.godzina === godz && user.data === dates[6]"
                    >
                        <router-link to="#" class="badge badge-info">
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td></td>
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
                users: null,
                dates: [],
                godziny: [],
                message: null
            };
        },

        methods: {
            getRezerwacje: function() {
                axios
                    .get("/api/rezerwacje")
                    .then(response =>
                        (this.users = response.data).then(this.sortGodz())
                    )
                    .catch(err => console.log(err));
            },

            getMessage: function() {
                this.message = this.$route.params.message;
            },

            sortGodz: function() {
                this.users.forEach(user => {
                    this.godziny.push(user.godzina);
                });
                this.godziny = [...new Set(this.godziny)];
                this.godziny.sort();
            },

            setDates: function() {
                const date = new Date();
                let year = date.getFullYear();
                let month = date.getMonth() + 1;
                let day = date.getDate();

                for (let i = -3; i < 4; i++) {
                    const newDay = day + i;
                    const newMonth = month;

                    if (newDay < 10) {
                        newDay = "0" + newDay;
                    }
                    if (newMonth < 10) {
                        newMonth = "0" + newMonth;
                    }
                    this.dates.push(year + "-" + newMonth + "-" + newDay);
                }
            }
        },

        mounted: function() {
            this.getRezerwacje();
            this.getMessage();
            this.setDates();
            console.log(this.dates[3]);
        }
    };
</script>

<style>
</style>