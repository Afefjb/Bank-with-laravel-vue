<template >
    <div style="margin-left: 160px; padding: 0px 10px;">
        <h2 class="text-center">Liste comptes</h2>
        <router-link :to="{name: 'AddCompte'}" class="btn btn-success">ADD </router-link>

        <table class="table" id="example">
            <thead>
                <tr>
                    <th>numero_de_compte</th>
                    <th>solde</th>
                    <th>type</th>
                    <th>nom client</th>
                    <th>adresse de l'agence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="c in Comptes" :key="c.id">
                    <td>{{ c.numero_de_compte }}</td>
                    <td>{{ c.solde }}</td>
                    <td>{{ c.type }}</td>
                    <td>{{ c.client.prenom }}{{ c.client.nom }}</td>
                    <td>{{ c.agence.adresse }}</td>

                    <td>
                        <button
                            @click.prevent="deleteCompte(c.id)"
                            class="btn btn-danger"
                        >
                            Delete
                        </button>
                        <router-link
                            :to="{ name: 'editCompte', params: { id: c.id } }"
                            class="btn btn-success"
                            >Update
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery';
export default {
    data() {
        return {
            Comptes: [],
        };
    },
    mounted() {
        this.getComptes();
    },
    methods: {
        deleteCompte(id) {
            this.axios
                .delete(`http://localhost:8000/api/Comptes/${id}`)
                .then((res) => {
                    console.log(res);
                    this.getComptes();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getComptes() {
            this.axios
                .get("http://localhost:8000/api/Comptes/")
                .then((response) => {
                    this.Comptes = response.data;
                    $(function() {$('#example').DataTable();});

                });
        },
    },
};
</script>
