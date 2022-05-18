<template lang="">
    <form @submit.prevent="modifierClient">
        <div style="margin-left: 160px; padding: 0px 10px;">

        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="nom"
                v-model="Client.nom"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="prenom"
                v-model="Client.prenom"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="civilit\u00e9"
                v-model="Client.civilit\u00e9"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="datenais"
                v-model="Client.datenais"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="nature_de_client"
                v-model="Client.nature_de_client"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="adresse"
                v-model="Client.adresse"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="telephone"
                v-model="Client.telephone"
            />
        </div>
        <div class="form-group">
            <input
                type="email"
                class="form-control"
                placeholder="email"
                v-model="Client.email"
            />
        </div>
        <div class="form-group">
        <FilePond max-files="1"  @change="onFileChange" :files="'../storage/images/'+Client.Photo" />
        </div>

        <div class="form-group">
            Agence<select
                class="form-control"
                v-model="Client.AgenceID"
            >
                <option v-for="c in Agences" :key="c.id" :value="c.id">
                    {{ c.adresse }}
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
            Client: [],
            Agences: [],
        };
    },


    methods: {
        modifierClient() {
            const Clientt = {
                nom: this.Client.nom,
                prenom: this.Client.prenom,
                civilité: this.Client.civilité,
                datenais: this.Client.datenais,
                nature_de_client: this.Client.nature_de_client,
                adresse: this.Client.adresse,
                telephone: this.Client.telephone,
                email: this.Client.email,
                Photo: this.Client.Photo,
                AgenceID: this.Client.AgenceID,
            };

            this.axios
                .put(
                    `http://localhost:8000/api/Clientbs/${this.$route.params.id}`,
                    Clientt
                )
                .then(() => {
                    this.$router.push("/clients");
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
onFileChange(e) {
           console.log("ffffffffffffffffffffffff")
            this.Client.Photo = "Clientbs/" + e.target.files[0].name;
            console.log(e.target.files[0].name)

        },
        getOneClient() {
            this.axios
                .get(
                    `http://localhost:8000/api/Clientbs/${this.$route.params.id}`
                )
                .then((res) => {
                    this.Client = res.data;
                    console.log(this.Client);
                });
        },
    },
    created() {
        this.getAgence();
        this.getOneClient();
    },

};
</script>
<style lang=""></style>
