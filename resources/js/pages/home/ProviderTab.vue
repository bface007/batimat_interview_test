<template>
    <div class="client-tab">
        <div class="d-flex justify-content-end mt-2 mb-2">
            <form class="form-inline">
                <label class="sr-only" for="name">Nom & Prénom</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Nom & Prénom">

                <label class="sr-only" for="phone">Téléphone</label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" id="phone" placeholder="Téléphone">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom & Prénom</th>
                <th scope="col">Code</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ProviderTab"
    }
</script>

<style scoped>

</style>
