<template>
    <div class="mx-auto">
        <h1 class="text-center">Rezerwacje.vue</h1>
        <p
            v-if="this.message"
            class="alert text-center"
            v-bind:class="type"
            role="alert"
        >
            {{ message }}
        </p>
        <div class="row">
            <div
                class="col-sm-12 col-lg-6 mx-auto my-2 d-flex justify-content-around"
            >
                <button @click="prev" class="btn btn-outline-secondary">
                    <svg
                        width="1rem"
                        height="1rem"
                        viewBox="0 0 16 16"
                        class="bi bi-chevron-left"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
                        />
                    </svg>
                </button>
                <router-link
                    class="btn btn-success d-flex align-items-center"
                    to="/rezerwacje/add"
                >
                    Dodaj rezerwacje
                </router-link>
                <button @click="next" class="btn btn-outline-secondary">
                    <svg
                        width="1rem"
                        height="1rem"
                        viewBox="0 0 16 16"
                        class="bi bi-chevron-right"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <svg
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            class="bi bi-clock"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"
                            />
                            <path
                                fill-rule="evenodd"
                                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"
                            />
                        </svg>
                    </th>
                    <th v-for="(data, i) in dates" :key="i">
                        {{ data }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(godz, i) in godziny" :key="i">
                    <td>{{ godz.substr(0, 5) }}</td>
                    <td>
                        <!-- Day 1 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[0]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td>
                        <!-- Day 2 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[1]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td>
                        <!-- Day 3 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[2]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td>
                        <!-- Day 4 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[3]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td>
                        <!-- Day 5 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[4]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td>
                        <!-- Day 6 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[5]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <td>
                        <!-- Day 7 -->
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[6]
                            "
                        >
                            {{ user.imie }}
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

        created: function() {
            this.getUsers();
            this.setDates(this.number);
            this.getMessage();
        },

        data: function() {
            return {
                users: null,
                fryzjerzy: null,
                dates: [],
                godziny: [],
                number: 0,
                message: null,
                type: null
            };
        },

        methods: {
            getUsers: function() {
                axios
                    .get("/api/rezerwacje")
                    .then(response =>
                        (this.users = response.data).then(this.sortGodz())
                    )
                    .catch(err => console.log(err));
            },

            getMessage: function() {
                this.message = this.$route.params.message;
                this.type = this.$route.params.type;
            },

            sortGodz: function() {
                this.godziny = [];
                this.users.forEach(user => {
                    this.dates.forEach(data => {
                        if (user.data === data) {
                            this.godziny.push(user.godzina);
                        }
                    });
                });
                this.godziny.sort();
                this.godziny = [...new Set(this.godziny)];
            },

            setDates: function(number) {
                this.dates = [];

                const date = new Date();
                let year = date.getFullYear();
                let month = date.getMonth();
                let day = date.getDate() + number;

                const newDate = new Date(year, month, day);
                year = newDate.getFullYear();
                month = newDate.getMonth() + 1;
                day = newDate.getDate();

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
            },

            prev: function() {
                this.number -= 7;
                this.setDates(this.number);
                this.getUsers();
            },

            next: function() {
                this.number += 7;
                this.setDates(this.number);
                this.getUsers();
            }
        }
    };
</script>

<style>
</style>