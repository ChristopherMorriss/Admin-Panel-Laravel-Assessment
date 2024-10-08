<x-layout>
    <x-slot:title>
        Employee Information
    </x-slot:title>
    <div class="employee-list">
        <div class="article-container container">
            <article class="article">
                    <strong>First Name: {{$employee->first_name}}</strong>
                    <strong>Last Name: {{$employee->last_name}}</strong>
                    <strong>Email: {{$employee['email']}}</strong>
                    <strong>Telephone: {{$employee->phone_number}}</strong>
            </article>
            @auth
                <a href="/employees/{{$employee['id']}}/edit">Edit employee</a>
            @endauth
        </div>
    </div>
</x-layout>