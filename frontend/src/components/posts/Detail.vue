<template>
    <div class="posts">
        <nav class="py-2 border-bottom">
            <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active" aria-current="page">Dashboard</a></li>
                <li><router-link :class="['btn btn-md btn-info mb-2']" to="/create">TAMBAH POST</router-link></li>
            </ul>
            </div>
        </nav>

        <div class="container mt-5">
             <div class="row mb-2">
               <div class="col-md-4 bg-light">
                 <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                   <div class="col p-4 d-flex flex-column position-static">
                     <strong class="d-inline-block mb-2 text-primary">{{ post.kategori }}</strong>
                     <strong class="d-inline-block mb-2 text-dark">Author: {{ post.penulis }}</strong>
                     <h3 class="mb-0">{{ post.judul }}</h3>
                     <div class="mb-1 text-muted">{{ post.tgl_publish }}</div>
                     <p class="card-text mb-auto" max="10">{{ post.konten }}</p>
                     <td class="text-right mt-2">
                        <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-sm btn-primary mr-2 badge">EDIT</router-link>
                        <router-link :to="{name: 'posts'}" class="btn btn-sm btn-info mr-2 badge">KEMBALI</router-link>
                    </td>
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
        created() {
            axios.get(`http://localhost:8080/api/post/${this.$route.params.id}`)
                .then((response) => {
                    this.post = response.data.data;
                });
        },
    }
</script>