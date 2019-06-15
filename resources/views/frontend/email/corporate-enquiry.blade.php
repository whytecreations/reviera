<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
</head>

<body>
<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#F7F7F7">
    <tbody>
    <tr>
        <td valign="top" style="border:0;display:block;"><img src="{{url('images/logo.gif')}}" width="100px" alt="Header" style="display:block; width:100px; border:none; margin:0;" /></td>
    </tr>
    <tr>
        <td valign="top"><table width="570" border="0" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td >&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:16px; font-weight:bold; text-align:center; text-transform:uppercase;">New Corporate Rate Tag Enquiry</td>
                </tr>
                <tr>
                    <td >&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">You have received a new corportate rate tag enquiry from website.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Company Type: {{$request->corporate_type}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Company Name: {{$request->company_name}}
                    </td>
                </tr>
                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Address Type: {{$request->address_type}}
                    </td>
                </tr>
                <tr>
                <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Address: {{$request->address}}
                </td>
                </tr>

                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Number Of Employees: {{$request->number_of_employees}}
                    </td>
                </tr>

                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Nature Of Business: {{$request->nature_of_business}}
                    </td>
                </tr>

                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Person In Charge: {{$request->person_in_charge}}
                    </td>
                </tr>
                
                <tr>
                    <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Position: {{$request->position}}
                    </td>
                </tr>

                <tr>
                <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Email: {{$request->email}}
                </td>
                </tr>

                <tr>
                <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Mobile: {{$request->mobile}}
                </td>
                </tr>

                <tr>
                <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Tel: {{$request->tel}}
                </td>
                </tr>

                <tr>
                <td style="font-family:Arial, sans-serif; color:#85929f;font-size:14px; font-weight:normal;">
                    Fax: {{$request->fax}}
                </td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td valign="top">
        {{-- <a href="#">        <img src="{{url('images/logo.gif')}}" width="100" alt="" style="display:block; border:none; margin:0;" /></a> --}}
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
