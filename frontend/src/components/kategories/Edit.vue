<template>
    <div class="posts">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div v-if="errors.length">
                        <div v-for="error in errors" :key="error.index" class="alert alert-danger mt-1" role="alert">
                            {{ error }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            EDIT KATEGORI
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="KategoriUpdate">

                                <div class="form-group">
                                    <label>KATEGORI</label>
                                    <input type="text" class="form-control" v-model="kategori.kategori"
                                        placeholder="Masukkan kategori">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-success mr-2">UPDATE</button>
                                    <router-link :to="{name: 'kategories'}" class="btn btn-md btn-danger">BATAL</router-link>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                kategori: {},
                errors: []
            }
        },
        created() {
            axios.get(`http://localhost:8080/api/kategori/${this.$route.params.id}`)
                .then((response) => {
                    this.kategori = response.data.data;
                });
        },
        methods: {
            KategoriUpdate(e) {

                if (this.kategori.kategori) {
                    axios.put(`http://localhost:8080/api/kategori/${this.$route.params.id}`, this.kategori)
                        .then((response) => {
                            this.$router.push({
                                name: 'kategories'
                            });
                            console.log(response);
                        }).catch(error => {
                            console.log(error.response.data.data);
                        });
                }

                this.errors = [];

                if (!this.kategori.kategori) {
                    this.errors.push('Masukkan kategori.');
                }

                e.preventDefault()
            }
        }
    }
</script>