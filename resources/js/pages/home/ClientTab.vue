<template>
    <div class="client-tab">
        <div class="d-flex justify-content-end mt-2 mb-2">
            <form class="form-inline" @submit.prevent="onSubmit">
                <label class="sr-only" for="name">Nom & Prénom</label>
                <input type="text" v-model="name" class="form-control mb-2 mr-sm-2" id="name" placeholder="Nom & Prénom" required>

                <label class="sr-only" for="phone">Téléphone</label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="tel" v-model="phone" class="form-control" id="phone" placeholder="Téléphone" required>
                </div>

                <button type="submit" class="btn btn-primary mb-2" :disabled="!canAdd">Ajouter</button>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom & Prénom</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clientsList" :key="client.id">
                <th scope="row">{{ client.id }}</th>
                <td>{{ client.name }}</td>
                <td>{{ client.phone }}</td>
                <td><button class="btn">Modifier</button></td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    import {Client, handleUnexpectedError} from '../../services/services'
    export default {
        name: "ClientTab",
        data: function () {
            return {
                clients: [],
                name: '',
                phone: '',
            }
        },
        computed: {
            clientsList() {
                return this.clients;
            },
            canAdd() {
                return window.validator.isLength(this.name, {min: 2})
                    && window.validator.isLength(this.phone, {min: 9})
                    && window.validator.isNumeric(this.phone)
            }
        },
        methods: {
            onSubmit() {
                if(!this.canAdd) return;

                Client.addClient(this.name, this.phone).then(response => {
                    console.log('response', response)
                    this.refresh();
                }).catch(error => {
                    if(error.response) {
                        return console.log('res', error.response)
                    }
                    handleUnexpectedError(error)
                })
            },
            refresh() {
                Client.getClients().then(response => {
                    console.log('clients', response.data);
                    this.clients = response.data;
                }).catch(error => {
                    console.log('error', error);
                })
            }
        },
        mounted() {
            this.refresh()
        }
    }
</script>

<style scoped>

</style>
