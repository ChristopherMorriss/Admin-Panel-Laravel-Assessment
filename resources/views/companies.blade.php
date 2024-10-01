<x-layout>
    <h1>Test</h1>
    <div class="company-list">
        @foreach ($companies as $company)
        <div class="article-container">
            <article class="article">
                <a href="/companies/{{ $company['id'] }}" class="box">
                    <strong>{{$company['id']}}</strong></br>
                    <strong>{{$company['email']}}</strong>
                </a>
            </article>
        </div>
        @endforeach
        <div>
            {{$companies->links()}}
        </div>
    </div>
</x-layout>