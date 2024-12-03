<x-layout>
    <x-slot:title>
        Companies
    </x-slot:title>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th scope="col" class="lg-only">Company ID</th> -->
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col" class="lg-only">Logo</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
        <tr>
            <!-- <th scope="row"><a href="/companies/{{$company['id']}}" class="logo-box lg-only">{{$company['id']}}</a></th> -->
            <td><a href="/companies/{{$company['id']}}" class="logo-box">{{$company['Name']}}</a></td>
            <td><a href="/companies/{{$company['id']}}" class="logo-box">{{$company['email']}}</a></td>
            <td><a href="/companies/{{$company['id']}}" class="logo-box lg-only"><img src="https://picsum.photos/seed/50/50" class="logo-img"></a></td>
        </tr>
        @endforeach
        
        </tbody>
    </table>
    <div>
        <!-- Used to show the arrow and numbers links to the other pages of companies -->
        {{$companies->links()}}
    </div>
    <!-- <div class="company-list"> -->
        <!-- @foreach ($companies as $company)
        <div class="article-container">
            <article class="logo-article">
                <a href="/companies/{{$company['id']}}" class="logo-box"> 
                    <img src="https://picsum.photos/seed/50/50" class="logo-img">
                    <div class="contents">
                        <strong>{{$company['Name']}}</strong>
                        <strong>{{$company['email']}}</strong>          
                    </div>
                </a>
            </article>
        </div>
        @endforeach -->
        
    <!-- </div> -->
</x-layout>