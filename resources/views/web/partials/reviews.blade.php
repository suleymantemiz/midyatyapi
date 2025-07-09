@if($reviews->count() > 0)
    <div class="reviews-list">
        @foreach($reviews as $review)
        <div class="review-item border-bottom pb-3 mb-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="mb-1">{{ $review->name }}</h6>
                    <div class="rating mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="ion-ios-star{{ $i <= $review->rating ? '' : '-outline' }} text-warning"></i>
                        @endfor
                        <small class="text-muted ml-2">{{ $review->rating }}/5</small>
                    </div>
                </div>
                <small class="text-muted">{{ $review->created_at->format('d.m.Y') }}</small>
            </div>
            <p class="mb-0 text-muted">{{ $review->comment }}</p>
        </div>
        @endforeach
    </div>
@else
    <div class="text-center py-3">
        <p class="text-muted mb-0">Bu ilan için henüz yorum bulunmuyor.</p>
        <small class="text-muted">İlk yorumu siz yapın!</small>
    </div>
@endif 