<template>
    <form @submit.prevent="modifierAgence">
        <div style="margin-left: 160px; padding: 0px 10px">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="adresse"
                    v-model="Agence.adresse"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="horaire"
                    v-model="Agence.horaire"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="telephone"
                    v-model="Agence.telephone"
                />
            </div>

            <button type="submit" class="btn btn-block btn-primary">
                Modifier Agence
            </button>
        </div>
    </form>
</template>
<script>
export default {
    data() {
        return {
            Agence: [],
        };
    },
    mounted() {
        this.getOneAgence();
    },
    methods: {
        modifierAgence() {
            const ag = {
                adresse: this.Agence.adresse,
                horaire: this.Agence.horaire,
                telephone: this.Agence.telephone,
            };
            this.axios
                .put(
                    `http://localhost:8000/api/Agences/${this.$route.params.id}`,
                    ag
                )
                .then(() => {
                    this.$router.push("/Agences");
                })
                .catch((error) => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        },

        getOneAgence() {
            this.axios
                .get(
                    `http://localhost:8000/api/Agences/${this.$route.params.id}`
                )
                .then((res) => {
                    this.Agence = res.data;
                });
        },
    },
};
</script>
