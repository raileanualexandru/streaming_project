// LINK FOR IMAGES POSTERS
const posterUrl = "http://image.tmdb.org/t/p/original"; // lIEN POUR CHERCHER LES IMAGES

// CLÉ DIFF QUE SELON LES UTILISATEURS (POUR ÉVITER DE SE FAIRE HACKER MAIS LE CONTENU EST IDENTIQUE)
//  API KEY 
const apiKey = '08e5f4f809d80ba88983a82fc2a83c53';

// VARIABLE POUR CHAQUE GENRES
// TOP RATED FILMS
const top_rated = `https://api.themoviedb.org/3/movie/top_rated?api_key=${apiKey}`;
// POPULAR FILMS
const popular = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}`;
// UPCOMING FILMS
const upcoming = `https://api.themoviedb.org/3/movie/upcoming?api_key=${apiKey}`;

const latest = `https://api.themoviedb.org/3/movie/latest?api_key=${apiKey}`;

// BANNER

// FUNCTIONS PERMET DE FAIRE LA FETCH DE API => CHERCHER LE DATA
function getData(genre, idName) {

  // CONVERTI LE FICHIER MINIFIER EN JSON POUR LIRE LE DATA
  fetch(genre).then((reponse) => {
    return reponse.json();
  }).then((data) => {
    //STOCKER LES DONNÉES DANS MA VARIABLE
    const content = data.results;
    console.log(content); 
    // PARCOURIR TOUS LES FILMS PAR GENRE ET INSERER LA BALISE IMG POUR AFFICHER LES IMG
    content.forEach(movie => {
      // console.log(document.getElementById(''+idName+''));
      document.getElementById("" + idName + "").insertAdjacentHTML("beforeend", `<img src="${posterUrl}${movie['poster_path']}" class="posters"/>`);
    });
  });
}
getData(top_rated, "top_rated");
getData(popular, "popular");
getData(upcoming, "upcoming");
