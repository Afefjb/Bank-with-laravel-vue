<template>
    <!-- Nav bar -->
    <nav class=" navbar-dark bg-dark justify-content-between flex-nowrap flex-row">
        <div style="height: 100%; width: 160px;   position: fixed;  z-index: 1;  top: 0;  left: 0;background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);; overflow-x: hidden; padding-top: 20px;">

            <img src="https://i.pinimg.com/236x/31/a7/2c/31a72c0baf9d5a86b8268e01d6d8cc67--logo-bank-letter-logo.jpg" width="150" height="80"/>
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
                <li class="navbar-brand float-left">
                    <router-link class="nav-link" to="/logout"> Logout </router-link>
                </li>

            </ul>

        </div>
    </nav>

</template>

<script>
export default {}
</script>
