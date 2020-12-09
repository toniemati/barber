<template>
    <div class="mx-auto">
        <h1 class="text-center">Wiadomosc.vue</h1>

        <div class="mx-auto d-flex justify-content-around my-2">
            <button @click="getWiadomosci" class="btn btn-outline-info">
                <svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    class="bi bi-arrow-counterclockwise"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"
                    />
                    <path
                        d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"
                    />
                </svg>
            </button>
        </div>

        <div class="row col-11 d-flex justify-content-around mx-auto">
            <div
                v-for="(wiadomosc, idx) in wiadomosci"
                :key="idx"
                class="jumbotron col-sm-12 col-md-10"
            >
                <div v-if="wiadomosc.new" class="text-right">
                    <span class="badge badge-success">{{ idx + 1 }} new!</span>
                </div>
                <h3>
                    {{ wiadomosc.imie + " " + wiadomosc.nazwisko }}
                </h3>
                <p class="lead">
                    {{ wiadomosc.message }}
                </p>
                <hr class="my-2" />
                <div class="d-flex justify-content-between">
                    <p class="text-primary">
                        {{ wiadomosc.email }}
                    </p>
                    <p>
                        <button
                            @click="deleteWiadomosc(wiadomosc.id)"
                            class="btn btn-danger"
                        >
                            Usuń
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Wiadomosc",

        created: function() {
            this.getWiadomosci();
            this.checkWiadomosc();
        },

        data: function() {
            return {
                wiadomosci: null
            };
        },

        methods: {
            getWiadomosci: function() {
                axios.get("/api/wiadomosci").then(res => {
                    this.wiadomosci = res.data;
                    this.setOld();
                });
            },

            checkWiadomosc: function() {
                if (!this.wiadomosci) {
                    console.log("nie ma zadnych wiaodmosci");
                }
            },

            setOld: function() {
                this.wiadomosci.forEach(mess => {
                    if (mess.new) {
                        axios.put("/api/wiadomosci/" + mess.id, { new: 0 });
                    }
                });
            },

            deleteWiadomosc: function(id) {
                axios
                    .delete("/api/wiadomosci/" + id)
                    .then(() => this.getWiadomosci());
            }
        }
    };
</script>

<style>
</style>