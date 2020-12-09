// LINK FOR IMAGES POSTERS
const posterUrl = "http://image.tmdb.org/t/p/original";
//  API KEY 
const apiKey = '08e5f4f809d80ba88983a82fc2a83c53';
// TOP RATED FILMS
const top_rated = `https://api.themoviedb.org/3/movie/top_rated?api_key=${apiKey}`;
// POPULAR FILMS
const popular = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}`;
// UPCOMING FILMS
const upcoming = `https://api.themoviedb.org/3/movie/upcoming?api_key=${apiKey}`;
// TRAILER
 


// NAV
// let searchButton = document.querySelector("#searchButton");
// searchButton.addEventListener("click", () => {
//   console.log("clicked");
//   fetch(`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${searchInput}`)
//   .then(response => response.json())
//   .then((data) => {
//     let searchInput = document.querySelector("#searchInput").value;
//     console.log(response);
//       if (searchInput == '') {
//         alert('Please Write Something in Search Bar');
//       } else {
//         data.results.forEach(film => {
//           document.querySelector("#filmSearch").insertAdjacentHTML("beforeend", `<img class="searchFilm" src="${posterUrl}${film.poster_path}"/>`);
//         })
//       }
//     })
// });

// BANNER FETCH
fetch(top_rated).then((reponse) => {
  return reponse.json();
}).then((data) => {
  // console.log(data);
  let random = Math.floor(Math.random() * data.results.length);
  const content_banner = data.results[random].backdrop_path;
  // console.log(content_banner); 
  let title = data.results[random].title;
  let overview = data.results[random].overview;
  document.getElementById("banner").insertAdjacentHTML("beforeend", `<img src="${posterUrl}${content_banner}" class="banners"/><p class="descriptions">${title}<br>${overview}</p>`);
});

// TRAILER 
function trailer(video) {
  document.querySelectorAll("#upcoming img").forEach(element => {
    element.addEventListener('click', () => {
      fetch(`https://api.themoviedb.org/3/movie/${element.dataset.id}/videos?api_key=${apiKey}&language=en-US`)
      .then((reponse) => {
        return reponse.json();
      }).then((data) => {
        let movieKey = data.results[0].key;
        console.log(movieKey); 
        document.querySelector("#trailer").insertAdjacentHTML("afterbegin", `<div><iframe width="560" height="315" src="https://www.youtube.com/embed/${movieKey}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`)
      });
    })
  })
}
setTimeout(trailer, 500);

// FUNCTIONS PERMET DE FAIRE LA FETCH DE API => CHERCHER LE DATA
function getData(genre, idName) {
  // CONVERTI LE FICHIER MINIFIER EN JSON POUR LIRE LE DATA
  fetch(genre).then((reponse) => {
    return reponse.json();
  }).then((data) => {
    //STOCKER LES DONNÉES DANS MA VARIABLE
    const content = data.results;
    // console.log(content); 
    // PARCOURIR TOUS LES FILMS PAR GENRE ET INSERER LA BALISE IMG POUR AFFICHER LES IMG
    content.forEach(movie => {
      document.getElementById("" + idName + "").insertAdjacentHTML("beforeend", `<img data-id="${movie['id']}" src="${posterUrl}${movie['poster_path']}" class="posters"/>`);
    });
  });
}
getData(top_rated, "top_rated");
getData(popular, "popular");
getData(upcoming, "upcoming");
    
