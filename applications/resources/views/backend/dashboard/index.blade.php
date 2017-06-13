@extends('backend.layouts.app')

@section('title')
<title>Dashboard</title>
@endsection

@section('head.script')
  <script src="{{ asset('backend/js/Chart.js/dist/Chart.min.js')}}"></script>
  <link href="{{ asset('backend/js/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')

<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" class="current"><i class="icon-home"></i> Dashboard</a>
  </div>
</div>

@endsection


@section('dashboard')

  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb span3"> <a href="{{ route('member.index') }}"> <i class="icon-group"></i> <span class="label label-success ">{{ $getMember->count() }}</span> Member </a> </li>
      <li class="bg_lr span2"> <a href="{{ route('kelasKursus.index') }}"> <i class="icon-magnet"></i> <span class="label label-success ">{{ $getClassCourse->count() }}</span> Class Course</a> </li>
      <li class="bg_ly span3"> <a href="{{ route('news.index') }}"> <i class="icon-th-list"></i> <span class="label label-success">{{ $getNews->count() }}</span> News </a> </li>
      <li class="bg_lg span2"> <a href="{{ route('event.index') }}"> <i class="icon-calendar"></i> <span class="label label-success">{{ $getEvent->count() }}</span> Event</a> </li>
    </ul>
  </div>

  <br>
  <h1>Facebook Page</h1>
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Chart Page Impression</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartPageImpression"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingImpressionPrev" onclick="pagingImpression(this)">Prev</a>
            </label>
            <label>
              <a id="pagingImpressionNext" onclick="pagingImpression(this)">Next</a>
            </label>
          </div>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Chart Page Impression Organic</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartPageImpressionOrganic"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingImpressionOrganicPrev" onclick="pagingImpressionOrganic(this)">Prev</a>
            </label>
            <label>
              <a id="pagingImpressionOrganicNext" onclick="pagingImpressionOrganic(this)">Next</a>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Chart Page View</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartPageView"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingPageViewPrev" onclick="pagingPageView(this)">Prev</a>
            </label>
            <label>
              <a id="pagingPageViewNext" onclick="pagingPageView(this)">Next</a>
            </label>
          </div>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Chart Engaged User</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartEngagedUser"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingEngagedUserPrev" onclick="pagingEngagedUser(this)">Prev</a>
            </label>
            <label>
              <a id="pagingEngagedUserNext" onclick="pagingEngagedUser(this)">Next</a>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <h1>Google Analytics</h1>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Bounce Rate</h5>
        </div>
        <div class="widget-content ">
          <div id="wrapper-bounceRate"></div>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Avg. Session Duration</h5>
        </div>
        <div class="widget-content ">
          <div id="wrapper-avgSessionDuration"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Periode</h5>
        </div>
        <div class="widget-content ">
          <button type="button" class="btn btn-default pull-right" id="periode_GA">
            <span>
              <i class="fa fa-calendar"></i> Select Date Range
            </span>
            <i class="fa fa-caret-down"></i>
          </button>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Most Visited Pages</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartMostVisitedPages"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Visitor Website</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartVisitorWebsite"></canvas>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>User Visited</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartUserVisited"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>City Visited</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartCityVisited"></canvas>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>Top Browsers</h5>
        </div>
        <div class="widget-content ">
          <canvas id="chartTopBrowsers"></canvas>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('content')
@include('backend.dashboard.include-js')
<script src="{{ asset('backend/js/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript">
  $('#periode_GA').daterangepicker(
  {
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate: moment()
  },
  function (start, end) {

    $('#periode_GA span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var urlPeriod =  "{{ route('analytics.getGA') }}/" + start.format('MMMM D, YYYY') + "/" + end.format('MMMM D, YYYY');

    $.getJSON(urlPeriod, function (json) {

        // for MostVisitedPages
        var captionVarMVP = new Array();
        json.MostVisitedPages.map(function(item) {
          captionVarMVP.push(item.pageTitle + ' : ' + item.url);
        });

        var captionValMVP = new Array();
        json.MostVisitedPages.map(function(item) {
          captionValMVP.push(item.pageViews);
        });

        $('#chartMostVisitedPages').replaceWith('<canvas id="chartMostVisitedPages"></canvas>');

        var cMVP = document.getElementById("chartMostVisitedPages");
        var barChartMostVisitedPages = new Chart(cMVP, {
            type: 'horizontalBar',
            data: {
              labels: captionVarMVP,
              datasets: [
                  {
                    label: "Visited Pages",
                    data: eval(captionValMVP),
                    backgroundColor : "rgba(255,0,0,.5)"
                  }
                ]
            }
        });
        // end for MostVisitedPages

        // for TopBrowsers
        var captionVarTB = new Array();
        json.TopBrowsers.map(function(item) {
          captionVarTB.push(item.browser);
        });

        var captionValTB = new Array();
        json.TopBrowsers.map(function(item) {
          captionValTB.push(item.sessions);
        });

        $('#chartTopBrowsers').replaceWith('<canvas id="chartTopBrowsers"></canvas>');

        var cTB = document.getElementById("chartTopBrowsers");
        var barChartTopBrowsers = new Chart(cTB, {
            type: 'horizontalBar',
            data: {
              labels: captionVarTB,
              datasets: [
                  {
                    label: "Top Browsers",
                    data: eval(captionValTB),
                    backgroundColor : "rgba(255,0,0,.5)"
                  }
                ]
            }
        });
        // end for MostVisitedPages

        // for CityVisited
        var captionVarCV = new Array();
        var captionValCV = new Array();
        var intConfert = 1;
        $.each(json.CityVisited, function () {
          $.each(this, function (name, value) {
            if (intConfert%2 != 0) {
              captionVarCV.push(value);
            }
            if (intConfert%2 == 0) {
              if (value > 40) {
                captionValCV.push(value);
              }
              else if(value < 40){
                captionVarCV.splice(-1,1);
              }
            }
            intConfert = intConfert + 1;
          });
        });

        $('#chartCityVisited').replaceWith('<canvas id="chartCityVisited"></canvas>');

        var cCV = document.getElementById("chartCityVisited");
        var barChartCityVisited = new Chart(cCV, {
            type: 'bar',
            data: {
              labels: captionVarCV,
              datasets: [
                  {
                    label: "City Visited",
                    data: eval(captionValCV),
                    backgroundColor : "rgba(255,0,0,.5)"
                  }
                ]
            }
        });
        // end for CityVisited

        // for userVisited
        var captionVarUV = new Array();
        var captionValUVF = new Array();
        var captionValUVM = new Array();
        var safeGender = "";
        var intConfert = 1;
        $.each(json.userVisited, function () {
          $.each(this, function (name, value) {
            if (intConfert%2 == 0) {
              if ( $.inArray( value, captionVarUV ) > -1 ){
                // this value alredy in array
              }
              else{
                captionVarUV.push(value);
              }
            }
            if (intConfert%3 == 0) {
              if (safeGender == "female") {
                captionValUVF.push(value);
              }
              if (safeGender == "male") {
                captionValUVM.push(value);
              }
            }
            if (intConfert%2 != 0) {
              safeGender = value;
            }
            intConfert = intConfert + 1;
          });
          intConfert = 1;
        });

        $('#chartUserVisited').replaceWith('<canvas id="chartUserVisited"></canvas>');

        var cUV = document.getElementById("chartUserVisited");
        var barChartUserVisited = new Chart(cUV, {
            type: 'bar',
            data: {
              labels: captionVarUV,
              datasets: [
                  {
                    label: "Female",
                    data: eval(captionValUVF),
                    backgroundColor : "rgba(255,0,0,.5)"
                  },
                  {
                    label: "Male",
                    data: eval(captionValUVM),
                    backgroundColor : "rgba(0,0,255,.5)"
                  }
                ]
            }
        });
        // end for userVisited

        // for VisitorWebsite
        var captionVarVW = new Array();
        var captionValVW = new Array();
        var intConfert = 1;
        $.each(json.VisitorWebsite, function () {
          $.each(this, function (name, value) {
            if (intConfert%2 != 0) {
              captionVarVW.push(parse(value));
            }
            if (intConfert%2 == 0) {
              captionValVW.push(value);
            }
            intConfert = intConfert + 1;
          });
        });

        $('#chartVisitorWebsite').replaceWith('<canvas id="chartVisitorWebsite"></canvas>');

        var cVW = document.getElementById("chartVisitorWebsite");
        var lineChartVisitorWebsite = new Chart(cVW, {
            type: 'line',
            data: {
              labels: captionVarVW,
              datasets: [
                  {
                    label: "Visitor Website",
                    data: eval(captionValVW),
                    backgroundColor : "rgba(255,0,0,.5)"
                  }
                ]
            }
        });
        // end for VisitorWebsite

        var echoBounceRate = "";
        var echoAvgSessionDuration = "";
        $.each(json.bounceRate, function () {
          $.each(this, function (name, value) {
            echoBounceRate = Math.ceil(value) + '%';
          });
        });
            $("#wrapper-bounceRate").text(echoBounceRate);

        $.each(json.avgSessionDuration, function () {
          $.each(this, function (name, value) {
            echoAvgSessionDuration = value.toHHMMSS();
          });
        });
            $("#wrapper-avgSessionDuration").text(echoAvgSessionDuration);

    });
  });
  </script>
@endsection
