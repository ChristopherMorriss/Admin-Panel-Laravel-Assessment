<x-layout>
    <div class="company-list">
        <div class="article-container">
            <article class="article">
                    <strong>Name: {{$company['Name']}}</strong>
                    <strong>ID: {{$company['id']}}</strong>
                    <strong>Email: {{$company['email']}}</strong>
                    <strong>Website: {{$company['website']}}</strong>
            </article>
            <button>Edit Company</button>
        </div>
    </div>
</x-layout>