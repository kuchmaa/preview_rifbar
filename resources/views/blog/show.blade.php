@extends('layouts.app')

@section('title', $post->title . ' - Duma Shipping Blog')
@section('meta_description', $post->excerpt)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/media/laptop.css') }}" media="(max-width:1660px)">
<link rel="stylesheet" href="{{ asset('css/media/tablet.css') }}" media="(max-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/media/mobile.css') }}" media="(max-width:860px)">
<style>
    /* Article Hero - matching main site hero style */
    .article-hero {
        position: relative;
        background: linear-gradient(135deg, var(--blue) 0%, #1e40af 100%);
        color: white;
        overflow: hidden;
        min-height: 50vh;
        display: flex;
        align-items: center;
        box-sizing: border-box;
    }

    .article-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('/imgs/services-hero.webp') center/cover;
        opacity: 0.1;
        z-index: 1;
    }

    .article-hero .wrapper {
        position: relative;
        z-index: 2;
    }

    .article-hero-content {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
    }

    /* Breadcrumb - matching main site style */
    .breadcrumb {
        background: rgba(255, 255, 255, 0.1);
        padding: 12px 24px;
        border-radius: 30px;
        margin-bottom: 32px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .breadcrumb a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
        font-family: var(--main-font);
    }

    .breadcrumb a:hover {
        color: white;
    }

    .breadcrumb-separator {
        color: rgba(255, 255, 255, 0.5);
        margin: 0 4px;
    }

    .breadcrumb-current {
        color: white;
        font-size: 14px;
        font-weight: 500;
    }

    /* Article Category Badge */
    .article-category {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--orange);
        color: white;
        padding: 16px 32px;
        border-radius: 40px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 32px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-family: var(--franklin);
    }

    .article-category::before {
        content: '';
        width: 8px;
        height: 8px;
        background: currentColor;
        border-radius: 50%;
    }

    .article-category:hover {
        background: var(--light-orange);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(239, 121, 26, 0.4);
    }

    /* Article Title */
    .article-title {
        font-family: var(--franklin);
        font-size: 56px;
        line-height: 1.1;
        color: white;
        margin-bottom: 32px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .article-excerpt {
        font-size: 24px;
        line-height: 1.5;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Article Meta */
    .article-meta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 32px;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 16px;
        font-family: var(--main-font);
    }

    .meta-item i {
        color: var(--orange);
        font-size: 14px;
    }

    /* Article Content Section */
    .article-content-section {
        background: white;
        position: relative;
        box-sizing: border-box;
    }

    .article-layout {
        display: grid;
        grid-template-columns: 100px 1fr 350px;
        gap: 60px;
        align-items: start;
    }

    /* Social Share Sidebar */
    .social-share {
        position: sticky;
        top: 140px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        align-items: center;
    }

    .share-label {
        font-size: 14px;
        font-weight: bold;
        color: var(--blue);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        font-family: var(--franklin);
    }

    .share-btn {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: white;
        font-size: 24px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        border: 3px solid rgba(255, 255, 255, 0.2);
    }

    .share-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s;
    }

    .share-btn:hover::before {
        left: 100%;
    }

    .share-btn:hover {
        transform: translateY(-6px) scale(1.1);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .share-twitter { background: linear-gradient(135deg, #1da1f2, #0d8bd9); }
    .share-facebook { background: linear-gradient(135deg, #4267b2, #365899); }
    .share-linkedin { background: linear-gradient(135deg, #0077b5, #005885); }
    .share-copy { background: linear-gradient(135deg, var(--blue), #1e40af); }

    /* Main Article Content */
    .article-main {
        background: white;
        border-radius: 32px;
        padding: 60px;
        box-shadow: 0 12px 60px rgba(0, 0, 0, 0.08);
        border: 2px solid #f1f5f9;
        position: relative;
        max-width: 100%;
        overflow: hidden;
    }

    .article-main::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--blue), var(--orange));
        border-radius: 32px 32px 0 0;
    }

    .article-featured-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 24px;
        margin-bottom: 60px;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
    }

    .article-content {
        font-size: 20px;
        line-height: 1.8;
        color: #374151;
        font-family: var(--main-font);
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .article-content h1,
    .article-content h2,
    .article-content h3,
    .article-content h4,
    .article-content h5,
    .article-content h6 {
        font-family: var(--franklin);
        color: var(--blue);
        margin-top: 60px;
        margin-bottom: 32px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .article-content h2 {
        font-size: 36px;
        border-bottom: 4px solid var(--orange);
        padding-bottom: 16px;
        position: relative;
    }

    .article-content h2::before {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 100px;
        height: 4px;
        background: var(--blue);
        border-radius: 2px;
    }

    .article-content h3 {
        font-size: 28px;
    }

    .article-content p {
        margin-bottom: 32px;
    }

    .article-content a {
        color: var(--blue);
        text-decoration: none;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .article-content a:hover {
        color: var(--orange);
        border-bottom-color: var(--orange);
    }

    .article-content ul,
    .article-content ol {
        margin-bottom: 32px;
        padding-left: 40px;
    }

    .article-content li {
        margin-bottom: 12px;
        line-height: 1.8;
    }

    .article-content blockquote {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        border-left: 6px solid var(--orange);
        padding: 40px;
        margin: 40px 0;
        border-radius: 0 24px 24px 0;
        font-style: italic;
        font-size: 24px;
        color: var(--blue);
        position: relative;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    }

    .article-content blockquote::before {
        content: '"';
        font-size: 120px;
        color: var(--orange);
        position: absolute;
        top: -20px;
        left: 30px;
        font-family: serif;
        opacity: 0.3;
    }

    .article-content code {
        background: #f1f5f9;
        padding: 6px 12px;
        border-radius: 8px;
        font-family: 'Courier New', monospace;
        color: var(--blue);
        font-size: 18px;
        border: 1px solid #e2e8f0;
    }

    .article-content pre {
        background: #1a202c;
        color: #e2e8f0;
        padding: 32px;
        border-radius: 16px;
        overflow-x: auto;
        margin: 32px 0;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        max-width: 100%;
    }

    .article-content table {
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        display: block;
        white-space: nowrap;
        border-collapse: collapse;
        margin: 32px 0;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .article-content table th,
    .article-content table td {
        padding: 16px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        white-space: normal;
    }

    .article-content table th {
        background: var(--blue);
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        font-family: var(--franklin);
    }

    .article-content pre code {
        background: none;
        padding: 0;
        color: inherit;
        border: none;
    }

    .article-content img {
        max-width: 100%;
        width: 100%;
        height: auto;
        border-radius: 16px;
        margin: 32px 0;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    /* Article Tags */
    .article-tags {
        margin-top: 60px;
        padding-top: 40px;
        border-top: 3px solid #e2e8f0;
    }

    .tags-title {
        font-family: var(--franklin);
        font-size: 24px;
        color: var(--blue);
        text-transform: uppercase;
        margin-bottom: 24px;
        font-weight: normal;
    }

    .tags-list {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }

    .tag-link {
        padding: 12px 24px;
        border-radius: 30px;
        color: white;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        font-family: var(--franklin);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .tag-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .tag-link:hover::before {
        left: 100%;
    }

    .tag-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        color: white;
    }

    /* Article Sidebar */
    .article-sidebar {
        position: sticky;
        top: 140px;
    }

    .sidebar-widget {
        background: white;
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 40px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
        border: 2px solid #f1f5f9;
    }

    .widget-title {
        font-family: var(--franklin);
        font-size: 24px;
        color: var(--blue);
        text-transform: uppercase;
        margin-bottom: 32px;
        position: relative;
        padding-bottom: 16px;
        font-weight: normal;
    }

    .widget-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--orange);
        border-radius: 2px;
    }

    /* Author Card */
    .author-card {
        text-align: center;
    }

    .author-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 20px;
        border: 4px solid var(--orange);
        object-fit: cover;
        box-shadow: 0 8px 25px rgba(239, 121, 26, 0.3);
    }

    .author-name {
        font-family: var(--franklin);
        font-size: 20px;
        color: var(--blue);
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .author-bio {
        color: #64748b;
        font-size: 16px;
        line-height: 1.6;
    }

    /* Related Posts */
    .related-post {
        display: flex;
        gap: 20px;
        padding: 20px 0;
        border-bottom: 2px solid #e2e8f0;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        border-radius: 16px;
    }

    .related-post:last-child {
        border-bottom: none;
    }

    .related-post:hover {
        background: #f8fafc;
        padding: 20px;
        margin: 0 -20px;
        transform: translateX(12px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .related-post-image {
        width: 80px;
        height: 80px;
        border-radius: 16px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .related-post-content {
        flex: 1;
    }

    .related-post-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--blue);
        line-height: 1.4;
        margin-bottom: 8px;
        font-family: var(--franklin);
        text-transform: uppercase;
    }

    .related-post-date {
        font-size: 14px;
        color: #64748b;
    }


    /* Responsive Design */
    @media (max-width: 1400px) {
        .article-layout {
            grid-template-columns: 80px 1fr 300px;
            gap: 40px;
        }

        .article-main {
            padding: 40px;
        }
    }

    @media (max-width: 1200px) {
        .article-layout {
            grid-template-columns: 1fr 280px;
            gap: 40px;
        }

        .social-share {
            display: none;
        }

        .article-main {
            padding: 40px;
        }
    }

    @media (max-width: 768px) {
        .article-hero-content {
            padding: 60px 0;
        }

        .article-title {
            font-size: 40px;
        }

        .article-excerpt {
            font-size: 18px;
        }

        .article-meta {
            gap: 20px;
        }

        .article-layout {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .article-main {
            padding: 32px 24px;
        }

        .article-content {
            font-size: 18px;
        }

        .article-content h2 {
            font-size: 28px;
        }

        .sidebar-widget {
            padding: 24px;
        }

    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInUp 0.8s ease forwards;
    }

    /* Reading Progress Bar */
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, var(--blue), var(--orange));
        z-index: 9999;
        transition: width 0.3s ease;
    }
</style>
@endpush

@section('content')
<!-- Reading Progress Bar -->
<div class="reading-progress"></div>

<!-- Article Hero -->
<section class="article-hero">
    <div class="wrapper section-content">
        <div class="article-hero-content">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="{{ route('blog.index') }}">Blog</a>
                <span class="breadcrumb-separator">/</span>
                @if($post->category)
                    <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
                    <span class="breadcrumb-separator">/</span>
                @endif
                <span class="breadcrumb-current">{{ Str::limit($post->title, 50) }}</span>
            </nav>

            @if($post->category)
                <a href="{{ route('blog.category', $post->category->slug) }}" class="article-category">
                    {{ $post->category->name }}
                </a>
            @endif

            <h1 class="article-title">{{ $post->title }}</h1>

            @if($post->excerpt)
                <p class="article-excerpt">{{ $post->excerpt }}</p>
            @endif

            <div class="article-meta">
                <span class="meta-item">
                    <i class="fas fa-user"></i>
                    {{ $post->author->name }}
                </span>
                <span class="meta-item">
                    <i class="fas fa-calendar"></i>
                    {{ $post->published_at->format('M j, Y') }}
                </span>
                @if($post->reading_time)
                    <span class="meta-item">
                        <i class="fas fa-clock"></i>
                        {{ $post->reading_time }} min read
                    </span>
                @endif
                <span class="meta-item">
                    <i class="fas fa-eye"></i>
                    {{ $post->views_count }} views
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content-section">
    <div class="wrapper section-content">
        <div class="article-layout">
        <!-- Social Share Sidebar -->
        <div class="social-share">
            <div class="share-label">Share</div>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->fullUrl()) }}"
               target="_blank" class="share-btn share-twitter" title="Share on Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
               target="_blank" class="share-btn share-facebook" title="Share on Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
               target="_blank" class="share-btn share-linkedin" title="Share on LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <button onclick="copyToClipboard('{{ request()->fullUrl() }}')"
                    class="share-btn share-copy" title="Copy Link">
                <i class="fas fa-link"></i>
            </button>
        </div>

        <!-- Main Article Content -->
        <div class="article-main animate-fade-in">
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}"
                     alt="{{ $post->title }}"
                     class="article-featured-image">
            @endif

            <div class="article-content">
                {!! $post->content !!}
            </div>

            @if($post->tags->count() > 0)
                <div class="article-tags">
                    <h4 class="tags-title">Tags</h4>
                    <div class="tags-list">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}"
                               class="tag-link"
                               style="background-color: {{ $tag->color }};">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        <!-- Sidebar -->
        <div class="article-sidebar">
            <!-- Author Card -->
            <div class="sidebar-widget">
                <h3 class="widget-title">About Author</h3>
                <div class="author-card">
                    @if($post->author->avatar)
                        <img src="{{ asset('storage/' . $post->author->avatar) }}"
                             alt="{{ $post->author->name }}"
                             class="author-avatar">
                    @else
                        <div class="author-avatar" style="background: linear-gradient(135deg, var(--blue), var(--orange)); display: flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold; font-family: var(--franklin);">
                            {{ strtoupper(substr($post->author->name, 0, 1)) }}
                        </div>
                    @endif
                    <h4 class="author-name">{{ $post->author->name }}</h4>
                    @if($post->author->bio)
                        <p class="author-bio">{{ $post->author->bio }}</p>
                    @endif
                </div>
            </div>

            <!-- Related Posts -->
            @if($relatedPosts && $relatedPosts->count() > 0)
                <div class="sidebar-widget">
                    <h3 class="widget-title">Related Articles</h3>
                    @foreach($relatedPosts as $relatedPost)
                        <a href="{{ route('blog.show', $relatedPost->slug) }}" class="related-post">
                            @if($relatedPost->featured_image)
                                <img src="{{ asset('storage/' . $relatedPost->featured_image) }}"
                                     alt="{{ $relatedPost->title }}"
                                     class="related-post-image">
                            @else
                                <div class="related-post-image" style="background: linear-gradient(135deg, var(--blue), var(--orange));"></div>
                            @endif
                            <div class="related-post-content">
                                <h4 class="related-post-title">{{ Str::limit($relatedPost->title, 60) }}</h4>
                                <p class="related-post-date">{{ $relatedPost->published_at->format('M j, Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    </div>
</section>

<!-- Footer -->
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate content on load
    setTimeout(() => {
        document.querySelector('.article-main').classList.add('animate-fade-in');
    }, 300);

    // Reading progress indicator
    const article = document.querySelector('.article-content');
    const progressBar = document.querySelector('.reading-progress');

    if (article && progressBar) {
        window.addEventListener('scroll', () => {
            const articleRect = article.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            const articleHeight = article.offsetHeight;

            if (articleRect.top < windowHeight && articleRect.bottom > 0) {
                const scrolled = Math.max(0, windowHeight - articleRect.top);
                const progress = Math.min(100, (scrolled / articleHeight) * 100);
                progressBar.style.width = progress + '%';
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Enhanced social sharing
    document.querySelectorAll('.share-btn, .share-button').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.tagName === 'A') {
                // Track social share (you can add analytics here)
                console.log('Shared via:', this.className);
            }
        });
    });

    // Image zoom functionality
    document.querySelectorAll('.article-content img').forEach(img => {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', function() {
            // Simple image zoom functionality
            const overlay = document.createElement('div');
            overlay.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 10000;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: zoom-out;
            `;

            const zoomedImg = img.cloneNode();
            zoomedImg.style.cssText = `
                max-width: 90%;
                max-height: 90%;
                object-fit: contain;
                border-radius: 16px;
                box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5);
            `;

            overlay.appendChild(zoomedImg);
            document.body.appendChild(overlay);

            overlay.addEventListener('click', () => {
                document.body.removeChild(overlay);
            });
        });
    });
});

// Copy to clipboard function
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        // Show success message
        const btn = event.target.closest('.share-btn');
        const originalIcon = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i>';
        btn.style.background = 'linear-gradient(135deg, #10b981, #059669)';

        setTimeout(() => {
            btn.innerHTML = originalIcon;
            btn.style.background = '';
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
</script>
@endpush
