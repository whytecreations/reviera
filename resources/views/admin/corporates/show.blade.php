@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.flowercategories.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.flowercategories.fields.name')</th>
                            <td field-key='name'>{{ $corporate->company_name }}</td>
                        </tr>
                        
                        <tr>
                            <th>Company Type</th>
                            <td field-key='name'>{{ $corporate->corporate_type }}</td>
                        </tr>
                        <tr>
                            <th>Address Type</th>
                            <td field-key='name'>{{ $corporate->address_type }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td field-key='name'>{{ $corporate->address }}</td>
                        </tr>
                        <tr>
                            <th>Number Of Employees</th>
                            <td field-key='name'>{{ $corporate->number_of_employees }}</td>
                        </tr>
                        <tr>
                            <th>Nature Of Business</th>
                            <td field-key='name'>{{ $corporate->nature_of_business }}</td>
                        </tr>
                        <tr>
                            <th>Person In Charge</th>
                            <td field-key='name'>{{ $corporate->person_in_charge }}</td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td field-key='name'>{{ $corporate->position }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td field-key='name'>{{ $corporate->email }}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td field-key='name'>{{ $corporate->mobile }}</td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                            <td field-key='name'>{{ $corporate->tel }}</td>
                        </tr>
                        <tr>
                            <th>Fax</th>
                            <td field-key='name'>{{ $corporate->fax }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.corporates.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop