<x-layout>
    <x-slot:title>
        Employees
    </x-slot:title>
    <div class="employee-list">
        @foreach ($employees as $employee)
        <div class="article-container">
            <article class="logo-article">
                <a href="/employees/{{$employee['id']}}" class="logo-box"> 
                    <img src="https://picsum.photos/seed/50/50" class="logo-img">
                    <div class="contents">
                        <strong>{{$employee['first_name']}}</strong>
                        <strong>{{$employee['last_name']}}</strong></br>
                        <strong>{{$employee['email']}}</strong><br>
                        <strong>{{$employee['phone_number']}}</strong>
                    </div>
                </a>
            </article>
        </div>
        @endforeach
        <div>
            {{$employees->links()}}
        </div>
    </div>
</x-layout>