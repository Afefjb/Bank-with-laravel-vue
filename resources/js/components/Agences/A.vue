<template lang="">
    <form @submit.prevent="ajouterCompte">
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="numero_de_compte"
                v-model="numero_de_compte"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="solde"
                v-model="solde"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="type"
                v-model="type"
            />
        </div>

        <div class="form-group">
            Branche<select
                class="form-control"
                v-model="Agence"
                @change="getClients($event)"
            >
                <option v-for="c in Agences" :key="c.id" :value="c.id">
                    {{ c.adresse }}
                </option>
            </select>
        </div>
        <div class="form-group">
            Client<select class="form-control" v-model="ClientID">
                <option v-for="c in Clients" :key="c.id" :value="c.id">
                    {{ c.nom }}
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-block btn-primary">
            Ajouter Compte
        </button>
    </form>
</template>

<script>

export default {
    name: "app",
    data() {
        return {
            id: "",
            numero_de_compte: "",
            solde: "",
            type: "",
            AgenceID: "",
            ClientID: "",
            Agences: [],
            Clients: [],
        };
    },
    methods: {
        ajouterCompte() {
            const pr = {
                numero_de_compte: this.numero_de_compte,
                solde: this.solde,
                type: this.type,
                AgenceID: this.AgenceID,
                ClientID: this.ClientID,

            };

            this.axios
                .post("http://localhost:8000/api/Comptes", pr)
                .then(() => {
                    this.$router.push("/comptes");
                })
                .catch((error) => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        },



        getClients() {
            this.axios
                .get("http://localhost:8000/api/Clientbs")
                .then((res) => {
                    this.Clients = res.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.axios
            .get("http://localhost:8000/api/Agences")
            .then((res) => {
                this.Agences = res.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
<style lang=""></style>
