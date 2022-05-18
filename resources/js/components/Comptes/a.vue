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
            adresse Agences<select class="form-control" v-model="ClientID">
                <option v-for="c in Clients" :key="c.id" :value="c.id">
                    {{ c.nom }}
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-block btn-primary">
            Ajouter compte
        </button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            id: "",
            numero_de_compte: "",
            solde: "",
            type: "",
            ClientID:"",
            Clients: [],
        };
    },
    methods: {
        ajouterCompte() {
            const client = {
                numero_de_compte: this.numero_de_compte,
                solde: this.solde,
                type: this.type,
                ClientID: this.ClientID,
            };
            this.axios
                .post("http://localhost:8000/api/Comptes/", client)
                .then(() => {
                    this.$router.push("/comptes");
                })
                .catch((error) => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        },


        getClients() {
            let categ = event.target.value;
            this.axios
                .get("http://localhost:8000/api/Clientbs"+categ)
                .then((res) => {
                    this.Clients = res.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getClients();
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
