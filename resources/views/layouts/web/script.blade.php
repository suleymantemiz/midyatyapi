<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('js/google-map.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<!-- Favori Sistemi JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // LocalStorage'dan favorileri yükle
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');

        // Sayfa yüklendiğinde session ile senkronize et
        syncFavoritesWithServer(favorites);

        // Favori butonları için event listener
        const favoriteButtons = document.querySelectorAll('.favorite-btn');

        favoriteButtons.forEach(function (btn) {
            // Butonun durumunu güncelle
            const estateId = btn.getAttribute('data-id');
            if (favorites.includes(parseInt(estateId))) {
                btn.classList.add('active');
                btn.setAttribute('title', 'Favorilerden Çıkar');
                btn.querySelector('.ion-ios-heart').style.color = '#ff4757';
            }

            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const estateId = this.getAttribute('data-id');
                toggleFavorite(estateId, this);
            });
        });

        function toggleFavorite(estateId, btn) {
            fetch('/favorites/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    estate_id: estateId
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // LocalStorage'ı güncelle
                        favorites = data.favorites;
                        localStorage.setItem('favorites', JSON.stringify(favorites));

                        if (data.isFavorite) {
                            btn.classList.add('active');
                            btn.setAttribute('title', 'Favorilerden Çıkar');
                            btn.querySelector('.ion-ios-heart').style.color = '#ff4757';
                        } else {
                            btn.classList.remove('active');
                            btn.setAttribute('title', 'Favorilere Ekle');
                            btn.querySelector('.ion-ios-heart').style.color = '';
                        }
                        updateFavoritesCount(data.favoritesCount);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function updateFavoritesCount(count) {
            // Header'daki favori sayısını güncelle
            const favoritesCountElement = document.querySelector('.favorites-count');
            if (favoritesCountElement) {
                favoritesCountElement.textContent = count;
            }
        }

        function syncFavoritesWithServer(favorites) {
            fetch('/favorites/sync', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    favorites: favorites
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateFavoritesCount(data.favoritesCount);
                    }
                })
                .catch(error => {
                    console.error('Sync error:', error);
                });
        }

        // Favorileri temizleme fonksiyonu
        window.clearAllFavorites = function () {
            if (confirm('Tüm favorilerinizi silmek istediğinizden emin misiniz?')) {
                fetch('/favorites/clear', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            localStorage.removeItem('favorites');
                            favorites = [];
                            updateFavoritesCount(0);

                            // Tüm favori butonlarını sıfırla
                            document.querySelectorAll('.favorite-btn').forEach(function (btn) {
                                btn.classList.remove('active');
                                btn.setAttribute('title', 'Favorilere Ekle');
                                btn.querySelector('.ion-ios-heart').style.color = '';
                            });

                            // Favoriler sayfasındaysa sayfayı yenile
                            if (window.location.pathname === '{{ route("favorites.index") }}') {
                                location.reload();
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Clear error:', error);
                    });
            }
        }
    });
</script>
