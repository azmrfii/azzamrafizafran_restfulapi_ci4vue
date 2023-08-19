<template>
    <div class="posts">
        <div class="container mt-5">
            <div class="row justify-konten-center">
                <div class="col-md-12">
                    <div v-if="errors.length">
                        <div v-for="error in errors" :key="error.index" class="alert alert-danger mt-1" role="alert">
                            {{ error }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            TAMBAH KATEGORI
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="KategoriStore" method="post">

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" v-model="kategori.kategori"
                                        placeholder="Masukkan kategori">
                                </div>

                                <button type="submit" class="btn btn-md btn-success mr-2">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-danger">RESET</button>

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
        methods: {
            KategoriStore(e) {

                if (this.kategori.kategori) {

                    axios.post('http://localhost:8080/api/kategori', this.kategori)
                        .then(() => {
                            this.$router.push({
                                name: 'kategories'
                            });
                        }).catch(error => {
                            console.log(error.response);
                        });

                }

                this.errors = [];

                if (!this.kategori.kategori) {
                    this.errors.push('Masukkan Kategori.');
                }

                e.preventDefault();

            }
        }
    }
</script>