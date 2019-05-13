@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center text-center table table-striped mt-auto mb-auto">
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Site Name</th>
                <th>Site Enviroments</th>
                <th>Main url</th>
            </tr>
            </thead>
            <tbody>
            @isset($sites)
                @foreach($sites as $site)
                    <tr>
                        <td>{{$site["id"]}}</td>
                        <td>{{$site["name"]}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Odabrani environmenti
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($site["selected_env"] as $env)
                                        <a class="dropdown-item disabled d-flex justify-content-center">{{strtoupper($env)}}</a>

                                    @endforeach
                                </div>
                            </div>
                        </td>

                        <td><a href="http://{{($site["name"].".localhost")}}"
                               class="btn">{{$site["name"].".localhost"}}</a></td>
                    <tr>

                @endforeach
            @endisset
            </tbody>

        </table>



</div>

@endsection
