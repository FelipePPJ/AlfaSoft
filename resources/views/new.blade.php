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
                <div class="col-md-6">
                    <form action="{{route('new')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full name</label>
                            <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Full name" minlength="6" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Mobile phone</label>
                            <input type="text" class="form-control" value="{{old('contact')}}" name="contact" id="contact" pattern="[0-9]+" placeholder="Only numbers" minlength="9" maxlength="9" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        @include('core.footer')
    </body>
</html>
