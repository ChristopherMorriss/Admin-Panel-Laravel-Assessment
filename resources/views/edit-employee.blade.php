<x-layout>
    <x-slot:title>
        Edit employee: {{$employee->Name}}
    </x-slot:title>
    <div class="employee-list">
        <div class="container">
            <form class="box" method="POST" action="/employees/{{$employee['id']}}">
                @csrf
                @method('PATCH')
                <div class="Input">
                    <div>First Name</div>
                    <input id="first_name" type="name" name="first_name" required value="{{$employee->first_name}}">
                    <div>Last Name</div>
                    <input id="last_name" type="name" name="last_name" required value="{{$employee->last_name}}">
                    <div>Email</div>
                    <input id="email" type="email" name="email" required value="{{$employee->email}}">
                    <div>Company</div>
                    <input id="company" type="name" name="company" required value="{{$employee->company}}">
                    <div>Phone Number</div>
                    <input id="phone_number" type="tel" name="phone_number" required value="{{$employee->phone_number}}">
                    
                    <!-- <div>Website</div>
                    <input id="name" type="name" name="name" required> -->
                </div>
                <a href="/employees/{{$employee['id']}}">Cancel</a>
                <!-- can('edit',$employees) -->
                <!-- <button type="submit">Update</button> -->
                <!-- Only appears if the user is allowed to modify the job -->
                <!-- endcan -->
                <button type="submit">Update</button>
                @auth
                    @if (Auth::user()->admin == 1)
                        <button type="submit" form="delete-form2">Delete</button>
                    @endif
                @endauth
                
            </form>
            <form class="box" method="POST" action="/employees/{{$employee['id']}}" class="hidden" id="delete-form2">
                @csrf
                @method('DELETE')
            </form>
        </div>
        @if($errors->any())
            <div class="container error-container">
                @foreach($errors->all() as $error)
                    <div class="error-pos">{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>