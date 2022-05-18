<template lang="">
    <form @submit.prevent="modifierCompte">
        <div style="margin-left: 160px; padding: 0px 10px;">

        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="numero_de_compte"
                v-model="Compte.numero_de_compte"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="solde"
                v-model="Compte.solde"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="type"
                v-model="Compte.type"
            />
        </div>

        <div class="form-group">
            Branche<select
                class="form-control"
                v-model="Compte.AgenceID"
                @change="getClients($event)"
            >
                <option v-for="c in Agences" :key="c.id" :value="c.id">
                    {{ c.adresse }}
                </option>
            </select>
        </div>
        <div class="form-group">
            Client<select class="form-control" v-model="Compte.ClientbID">
                <option v-for="cl in Client" :key="cl.id" :value="cl.id">
                    {{ cl.prenom }} {{cl.nom}}
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-block btn-primary">
            Modifier Client
        </button>
        </div>
    </form>
</template>
<script>

export default {

    data() {
        return {
            Client: [],
            Agences: [],
            Compte:[],

        };
    },


    methods: {
        modifierCompte() {
            const cmpt = {
                numero_de_compte: this.Compte.numero_de_compte,
                solde: this.Compte.solde,
                type: this.Compte.type,
                ClientbID: this.Compte.ClientbID,
                AgenceID:this.Compte.AgenceID
            };

            this.axios
                .patch(
                    `http://localhost:8000/api/Comptes/${this.$route.params.id}`,
                    cmpt
                )
                .then(() => {
                    this.$router.push("/comptes");
                })
                .catch((error) => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        },

        getAgence() {
            this.axios
                .get("http://localhost:8000/api/Agences")
                .then((res) => {
                    this.Agences = res.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getClients(event) {
            let cl = event.target.value;
            this.axios
                .get("http://localhost:8000/api/Clientbs/"+cl)
                .then((res) => {
                    this.Client = res.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getOneCompte() {
            this.axios
                .get(
                    `http://localhost:8000/api/Comptes/${this.$route.params.id}`
                )
                .then((res) => {
                    this.Compte = res.data;
                    console.log(this.Client);
                });
        },
    },
    created() {
        this.getAgence();
        this.getOneCompte();
    },
};
</script>
<style lang=""></style>
