<template>
  <div class="container">
    <div class="row" ref="infiniteList">
      <div class="col-12">
          <div class="search"> <i class="fa fa-search"></i> 
          <input type="text" v-model="search" class="form-control" placeholder="Search a movie now!"> <button class="btn btn-primary" @click="searchMovie">Search</button> </div>
      </div>
      <div class="col-6 col-lg-3" v-for="(movie, idx) in movies" :key="idx">
        <div class="card mt-1">
          <img :src="movie.Poster" class="card-img-top" alt="..." style="min-height: 200px;" @click="showImage(movie.Poster)">
          <div class="card-body">
            <h5 class="card-title">{{ movie.Title }}</h5>
          </div>
          <div class="card-footer text-center">
            <router-link :to="`/detail/${movie.imdbID}`" class="btn btn-primary">Detail</router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" ref="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Poster</h5>
          <button type="button" class="btn-close" @click="modal.hide()" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <img :src="image" style="width: 100%;min-height: 200px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="modal.hide()">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>
<style>

.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1)
}

.search input {
    height: 60px;
    text-indent: 25px;
    border: 2px solid #d6d4d4
}

.search input:focus {
    box-shadow: none;
    border: 2px solid rgb(6, 6, 216)
}

.search .fa-search {
    position: absolute;
    top: 20px;
    left: 16px
}

.search button {
    position: absolute;
    top: 5px;
    right: 5px;
    height: 50px;
    width: 110px;
    background: blue
}
</style>
<script>
import MovieDataService from '../services/MovieDataService.js'
import { Modal } from 'bootstrap'
export default {
  name: 'Home',
  data() {
    return {
      movies: [],
      page: 1,
      search: 'batman',
      modal: null,
      image: '',
    }
  },
  methods: {
    getMovies() {
      MovieDataService.getAll(this.page, this.search)
        .then(response => {
          this.movies = [...this.movies,...response.data.Search]
          this.page += 1;
        })
    },
    searchMovie() {
      MovieDataService.getAll(1, this.search)
        .then(response => {
          this.movies = response.data.Search
          this.page = 1;
        })
    },
    handleScroll() {
      if (this.$refs.infiniteList.getBoundingClientRect().bottom < window.innerHeight) {
        this.getMovies(this.page);
      }
    },
    showImage(image){
      this.image = image
      this.modal.show()
    }
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll)
    this.getMovies(this.page);
    this.modal = new Modal(this.$refs.imageModal)
  },
  unmounted() {
    window.removeEventListener("scroll", this.handleScroll)
  },
}
</script>