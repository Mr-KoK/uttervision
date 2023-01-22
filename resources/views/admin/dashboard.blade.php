@extends('admin.layout.master')
@section('head')
    <title>Admin Dashboard - UtterVision</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <link rel="stylesheet" href="/assets/css/cpp/admin/admin-dashboard.min.css">
@endsection

@section('foot')
    <script src="/assets/js/plugins/charts/chart.js"></script>
    <script src="/assets/js/admin/admin-dashboard.js"></script>
@endsection

@section('content')
    <div class="_top-charts">
        <div class="statistics-holder dash-card">
            <section id="pi-one" class="section-chart align-center between flex">
                <div class="pie">

                </div>
                <ul class="pie1 legend">
                    <li>
                        <em>Students</em>
                        <span>718</span>
                    </li>
                    <li>
                        <em>Img</em>
                        <span>531</span>
                    </li>
                    <li>
                        <em>Fly</em>
                        <span>100</span>
                    </li>
                    <li>
                        <em>Visa</em>
                        <span>400</span>
                    </li>
                </ul>
            </section>
        </div>
        <div class="statistics-holder dash-card">
            <section class="section-chart align-center between flex">
                <div class="pie2 pie">

                </div>
                <ul class="pie2 legend">
                    <li>
                        <em>Admin</em>
                        <span>718</span>
                    </li>
                    <li>
                        <em>Partner</em>
                        <span>531</span>
                    </li>
                    <li>
                        <em>Users</em>
                        <span>868</span>
                    </li>
                    <li>
                        <em>Regs</em>
                        <span>280</span>
                    </li>
                    <li>
                        <em>Acc</em>
                        <span>420</span>
                    </li>
                </ul>
            </section>
        </div>
        <div class="statistics-holder dash-card">
            <section class="section-chart align-center between flex">
                <div class="pie3 pie">

                </div>
                <ul class="pie3 legend">
                    <li>
                        <em>Pass</em>
                        <span>2000</span>
                    </li>
                    <li>
                        <em>Reject</em>
                        <span>531</span>
                    </li>
                    <li>
                        <em>Allow</em>
                        <span>250</span>
                    </li>
                    <li>
                        <em>Mr</em>
                        <span>1000</span>
                    </li>

                </ul>
            </section>
        </div>
    </div>
    <div class="statistics-flex-base _bottom-charts">
        <div class="statistics-left">
            <div class="statistics-holder dash-card">
                <section class="section-chart align-center between flex">
                    <canvas id="ch1"></canvas>
                </section>
            </div>
            <div class="statistics-holder dash-card">
                <section class="section-chart between flex">
                    <canvas id="line-chart"></canvas>
                </section>
            </div>
            <div class="statistics-holder dash-card">
                <section class="section-chart between flex">
                    <div class="chartjs-wrapper">
                        <canvas id="acquisition" class="chartjs"></canvas>
                        <div id='customLegend' class='customLegend'></div>
                    </div>
                </section>
            </div>
        </div>
        <div class="statistics-right ">
            <div class="statistics-holder collapse dash-card">
                <section class="section-chart between collapse-btn flex">
                    <div class=" flex align-center">
                        <div class="img-holder">
                            <img class="statis-icon" width="75" height="auto"
                                 src="{{asset('assets/images/admin/icons/map.svg')}}" alt="map icon">
                        </div>
                        <p class="text-holder">Countries Statistics</p>
                    </div>
                </section>
                <div class="collapse-body">
                    <div class="top-side-body">
                        <img src="{{asset('assets/images/admin/icons/long-map.svg')}}" alt="long map">
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Country</th>
                            <th>Total Visits</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>United State</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                        </tr>

                        <tr>
                            <td>Russia</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                        </tr>

                        <tr>
                            <td>Canada</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                        </tr>

                        <tr>
                            <td>Maxico</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                        </tr>

                        <tr>
                            <td>Astralia</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="statistics-holder collapse dash-card">
                <section class="section-chart between collapse-btn flex">
                    <div class=" flex align-center">
                        <div class="img-holder">
                            <img class="statis-icon" width="auto" height="48"
                                 src="{{asset('assets/images/admin/icons/mark-icon.webp')}}" alt="mark icon">
                        </div>
                        <p class="text-holder">Most Popular Countries Application Submitted</p>
                    </div>
                </section>
                <div class="collapse-body">
                    <div>
                    <canvas id="application_submitted_1"/>

                    </div>
                    <div>
                        <canvas id="application_submitted_2"/>
                    </div>

                </div>
            </div>
            <div class="statistics-holder collapse dash-card">
                <section class="section-chart between collapse-btn flex">
                    <div class=" flex align-center">
                        <div class="img-holder">
                            <img class="statis-icon" width="auto" height="48"
                                 src="{{asset('assets/images/admin/icons/check.webp')}}" alt="mark icon">
                        </div>
                        <p class="text-holder">Recent Applicant Application</p>
                    </div>
                </section>
                <div class="collapse-body">
                    <table>
                        <thead>
                        <tr>
                            <th>Country</th>
                            <th>Total Visits</th>
                            <th>Time</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>United State</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                            <td><a href="#"><img src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt="edit icon"></a></td>
                        </tr>

                        <tr>
                            <td>Russia</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                            <td><a href="#"><img src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt="edit icon"></a></td>

                        </tr>

                        <tr>
                            <td>Canada</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                            <td><a href="#"><img src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt="edit icon"></a></td>

                        </tr>

                        <tr>
                            <td>Maxico</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                            <td><a href="#"><img src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt="edit icon"></a></td>

                        </tr>

                        <tr>
                            <td>Astralia</td>
                            <td>15,840</td>
                            <td>2.35s</td>
                            <td><a href="#"><img src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt="edit icon"></a></td>

                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="statistics-holder collapse dash-card">
                <section class="section-chart between collapse-btn flex">
                    <div class=" flex align-center">
                        <div class="img-holder">
                            <img class="statis-icon" width="auto" height="48"
                                 src="{{asset('assets/images/admin/icons/location.webp')}}" alt="mark icon">
                        </div>
                        <p class="text-holder">Most Popular Pathways</p>
                    </div>
                </section>
                <div class="collapse-body">
                    <canvas id="Most_Popular_Pathways"/>

                </div>

            </div>
            <div class="statistics-holder collapse dash-card">
                <section class="section-chart between collapse-btn flex">
                    <div class=" flex align-center">
                        <div class="img-holder">
                            <img class="statis-icon" width="auto" height="48"
                                 src="{{asset('assets/images/admin/icons/users.webp')}}" alt="mark icon">
                        </div>
                        <p class="text-holder">Online Users</p>
                    </div>
                </section>
                <div class="collapse-body">
                    <table>
                        <thead>
                        <trq>
                            <th>Country</th>
                            <th>Name</th>
                            <th>Status</th>
                        </trq>
                        </thead>
                        <tbody>
                        <tr>
                            <td><img src="{{asset('assets/images/admin/icons/usa-flag-icon.svg')}}" alt="usa flag"></td>
                            <td>Ata</td>
                            <td>Available</td>
                        </tr>  <tr>
                            <td><img src="{{asset('assets/images/admin/icons/usa-flag-icon.svg')}}" alt="usa flag"></td>
                            <td>Ata</td>
                            <td>Available</td>
                        </tr>  <tr>
                            <td><img src="{{asset('assets/images/admin/icons/usa-flag-icon.svg')}}" alt="usa flag"></td>
                            <td>Ata</td>
                            <td>Available</td>
                        </tr>  <tr>
                            <td><img src="{{asset('assets/images/admin/icons/usa-flag-icon.svg')}}" alt="usa flag"></td>
                            <td>Ata</td>
                            <td>Available</td>
                        </tr>  <tr>
                            <td><img src="{{asset('assets/images/admin/icons/usa-flag-icon.svg')}}" alt="usa flag"></td>
                            <td>Ata</td>
                            <td>Available</td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection