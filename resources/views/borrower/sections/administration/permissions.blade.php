@extends('borrower.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed">
                <a href="{{route('admin.administration')}}" class="tab-title">Users</a>
            </div>
            <div class="col-1 tabbed tab-active">
                <a href="{{route('admin.administration.permissions')}}" class="tab-title">Permission</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr style="background-color: lightblue">
                        <th></th>
                        <th style="text-align: center">Super Admin</th>
                        <th style="text-align: center">Admin</th>
                        <th style="text-align: center">Consultant</th>
                        <th style="text-align: center">Borrower</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
