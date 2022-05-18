import { createRouter,createWebHashHistory } from 'vue-router'
import Home from "./Home";
import AllAgences from "./components/Agences/AllAgences.vue";
import AddAgence from "./components/Agences/AddAgence.vue";
import EditAgence from "./components/Agences/EditAgence.vue";
import AllClients from "./components/Clients/AllClients.vue";
import AddClient from "./components/Clients/AddClient.vue";
import EditClient from "./components/Clients/EditClient.vue";
import AllComptes from "./components/Comptes/AllComptes.vue";
import AddCompte from "./components/Comptes/AddCompte.vue";
import EditCompte from "./components/Comptes/EditCompte.vue";
import Register from './components/Authentification/Register.vue';
import Login from './components/Authentification/Login.vue';
import Profile from './components/Authentification/Profile.vue';
import Logout from './components/Authentification/Logout.vue';




const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/agences',
        name: 'agences',
        component: AllAgences
    },
    {
        path: '/AddAgence',
        name: 'AddAgence',
        component: AddAgence
    },
    {
        path: '/a',
        name: 'editAgence',
        component: EditAgence
    },

    {
        path: '/clients',
        name: 'Clientbs',
        component: AllClients
    },
    {
        path: '/AddClient',
        name: 'AddClient',
        component: AddClient
    },
    {
        path: '/EditClient',
        name: 'EditClient',
        component: EditClient
    },
    {
        path: '/comptes',
        name: 'comptes',
        component: AllComptes
    },
    {
        path: '/AddCompte',
        name: 'AddCompte',
        component: AddCompte
    },
    {
        path: '/ditCompte',
        name: 'editCompte',
        component: EditCompte
    },
    {
        name: 'register',
        path: '/register',
        component: Register
        },
        {
        name: 'login',
        path: '/login',
        component: Login
        },
        {
        name: 'profile',
        path: '/profile',
        component: Profile
        },
        {
            name: 'logout',
            path: '/logout',
            component: Logout
            },


    ];
const router = createRouter({
    history: createWebHashHistory(),
    routes
    })

export default router
