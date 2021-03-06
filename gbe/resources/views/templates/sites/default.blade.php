<!doctype html>
<!--
--
--  This file is part of the Government Budget Explorer (GBE).
--
--  The GBE is free software: you can redistribute it and/or modify
--  it under the terms of the GNU General Public License as published by
--  the Free Software Foundation, either version 3 of the License, or
--  (at your option) any later version.`
--
--  The GBE is distributed in the hope that it will be useful,
--  but WITHOUT ANY WARRANTY; without even the implied warranty of
--  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
--  GNU General Public License for more details.
--
--  You should have received a copy of the GNU General Public License
--  along with the GBE.  If not, see <http://www.gnu.org/licenses/>.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Government Budget Explorer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/css/all.css">

        @yield('head')
    </head>

    <?php
    use DemocracyApps\GB\Helpers as Helpers;
    ?>

    <body>
        @include('templates.datarider')
        <div class="cnp-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 hdr-right">
                        <ul class="nav nav-pills" style="float:right;">
                            <li role="presentation"><a href="/">Home</a></li>
                            @foreach ($pages as $page)
                                <li role="presentation"><a href="/sites/{!! $site->slug !!}/{!! $page->short_name !!}">{!! $page->short_name !!}</a></li>
                            @endforeach
                            @if (Auth::guest())
                                <li role="presentation" ><a href="/auth/login">Log In</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container app-container">
            @yield('content')
        </div>
        <script src="/js/all.js"></script>

        @yield('scripts')
        </body>

</html>
