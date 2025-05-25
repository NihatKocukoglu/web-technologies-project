// TMDb API key'inizi buraya girin (tmdb'den ücretsiz hesap açıp alabilirsiniz)
const API_KEY = 'YOUR_API_KEY_HERE';
const API_URL = `https://api.themoviedb.org/3/movie/popular?api_key=${API_KEY}&language=tr-TR&page=1`;

fetch(API_URL)
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('movie-container');
        data.results.slice(0, 5).forEach(movie => {
            const div = document.createElement('div');
            div.classList.add('movie-card');
            div.innerHTML = `
                <h3>${movie.title}</h3>
                <img src="https://image.tmdb.org/t/p/w200${movie.poster_path}" alt="${movie.title}">
                <p>${movie.overview}</p>
            `;
            container.appendChild(div);
        });
    })
    .catch(error => {
        console.error('Film verisi alınamadı:', error);
    });
