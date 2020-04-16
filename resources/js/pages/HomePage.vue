<template>
    <div class="h-screen d-flex w-full justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card p-2">
                        <h1 class="text-center">Dashboard</h1>
                        <ul class="nav nav-pills justify-content-center">
                            <router-link
                                to="/home"
                                v-slot="{ href, route, navigate, isActive, isExactActive }"
                            >
                                <li class="nav-item">
                                    <a class="nav-link" @onclick="navigate" :href="href" :class="{'active': isExactActive}">Clients</a>
                                </li>
                            </router-link>
                            <router-link
                                to="/home/providers"
                                v-slot="{ href, route, navigate, isActive, isExactActive }"
                            >
                                <li class="nav-item">
                                    <a class="nav-link" @onclick="navigate" :href="href" :class="{'active': isActive}">Fournisseurs</a>
                                </li>
                            </router-link>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">Devis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">Commandes</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tabs-content">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HomePage",
        mounted() {
            if(this.$store.getters.checkingAuthentication) {
                return this.$router.replace('/')
            }
        }
    }
</script>

<style scoped>

</style>
