<template>
    <div>
        <nav class="py-2 bg-light border-bottom">
            <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><router-link :class="['nav-link link-dark px-2']" to="/">Dashboard</router-link></li>
                <li class="nav-item"><router-link :class="['nav-link link-dark px-2']" to="/kategories">Kategori</router-link></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Users</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Logout</a></li>
            </ul>
            </div>
        </nav>
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            KATEGORI
                        </div>
                        <div class="card-body">
                            <router-link :class="['btn btn-md btn-success mb-2']" to="/create/kategories">TAMBAH KATEGORI</router-link>
                            <hr>

                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>KATEGORI</th>
                                        <th>AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(kategori, index) in kategories" :key="kategori.id">
                                        <td>{{ kategori.kategori }}</td>
                                        <td class="text-center">
                                            <router-link :to="{name: 'edit/kategori', params: { id: kategori.id }}" class="btn btn-sm btn-primary mr-2">EDIT</router-link>
                                            <button @click.prevent="KategoriDelete(kategori.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import 'bootstrap/dist/css/bootstrap.css'
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    
    export default {

        data() {
            return {
                kategories: []
            }
        },
        created() {
            axios.get('http://localhost:8080/api/kategori').then(response => {
                this.kategories = response.data.data;
            });
        },
        methods: {
            KategoriDelete(id, index)
            {
                axios.delete(`http://localhost:8080/api/kategori/${id}`)
                    .then(response => {
                        this.kategories.splice(index, 1);
                        console.log(response);
                    }).catch(error => {
                    console.log(error.response);
                });
            }
        }
    }
</script>