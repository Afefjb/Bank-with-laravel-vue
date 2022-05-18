<template lang="">
    <form  @submit.prevent="ajouterClient">
        <div style="margin-left: 160px; padding: 0px 10px;">
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="nom"
                v-model="nom"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="prenom"
                v-model="prenom"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="civilité"
                v-model="civilité"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="datenais"
                v-model="datenais"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="nature_de_client"
                v-model="nature_de_client"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="adresse"
                v-model="adresse"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="telephone"
                v-model="telephone"
            />
        </div>
        <div class="form-group">
            <input
                type="email"
                class="form-control"
                placeholder="email"
                v-model="email"
            />
        </div>
        <div class="form-group">
        <FilePond max-files="1" @change="onFileChange"/>
</div>
        <div class="form-group">
            adresse Agences<select class="form-control" v-model="AgenceID">
                <option v-for="c in Agences" :key="c.id" :value="c.id">
                    {{ c.adresse }}
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-block btn-primary">
            Ajouter Client
        </button>
        </div>
    </form>
</template>

<script>
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
export default {
        components: {
    FilePond: vueFilePond(FilePondPluginImagePreview)
    },
    data() {
        return {
            nom: "",
            prenom: "",
            civilité: "",
            datenais: "",
            nature_de_client: "",
            adresse: "",
            telephone: "",
            email: "",
            Photo: "",
            AgenceID:"",
            Agences: [],
        };
    },
    methods: {
        ajouterClient() {
            const client = {
                nom: this.nom,
                prenom: this.prenom,
                civilité: this.civilité,
                datenais: this.datenais,
                nature_de_client: this.nature_de_client,
                adresse: this.adresse,
                telephone: this.telephone,
                email: this.email,
                Photo: this.Photo,
                AgenceID: this.AgenceID,
            };
            this.axios
                .post("http://localhost:8000/api/Clientbs/",client)
                .then(() => {
                    this.$router.push("/clients");
                })

        },

        onFileChange(e) {
            this.Photo = "Clientbs/" + e.target.files[0].name;
        },
        getAgences() {
            this.axios
                .get("http://localhost:8000/api/Agences")
                .then((res) => {
                    this.Agences = res.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getAgences();
    },
};
</script>
<style lang=""></style>
