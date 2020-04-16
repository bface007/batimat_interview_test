<template>
    <div class="h-screen d-flex w-full justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoadingPage",
        mounted() {
            this.$store.dispatch('me')
        },
        computed: {
            checkingAuthentication() {
                return this.$store.state.checkedAuthentication
            }
        },
        watch: {
            checkingAuthentication(checked, old) {
                if(checked) {
                    if(this.$store.getters.isAuthenticated) {
                        this.$router.replace('/home')
                    }else {
                        this.$router.replace('/login')
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
