<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        @include('core.header')
    </head>
    <body>
        <div class="container">
            @include('core.menu')

            @if (!empty($message))
            @include('core.message')
            @endif

            @if ($errors->any())
            @include('core.errors')
            @endif

            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-right pr-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                        @foreach ($data as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td class="text-right">
                                @auth
                                <a href="{{route('edit')}}/{{$user->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{route('delete')}}/{{$user->id}}" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash-alt"></i> Delete</a>
                                @else
                                <a href="javascript:void(0)" class="btn btn-dark btn-sm mr-5"><i class="fas fa-lock"></i></a>
                                @endauth
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="2">-- no results found <i class="far fa-thumbs-down"></i> --</td>
                        </tr>
                        @endif
                    </tbody>
                    <tfooter>
                        <tr>
                            <td class="text-center" colspan="2"><b><i class="fas fa-calculator"></i> Total: {{count($data)}}<b></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>

        <!-- Scripts -->
        @include('core.footer')
    </body>
</html>
