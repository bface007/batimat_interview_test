<template>
    <div class="h-screen d-flex w-full justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-2">
                        <h1 class="text-center">Se connecter</h1>
                        <form @onsubmit.prevent="onSubmit" :class="{
                            'was-validated': wasValidated
                        }" novalidate>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" v-model="email" id="email" class="form-control" :class="{
                                    'is-invalid': emailHasError
                                }" required ref="email">
                                <div :class="{
                                    'invalid-feedback': emailHasError
                                }">
                                    {{ emailError }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" v-model="password" id="password" class="form-control" :class="{
                                    'is-invalid': passwordHasError
                                }" required ref="password">
                                <div :class="{
                                    'invalid-feedback': passwordHasError
                                }">
                                    {{ passwordError }}
                                </div>
                            </div>
                            <app-button :enabled="canSubmit" :onClick="onSubmit" styleType="primary" type="submit" isBlock>Se connecter</app-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {Auth, handleUnexpectedError} from '../services/services'

    export default {
        name: "LoginPage",
        data: function () {
            return {
                email: '',
                password: '',
                emailError: null,
                passwordError: null,
                hasSetCSRF: false,
                wasValidated: false,
            }
        },
        computed: {
            canSubmit: function () {
                return window.validator.isEmail(this.email)
                    && window.validator.isLength(this.password, {min: 8})
                    && this.hasSetCSRF;
            },
            emailHasError: function () {
                return !_.isNil(this.emailError)
            },
            passwordHasError: function () {
                return !_.isNil(this.passwordError)
            },
            authenticated() {
                return this.$store.getters.isAuthenticated
            }
        },
        methods: {
            onSubmit: function () {
                if(!this.canSubmit) return;
                this.wasValidated = false;

                Auth.login(this.email, this.password).then(response => {
                    console.log('res', response);
                    this.$store.dispatch('me')
                }).catch(error => {
                    if(error.response) {
                        const { data } = error.response;

                        if(_.has(data.errors, 'email')) {
                            this.emailError = data.errors.email[0];
                            this.$refs.email.setCustomValidity(data.errors.email[0]);
                        }
                        if(_.has(data.errors, 'password')) {
                            this.passwordError = data.errors.password[0];
                            this.$refs.password.setCustomValidity(data.errors.password[0]);
                        }
                        return;
                    }
                    handleUnexpectedError(error)
                }).then(() => {
                    this.wasValidated = true;
                });
                return false;
            }
        },
        mounted() {
            if(this.$store.getters.checkingAuthentication) {
                return this.$router.replace('/')
            }
            Auth.setCSRF().then(response => {
                this.hasSetCSRF = true;
            })
        },
        watch: {
            authenticated(authenticated, old) {
                console.log('auth', authenticated);
                if(authenticated) {
                    if(this.$store.getters.isAuthenticated) {
                        this.$router.push('/home')
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
