// TMDb API anahtarını tanımlıyoruz
const apiKey = '375296b5f02109d955ae312c5ac52c8a';

// Popüler filmleri çekeceğimiz URL (Türkçe dilinde, sayfa 1)
const apiUrl = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=tr-TR&page=1`;

// API'den veri çekme işlemi
fetch(apiUrl)
    .then(response => response.json()) // Yanıtı JSON formatına çevir
    .then(data => {
        // İlk 6 filmi seçiyoruz
        const movies = data.results.slice(0, 6);
        const container = document.getElementById('movie-container');

        // Her bir film için kart oluşturuyoruz
        movies.forEach(movie => {
            // Her filmi <a> etiketiyle TMDb sitesine bağlayacağız
            const link = document.createElement('a');
            link.href = `https://www.themoviedb.org/movie/${movie.id}`; // Filmin detay sayfası
            link.target = "_blank"; // Yeni sekmede aç
            link.classList.add('movie-card'); // Stil sınıfı ekle

            // Kartın içeriği (poster, başlık, açıklama)
            link.innerHTML = `
                <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
                <h3>${movie.title}</h3>
                <p>${movie.overview.substring(0, 100)}...</p>
            `;

            // Kartı sayfadaki konteynıra ekle
            container.appendChild(link);
        });
    })
    .catch(error => {
        // Hata durumunda konsola yaz ve kullanıcıya mesaj göster
        console.error('Veri çekme hatası:', error);
        document.getElementById('movie-container').innerText = 'Film verileri yüklenemedi.';
    });
