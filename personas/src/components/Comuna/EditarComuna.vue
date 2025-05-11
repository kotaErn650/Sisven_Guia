<script setup lang="ts">
import Comunas from '@/views/Comunas.vue';

</script>

<template>
    <div class="container text-start">
        <h1 class="text-primary fw-bold">Editar</h1>
        <div class="card">
            <div class="card-header fw-bold">Comuna</div>
            <div class="card-body">
                <form @submit.prevent="updateComuna">


                    <div class="row mb-3">
                        <label for="comu_codi" class="form_label">Codigo</label>
                        <div class="input-group">
                            <div class="input-group-text"> <font-awesome-icon icon="tag"/> </div>
                            <input type="text" class="form-control" id="comu_codi" placeholder="Codigo de la Comuna" disabled
                                v-model="Comunas.comu_codi"
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="comu_nom" class="form-label">Nombre: </label>
                        <div class="input-group">
                            <div class="input-group-text"><font-awesome-icon icon="bank"/>  </div>

                            <select class="form-select">
                                <option selected value="0">Selecciona un Municipio</option>
                                <option v-for="municipio" in municipios v-bind:value="municipio.muni_codi">{{ municipio.muni_nomb }}</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" >SAVE</button>
                    <button class="btn btn-secondary mx-2" @click="cancel">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios  from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';

export default{
        name: 'EditarComuna',
        data() {
            return {
                Comunas: {
                    comu_codi: 0,
                    comu_nomb: '',
                    muni_codi: 0
                },
                municipios:[],
                muni_codi: 0
            }
        },
    methods: {
    cancel() {
        this.$router.push({ name: 'Comunas' })
    },

    async saveComuna() {
        this.comuna.muni_codi = this.muni_codi
        const res = await axios.post(`http://127.0.0.1:8000/api/comunas/`, this.comuna)
        console.log(res)
        if (res.status == 200) {
        this.$router.push({ name: 'Comunas' })
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Comuna has been saved',
            showConfirmButton: false,
            timer: 2000
        })
        }
    }
    },

        mounted() {
        axios.get(`http://127.0.0.1:8000/api/municipios/`)
            .then(response => {
            this.municipios = response.data.municipios
            })
        },
}
</script>
