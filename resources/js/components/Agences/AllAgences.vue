<template>
    <div style="margin-left: 160px; padding: 0px 10px;">
        <h2 class="text-center">Liste des Agences</h2>
        <router-link :to="{ name: 'AddAgence' }" class="btn btn-success"
            >ADD
        </router-link>

        <table class="table" id="example">
            <thead>
                <tr>
                    <th>Adressee</th>
                    <th>Telephone</th>
                    <th>Horaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ag in Agences" :key="ag.id">
                    <td>{{ ag.adresse }}</td>
                    <td>{{ ag.telephone }}</td>
                    <td>{{ ag.horaire }}</td>
                    <td>
                        <button
                            @click.prevent="deleteAgence(ag.id)"
                            class="btn btn-danger"
                        >
                            Delete
                        </button>
                        <router-link
                            :to="{ name: 'editAgence', params: { id: ag.id } }"
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
            Agences: [],
        };
    },
    mounted() {
        this.getAgences();
    },
    methods: {
        deleteAgence(id) {
            this.axios
                .delete(`http://localhost:8000/api/Agences/${id}`)
                .then((res) => {
                    console.log(res);
                    this.getAgences();
                })
                .agch((error) => {
                    console.log(error);
                });
        },
        getAgences() {
            this.axios
                .get("http://localhost:8000/api/Agences/")
                .then((response) => {
                    this.Agences = response.data;
                    $(function() {$('#example').DataTable();});

                });
        },
    },
};
</script>
