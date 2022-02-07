@extends('layout')

@section('content')

        <div class="container-fluid mt-5">
            <h2 class="text-center">User Data</h2>
            @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
            @endif
            <a href="{{ route('users.create') }}"><button class="btn btn-primary"
                style="float:right; margin:10px 0;">Add New User</button></a>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Hobby</th>
                        <th>Soical Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $value->fname }}{{ $value->lname }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->hobby }}</td>
                            <td>
                                @php
                                    $value = explode(',', $value->social_name);
                                    $result = count($value);
                                @endphp
                                {{ $result }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    <div class="d-flex justify-content-center">
        {!! $data->links() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
            }, 2000);
        });
    </script>
@endsection
