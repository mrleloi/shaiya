@extends('layouts.web', [
    'title' => $settingHome->title
])

@section('content')
    <script type="text/javascript" src="/home/strongwow.js"></script>
    <aside id="right" class="mainside">
        <div class="content_header border_box" style="margin-bottom: -20px;">
            <span class="latest_news vertical_center"> Tin tức</span>
        </div>

        @if (!$postNews->isEmpty())
        @foreach ($postNews as $post)
        <article id="post-{{ $post->id }}" class="post expandable collapsed">
            <div class="post-inner">
                <div class="post-left"
                     style="background-image: url({{ isset($post->icon_url) ? url($post->icon_url->url) : url('/images/default-icon-news.png') }});"></div>

                <div class="post-right border_box">
                    <div class="post_header">
                        <h2 class="meta_info post_title overflow_ellipsis">
                            <a>{{ $post->title }} </a>
                        </h2>
                        <span class="meta_info post_author overflow_ellipsis">
                         <span class="post_date">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                    </span>
                        <a href="javascript:void(0)" onclick="toggleView(this, 'post-{{ $post->id }}')"
                           class="nice_button meta_info post_readmore overflow_ellipsis vertical_center align_center">
                            <span class="rm" style="">Read more</span>
                            <span class="rl" style="display: none;">Read less</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="post-bottom border_box" style="display: none;">
                <div class="post_body">
                    <div class="post_content self_clear">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </article>
        @endforeach

        @if ($postNews->hasPages())
        <div class="news_pagi border_box self_clear">
            <div class="news_pagi-left">
                {{ $postNews->links() }}
            </div>
        </div>
        @endif

        @else

            <div class="news_pagi border_box self_clear">
                <div class="news_pagi-left">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Trước">
                                <span class="page-link" aria-hidden="true">Không có tin tức nào được đăng.</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        @endif

        <div class="content_header border_box" style="margin-bottom: -20px;">
            <span class="latest_news vertical_center"> Sự kiện</span>
        </div>

        @if (!$postEvents->isEmpty())
        @foreach ($postEvents as $post)
            <article id="post-{{ $post->id }}" class="post expandable collapsed">
                <div class="post-inner">
                    <div class="post-left"
                         style="background-image: url({{ isset($post->icon_url) ? url($post->icon_url->url) : url('/images/default-icon-news.png') }});"></div>

                    <div class="post-right border_box">
                        <div class="post_header">
                            <h2 class="meta_info post_title overflow_ellipsis">
                                <a>{{ $post->title }} </a>
                            </h2>
                            <span class="meta_info post_author overflow_ellipsis">
                         <span class="post_date">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                    </span>
                            <a href="javascript:void(0)" onclick="toggleView(this, 'post-{{ $post->id }}')"
                               class="nice_button meta_info post_readmore overflow_ellipsis vertical_center align_center">
                                <span class="rm" style="">Xem thêm</span>
                                <span class="rl" style="display: none;">Thu nhỏ</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="post-bottom border_box" style="display: none;">
                    <div class="post_header" style="text-align: right; margin:10px;">
                    </div>
                    <div class="post_body">
                        <div class="post_content self_clear">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

        @if ($postEvents->hasPages())
        <div class="news_pagi border_box self_clear">
            <div class="news_pagi-left">
                {{ $postEvents->links() }}
            </div>
        </div>
        @endif

        @else

        <div class="news_pagi border_box self_clear">
            <div class="news_pagi-left">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled" aria-disabled="true" aria-label="« Trước">
                            <span class="page-link" aria-hidden="true">Không có sự kiện nào đang diễn ra.</span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        @endif
    </aside>
@endsection
