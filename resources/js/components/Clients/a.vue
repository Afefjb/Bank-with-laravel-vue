<template>
    <!-- Nav bar -->
    <nav class="navbar navbar-dark bg-dark justify-content-between flex-nowrap flex-row">
        <div class="container">


            <ul class="nav navbar-nav flex-row float-right">
                <li class="nav-item">
                    <router-link class="nav-link navbar-brand pr-3" to="/"> Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link navbar-brand pr-3" to="/agences"> Agences </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link navbar-brand pr-3" to="/clients"> Clients </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link navbar-brand pr-3" to="/comptes"> Comptes </router-link>
                </li>


            </ul>

        </div>
    </nav>

</template>

<script>
export default {}
</script>
