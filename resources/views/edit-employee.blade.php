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
                    <div>Name</div>
                    <input id="name" type="name" name="Name" required value="{{$employee->Name}}">
                    <div>Email</div>
                    <input id="email" type="email" name="email" required value="{{$employee->email}}">
                    
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
                        <button type="submit" form="delete-form">Delete</button>
                    @endif
                @endauth
                
            </form>
            <form class="box" method="POST" action="/employees/{{$employee['id']}}" class="hidden" id="delete-form">
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