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
                    <!-- Placeholder logo used above -->
                    <div class="contents">
                        <strong>{{$employee['first_name']}} {{$employee['last_name']}}</strong>
                        <strong>{{$employee['email']}}</strong>
                        <strong>{{$employee['phone_number']}}</strong>
                    </div>
                </a>
            </article>
        </div>
        @endforeach
        <div class="pagination">
            <!-- Used to show the arrow and numbers links to the other pages of employees -->
            {{$employees->links()}}
        </div>
    </div>
</x-layout>