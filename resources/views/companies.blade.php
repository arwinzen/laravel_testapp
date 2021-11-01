<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>

    <body>
    <p><strong>The current UNIX timestamp is {{ time() }}.</strong></p>

    @auth
        <!-- Authenticate user -->
        <p>Hi {{ Auth::user()->name }},</p>
    @endauth

    <h1>Company</h1>
{{--    {{$address}}--}}

    <table class="table table-bordered ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th></th>
        </tr>
        </thead>
        @isset($companies)
            @foreach ($companies as $company)
                <tbody>
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>
                        {{$company->name}}
                        <a type="button" class="btn btn-primary" href="{{ url('company/edit/' . $company->id) }}" >Edit</a>
                        <a type="button" class="btn btn-outline-info" href="{{ URL::signedRoute('company.edit', ['id' => $company->id]) }}">SignEdit</a>
                        <a type="button" class="btn btn-outline-dark" href="{{ URL::temporarySignedRoute('company.edit', now()->addSeconds(3) , ['id' => $company->id]) }}">TimeEdit</a>

                    </td>
                    <td>{{$company->created_at}}</td>
                    <td>{{$company->updated_at}}</td>
                </tr>
                </tbody>
            @endforeach
        @endisset
    </table>
    {{$companies->links('pagination::bootstrap-4')}}

{{--    @isset($companies)--}}
{{--        @foreach ($companies as $company)--}}
{{--            <p>  Company id : {{ $company->company_id }} - Company name : {{$company->company_name}}</p>--}}
{{--        @endforeach--}}
{{--        {{$companies->links('pagination::bootstrap-4')}}--}}
{{--    @endisset--}}

    </body>
</html>


