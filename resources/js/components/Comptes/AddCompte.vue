<template lang="">
    <form @submit.prevent="ajouterCompte">
        <div style="margin-left: 160px; padding: 0px 10px;">
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
            Client<select class="form-control" v-model="ClientbID" >
                <option v-for="cl in Clients" :key="cl.id" :value="cl.id">
                    {{cl.nom}}
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-block btn-primary">
            Ajouter Compte
        </button>
        </div>
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
            Agence: "",
            ClientbID: "",
            Agences: [],
            Clients: [],
        };
    },
    methods: {
        test(){
            console.log(this.Clients);
            console.log("clinet id",this.id);
        },
        ajouterCompte() {
            const pr = {
                numero_de_compte: this.numero_de_compte,
                solde: this.solde,
                type: this.type,
                ClientbID: this.ClientbID,
                AgenceID:this.Agence


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



        getClients(event) {
            let cl = event.target.value;
            this.axios
                .get("http://localhost:8000/api/Clientba/"+cl)
                .then((res) => {
                    console.log("res :",res.data);
                    this.Clients = res.data;
                    console.log("CLients",this.Clients.nom);
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
