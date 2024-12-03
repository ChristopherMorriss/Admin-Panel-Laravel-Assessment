<x-layout>
    <x-slot:title>
        Employees
    </x-slot:title>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col" class="lg-only">Phone Number</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td><a href="/employees/{{$employee['id']}}" class="logo-box">{{$employee['first_name']}} {{$employee['last_name']}}</a></td>
            <td><a href="/employees/{{$employee['id']}}" class="logo-box">{{$employee['email']}}</a></td>
            <td><a href="/employees/{{$employee['id']}}" class="logo-box lg-only">{{$employee['phone_number']}}</a></td>
        </tr>
        @endforeach
        
        </tbody>
    </table>
    <div>
        <!-- Used to show the arrow and numbers links to the other pages of companies -->
        {{$employees->links()}}
    </div>
</x-layout>