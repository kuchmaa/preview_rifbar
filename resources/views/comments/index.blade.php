<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .comment-card {
            border-left: 4px solid #007bff;
            transition: transform 0.2s;
        }
        .comment-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .form-section {
            background: #f8f9fa;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <!-- Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 mb-3">
                    <i class="fas fa-comments text-primary"></i>
                    Community Comments
                </h1>
                <p class="lead text-muted">Share your thoughts and read what others have to say</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row mb-5">
            <div class="col-md-3 mb-3">
                <div class="card stats-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-check-circle fa-2x mb-2"></i>
                        <h3 class="mb-0">{{ $stats['total_approved'] }}</h3>
                        <small>Approved Comments</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-clock fa-2x mb-2"></i>
                        <h3 class="mb-0">{{ $stats['total_pending'] }}</h3>
                        <small>Awaiting Moderation</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card bg-info text-white h-100">
                    <div class="card-body">
                        <h6><i class="fas fa-star"></i> Latest Approved Comment</h6>
                        @if($stats['latest_approved'])
                            <p class="mb-1"><strong>{{ $stats['latest_approved']->author_name }}</strong></p>
                            <small>"{{ Str::limit($stats['latest_approved']->content, 100) }}"</small>
                        @else
                            <p class="mb-0">No comments yet. Be the first!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Comment Form -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="form-section p-4">
                    <h3 class="mb-4">
                        <i class="fas fa-edit text-primary"></i>
                        Leave a Comment
                    </h3>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="author_name" class="form-label">Your Name *</label>
                                <input type="text" 
                                       class="form-control @error('author_name') is-invalid @enderror" 
                                       id="author_name" 
                                       name="author_name" 
                                       value="{{ old('author_name') }}" 
                                       required>
                                @error('author_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="author_email" class="form-label">Your Email *</label>
                                <input type="email" 
                                       class="form-control @error('author_email') is-invalid @enderror" 
                                       id="author_email" 
                                       name="author_email" 
                                       value="{{ old('author_email') }}" 
                                       required>
                                @error('author_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Email will not be published</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Your Comment *</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" 
                                      name="content" 
                                      rows="4" 
                                      placeholder="Share your thoughts..." 
                                      required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Minimum 10 characters, maximum 1000 characters</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane"></i>
                            Submit Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Comments List -->
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">
                    <i class="fas fa-comments text-primary"></i>
                    Recent Comments ({{ $comments->total() }})
                </h3>

                @if($comments->count() > 0)
                    @foreach($comments as $comment)
                        <div class="card comment-card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-title mb-0">
                                        <i class="fas fa-user text-muted"></i>
                                        {{ $comment->author_name }}
                                    </h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar"></i>
                                        {{ $comment->approved_at->format('M d, Y \a\t H:i') }}
                                    </small>
                                </div>
                                <p class="card-text">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $comments->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">No comments yet</h4>
                        <p class="text-muted">Be the first to share your thoughts!</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Back to Home -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-home"></i>
                    Back to Homepage
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
