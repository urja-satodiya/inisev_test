@component('mail::message')
<div>
    we recently published new post on {{ $post->website->website_url }}
    
    Post Title: {{ $post->title }}
    Description: {{ $post->description }}
</div>
@endcomponent