<form class="feedbackRatingForm" action="{{ route('orders.feedback.store', $order) }}" method="POST">
    @csrf
    <div>
        <label for="rating"><span>Rating</span></label>
        <div class="rating flex row aic">
            <input type="number" name="rating" min="1" max="5" required>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="star-icon" viewBox="0 -960 960 960" width="24px"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="star-icon" viewBox="0 -960 960 960" width="24px"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="star-icon" viewBox="0 -960 960 960" width="24px"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="star-icon" viewBox="0 -960 960 960" width="24px"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="star-icon" viewBox="0 -960 960 960" width="24px"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
        </div>
        {{-- <select name="rating" id="rating" class="form-control" required>
            <option value="">Select a rating</option>
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select> --}}
    </div>
    <div>
        <label for="comment"><span>Comment</span></label>
        <textarea name="comment" rows="3" class="form-control"></textarea>
    </div>
    <div class="flex row ais">
        <button type="submit" class="btn_blue">Submit Feedback</button>
    </div>
</form>

@once
@vite(['resources/js/pages/orderDetails.js'])
@endonce
