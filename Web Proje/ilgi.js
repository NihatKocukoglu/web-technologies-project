const apiKey = '375296b5f02109d955ae312c5ac52c8a';
const apiUrl = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=tr-TR&page=1`;

fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        const movies = data.results.slice(0, 6); // İlk 6 filmi al
        const container = document.getElementById('movie-container');

        movies.forEach(movie => {
            const link = document.createElement('a');
            link.href = `https://www.themoviedb.org/movie/${movie.id}`;
            link.target = "_blank"; // Yeni sekmede açılsın
            link.classList.add('movie-card');

            link.innerHTML = `
                <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
                <h3>${movie.title}</h3>
                <p>${movie.overview.substring(0, 100)}...</p>
            `;

            container.appendChild(link);
        });
    })
    .catch(error => {
        console.error('Veri çekme hatası:', error);
        document.getElementById('movie-container').innerText = 'Film verileri yüklenemedi.';
    });
