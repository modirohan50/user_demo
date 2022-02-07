@extends('layout')

@section('content')

    <div class="col d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-body">
                <h4 class="text-center ">Add User</h4>
                <form action="{{ route("users.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name: <span style="color: red">*</span></label>
                            <input type="text" name="fname" class="form-control" value="{{ old('fname') }}" id=""
                                placeholder="Enter FirstName">
                                @error('fname')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name: <span style="color: red">*</span></label>
                            <input type="text" name="lname" class="form-control" value="{{ old('lname') }}" id=""
                                placeholder="Enter LastName">
                            @error('lname')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail: <span style="color: red">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" id=""
                            placeholder="Enter E-mail">
                            @error('email')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile: <span style="color: red">*</span></label>
                        <input type="file" name="profile" class="form-control" id="" placeholder="">
                        @error('profile')
                        <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hobby">Hobby: <span style="color: red">*</span></label><br />
                        <select id="select" class="form-control" name="hobby[]" multiple data-live-search="true">
                            <option value="reading">Reading</option>
                            <option value="Watchingtv">Watching Tv</option>
                            <option value="playing">Playing</option>
                            <option value="walking">Walking</option>
                            <option value="driving">Driving</option>
                            <option value="swimming">Swimming</option>
                        </select>
                        @error('hobby')
                        <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label><br />
                        <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female<br>
                    </div>
                    <div class="form-group">
                        <label for="social_name">Social Details:</label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="social_name[]" class="form-control" value="{{ old('socialname') }}"
                                id="" placeholder="Enter Social name">
                        </div>

                        <div class="input-group mb-3 col-md-6">
                            <input type="url" class="form-control" name="social_link[]" placeholder="Enter Social link"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="addRow" class="btn btn-outline-primary" type="button">Add More</button>
                            </div>
                        </div>
                    </div>
                    <div id="newRow"></div>
                    <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            // add row
            $("#addRow").click(function() {

                var html = '';
                html += '<div id="inputFormRow">';
                html += '<div class="form-row">';
                html += '<div class="form-group col-md-6">';
                html +='<input type="text" name="social_name[]" class="form-control"  id="" placeholder="Enter Social name">';
                html += '</div>';
                html += '<div class="input-group mb-3 col-md-6">';
                html += '<input type="url" name="social_link[]" class="form-control" placeholder="Enter Social link">';
                html += '<div class="input-group-append">';
                html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                $('#newRow').append(html);
            });

        });


        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });

    </script>
@endsection
