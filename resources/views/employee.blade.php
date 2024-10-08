<x-layout>
    <x-slot:title>
        Employee Information
    </x-slot:title>
    <div class="employee-list">
        <div class="article-container container">
            <article class="article">
                    <strong>Name: {{$employee->Name}}</strong>
                    <strong>ID: {{$employee['id']}}</strong>
                    <strong>Email: {{$employee['email']}}</strong>
                    <strong>Website: {{$employee['website']}}</strong>
            </article>
            @auth
                <a href="/employee/{{$employee['id']}}/edit">Edit employee</a>
            @endauth
        </div>
    </div>
</x-layout>