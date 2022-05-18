<template lang="">
    <form @submit.prevent="ajouterAgence">
    <div style="margin-left: 160px; padding: 0px 10px;">
    <h2>ajouter agence</h2>
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
                placeholder="horaire"
                v-model="horaire"
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
        <button type="submit" class="btn btn-block btn-primary">
            Ajouter Agence
        </button>
            </div>
    </form>
</template>
<script>
export default {
    data() {
        return {
            adresse: "",
            horaire: "",
            telephone: "",
        };
    },
    methods: {
        ajouterAgence() {
            const ag = {
                adresse: this.adresse,
                horaire: this.horaire,
                telephone: this.telephone,
            };
            this.axios
                .post("http://localhost:8000/api/Agences/", ag)
                .then(() => {
                    this.$router.push("/Agences");
                })
                .catch((error) => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        },
    },
};
</script>
<style lang=""></style>
