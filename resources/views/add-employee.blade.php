<x-layout>
    <x-slot:title>
        Add Employee 
    </x-slot:title>
    <div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/employees">
                @csrf
            <div>Employee Details</div>
            <div class="Input">
                <div>First Name</div>
                <input id="first_name" type="name" name="first_name">
                <div>Last Name</div>
                <input id="last_name" type="name" name="last_name">
                <div>Email</div>
                <input id="email" type="email" name="email">
                <div>Company</div>
                <select name="company" id="company">
                @foreach ($employees as $employee)
                <option value="{{$employee['company']}}">{{$employee['company']}}</option>
                @endforeach
                </select>
                <!-- <input id="company" type="name" name="company"> -->
                <div>Phone Number</div>
                <input id="phone_number" type="tel" name="phone_number"><br>
                @auth
                    @if (Auth::user()->admin == 1)
                        <button type="submit">Submit</button>
                        <!-- Only the admin user is allowed to add an employee -->
                    @endif
                @endauth
                @if($errors->any())
                        <div class="container error-container">
                            @foreach($errors->all() as $error)
                                <div class="error-pos">{{ $error }}</div>
                            @endforeach
                        </div>
                @endif
                
            </div>
            
            </form>
        </div>
    </div>
</x-layout>