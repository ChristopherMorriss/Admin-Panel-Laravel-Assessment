<x-layout>
    <div class="company-list">
    @foreach ($company as $companies)
        <div class="article-container">
            <article class="article">
                    <strong>{{$companies['Name']}}</strong>
                    <strong>{{$companies['id']}}</strong></br>
                    <strong>{{$companies['email']}}</strong></br>
                    <strong>{{$companies['website']}}</strong></br>
                    
            </article>
        </div>
    @endforeach
    </div>
</x-layout>