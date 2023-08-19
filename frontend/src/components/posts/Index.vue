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
               <div class="col-md-4 bg-light" v-for="(post, index) in posts" :key="post.id" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                 <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                   <div class="col p-4 d-flex flex-column position-static">
                     <strong class="d-inline-block mb-2 text-primary">{{ post.kategori }}</strong>
                     <strong class="d-inline-block mb-2 text-dark">Author: {{ post.penulis }}</strong>
                     <h3 class="mb-0">{{ post.judul }}</h3>
                     <div class="mb-1 text-muted">{{ post.tgl_publish }}</div>
                     <p class="card-text mb-auto" max="10">{{ post.konten }}</p>
                     <router-link :to="{name: 'detail', params: { id: post.id }}">Continue reading</router-link>
                     <div class="text-right">
                       <button @click.prevent="PostDelete(post.id, index)" class="btn btn-sm btn-danger badge">HAPUS</button>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
        </div>
    </div>
</template>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    import axios from 'axios'

    export default {

        data() {
            return {
                posts: []
            }
        },
        created() {
            axios.get('http://localhost:8080/api/post').then(response => {
                this.posts = response.data.data;
            });
        },
        methods: {
            PostDelete(id, index)
            {
                axios.delete(`http://localhost:8080/api/post/${id}`)
                    .then(response => {
                        this.posts.splice(index, 1);
                        console.log(response);
                    }).catch(error => {
                    console.log(error.response);
                });
            }
        }
    }
</script>
<!-- <script>
import axios from "axios";
 
export default {
  name: "Post",
  data() {
    return {
      post: [],
    };
  },
  created() {
    this.getPosts();
  },
  methods: {
    async getPosts() {
      try {
        const response = await axios.get("product");
        this.products = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async pos(id) {
      try {
        await axios.delete(`product/${id}`);
        this.getPosts();
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script> -->