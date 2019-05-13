@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center text-left">
        <form class="form-group" action="{{action('SiteController@newSite')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="siteName" name="siteName">Site Name</label>
                <input type="text" class="form-control" id="siteName" placeholder="Site Name" name="siteName">
            </div>

            <label for="inputEnv">Environments</label>
            <div class="form-group">
                <div class="form-check form-check-inline">

                    @foreach($environments as  $environment)

                        <input class="form-check-input" type="checkbox" value="{{$environment}}" name="env[]">
                        <label class="form-check-label mr-2" name="env[]">
                            {{strtoupper($environment)}}
                        </label>

                    @endforeach

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>


        @isset($Name)
            {{$Name}}

        @endisset
        @isset($env)
            {{$env}}
        @endisset

    </div>

@endsection
