<template>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4">
        <img :src="movie.Poster" alt="" style="width: 100%">
      </div>
      <div class="col-12 col-md-8">
        <h2>{{ movie.Title }}</h2>
        <table class="table">
          <tr>
            <td>Year</td>
            <td>{{ movie.Year }}</td>
          </tr>
          <tr>
            <td>Genre</td>
            <td>{{ movie.Genre }}</td>
          </tr>
          <tr>
            <td>Director</td>
            <td>{{ movie.Director }}</td>
          </tr>
          <tr>
            <td>Actors</td>
            <td>{{ movie.Actors }}</td>
          </tr>
          <tr>
            <td>Language</td>
            <td>{{ movie.Language }}</td>
          </tr>
          <tr>
            <td>Country</td>
            <td>{{ movie.Country }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ movie.Plot }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import MovieDataService from '../services/MovieDataService.js'
export default {
  name: 'Detail',
  data() {
    return {
      movie: [],
    }
  },
  mounted() {
    MovieDataService.get(this.$route.params.id)
      .then(response => {
        this.movie = response.data
      })
  },
}
</script>