import http from "../utils/http-common";

class MovieDataService {
  getAll(page=1, title='batman') {
    return http.get(`?apikey=faf7e5bb&s=${title}&page=${page}`);
  }
  get(imdbID) {
    return http.get(`?apikey=faf7e5bb&i=${imdbID}&plot=full`);
  }
}
export default new MovieDataService();