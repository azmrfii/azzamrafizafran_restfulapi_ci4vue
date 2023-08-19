<template>
    <div class="posts bg-dark">
        <div class="container">
            <div class="row justify-konten-center">
                <div class="col-md-12">
                    <div v-if="errors.length">
                        <div v-for="error in errors" :key="error.index" class="alert alert-danger mt-1" role="alert">
                            {{ error }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            TAMBAH POST
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="PostStore" method="post">

                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" v-model="post.judul"
                                        placeholder="Masukkan judul">
                                </div>
                                <div class="form-group">
                                    <label>slug</label>
                                    <input type="text" class="form-control" v-model="post.slug"
                                        placeholder="Masukkan slug">
                                </div>
                                <div class="form-group">
                                    <label>konten</label>
                                    <textarea v-model="post.konten" class="form-control" cols="30" rows="5" placeholder="masukkan konten"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>penulis</label>
                                    <input type="text" class="form-control" v-model="post.penulis"
                                        placeholder="Masukkan penulis">
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" v-model="post.kategori"
                                        placeholder="Masukkan kategori">
                                </div>

                                <button type="submit" class="btn btn-md btn-success mr-2">SIMPAN</button>
                                <router-link :to="{name: 'posts'}" class="btn btn-md btn-danger">BATAL</router-link>

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
                post: {},
                errors: []
            }
        },
        methods: {
            PostStore(e) {

                if (this.post.judul && this.post.slug && this.post.konten && this.post.penulis && this.post.kategori) {

                    axios.post('http://localhost:8080/api/post', this.post)
                        .then(() => {
                            this.$router.push({
                                name: 'posts'
                            });
                        }).catch(error => {
                            console.log(error.response);
                        });
                }

                this.errors = [];

                if (!this.post.judul) {
                    this.errors.push('Masukkan judul Post.');
                }
                if (!this.post.slug) {
                    this.errors.push('Masukkan slug Post.');
                }
                if (!this.post.konten) {
                    this.errors.push('Masukkan Konten Post.');
                }
                if (!this.post.penulis) {
                    this.errors.push('Masukkan penulis Post.');
                }
                if (!this.post.kategori) {
                    this.errors.push('Masukkan kategori Post.');
                }
                e.preventDefault();

            }
        }
    }
</script>