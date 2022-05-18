<template>
    <div style="margin-left: 160px; padding: 0px 10px">
        <h2 class="text-center">Liste Clients</h2>
        <router-link :to="{ name: 'AddClient' }" class="btn btn-success"
            >ADD
        </router-link><br>
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Civilité</th>
                    <th>Datenais</th>
                    <th>Nature de client</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Adresse d'agence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="c in Clients" :key="c.id">
                    <td>{{ c.nom }}</td>
                    <td>{{ c.prenom }}</td>
                    <td>{{ c.civilité }}</td>
                    <td>{{ c.datenais }}</td>
                    <td>{{ c.nature_de_client }}</td>
                    <td>{{ c.adresse }}</td>
                    <td>{{ c.telephone }}</td>
                    <td>{{ c.email }}</td>
                    <td>
                        <img
                            :src="'../storage/images/'+c.Photo"
                            :alt="c.prenom"
                            width="70"
                        />
                    </td>
                    <td>{{ c.agence.adresse }}</td>
                    <td>
                        <button
                            @click.prevent="deleteClient(c.id)"
                            class="btn btn-danger"
                        >
                            Delete
                        </button>
                        <router-link
                            :to="{ name: 'EditClient', params: { id: c.id } }"
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
            Clients: [],
        };
    },
    mounted() {
        this.getClients();
    },
    methods: {
        deleteClient(id) {
            this.axios
                .delete(`http://localhost:8000/api/Clientbs/${id}`)
                .then((res) => {
                    console.log(res);
                    this.getClients();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getClients() {
            this.axios
                .get("http://localhost:8000/api/Clientbs/")
                .then((response) => {
                    this.Clients = response.data;
                    $(function() {$('#example').DataTable();});

                });
        },
    },
};
</script>
