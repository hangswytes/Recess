@extends('layouts.app', ['activePage' => 'table', 'title' => 'G-22 INTERNATIONAL', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Table with 6 Top Schools</h4>
                           
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>School ID</th>
                                    <th>Name</th>
                                    <th>Students Participating</th>
                                    <th>Country</th>
                                    <th>City</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>S01</td>
                                        <td>School 1</td>
                                        <td>540</td>
                                        <td>DR Congo</td>
                                        <td>Kinshasa</td>
                                    </tr>
                                    <tr>
                                        <td>S02</td>
                                        <td>School 2</td>
                                        <td>490</td>
                                        <td>Kenya</td>
                                        <td>Kisumu</td>
                                    </tr>
                                    <tr>
                                        <td>S03</td>
                                        <td>School 3</td>
                                        <td>670</td>
                                        <td>South Sudan</td>
                                        <td>Juba</td>
                                    </tr>
                                    <tr>
                                        <td>S04</td>
                                        <td>School 4</td>
                                        <td>950</td>
                                        <td>Uganda</td>
                                        <td>Kampala</td>
                                    </tr>
                                    <tr>
                                        <td>S05</td>
                                        <td>School 5</td>
                                        <td>635</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                    </tr>
                                    <tr>
                                        <td>S06</td>
                                        <td>School 6</td>
                                        <td>780</td>
                                        <td>Tanzania</td>
                                        <td>Dodoma</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Table on 6 Top Participants</h4>
                           
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Participant ID</th>
                                    <th>Name</th>
                                    <th>School</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Ranking Points</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>P01</td>
                                        <td>Student 1</td>
                                        <td>School 1</td>
                                        <td>Uganda</td>
                                        <td>Kamapala</td>
                                        <th>9970</th>
                                    </tr>
                                    <tr>
                                        <td>P02</td>
                                        <td>Student 2</td>
                                        <td>School 2</td>
                                        <td>Kenya</td>
                                        <td>Kisumu</td>
                                        <th>9200</th>
                                    </tr>
                                    <tr>
                                        <td>P03</td>
                                        <td>Student 3</td>
                                        <td>School 3</td>
                                        <td>South Sudan</td>
                                        <td>Juba</td>
                                        <th>8800</th>
                                    </tr>
                                    <tr>
                                        <td>P04</td>
                                        <td>Student 4</td>
                                        <td>School 4</td>
                                        <td>DR Congo</td>
                                        <td>Kinshasa</td>
                                        <th>7900</th>
                                    </tr>
                                    <tr>
                                        <td>P05</td>
                                        <td>Student 5</td>
                                        <td>School 5</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                        <th>7520</th>
                                    </tr>
                                    <tr>
                                        <td>P06</td>
                                        <td>Student 6</td>
                                        <td>School 6</td>
                                        <td>Tanzania</td>
                                        <td>Dodoma</td>
                                        <th>5500</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection