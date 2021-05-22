@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><h3>Phone Numbers</h3>
                      <form method="GET" action="{{ url('/') }}">
                        <div class="form-group row">
                          <div class="col-md-5">
                            <select class="form-control" name="country_id">
                              <option value="">Select Country</option>
                              @foreach($countries as $country)
                                <option 
                                  value="{{ $country->id }}" 
                                  {{ isset($filters['country_id']) && $filters['country_id'] == $country->id ? "selected" : ""}}
                                >
                                {{ $country->name }}
                              </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-4">
                            <select class="form-control" name="valid_phones">
                              <option value="">Select Phone Validation</option>
                              <option 
                                value="ok"
                                {{ isset($filters['valid_phones']) && $filters['valid_phones'] == "ok" ? "selected" : ""}}
                              >
                              Valide Phones
                              </option>
                              <option
                                value="nok"
                                {{ isset($filters['valid_phones']) && $filters['valid_phones'] == "nok" ? "selected" : ""}}
                              >
                              Not Valid Phones</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <button type="submit" class="btn btn-block btn-info">Filter</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Contry</th>
                            <th>State</th>
                            <th>Country Code</th>
                            <th>Phone Number</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($phones as $phone)
                            <tr>
                              <td>{{ $phone->name }}</td>
                              <td>{{ Str::upper($phone->state) }}</td>
                              <td>{{ $phone->phonecode }}</td>
                              <td>{{ $phone->phone_number }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer p-4">
                      <div class="row">
                          {{ $phones->appends($filters)->links("pagination::bootstrap-4") }}
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

