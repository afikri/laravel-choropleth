<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
      body {
        background-color: #ffffff;
      }
    </style>
  </head>
  <body class="text-center">
    <main id="container" class="h-100"></main>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/datamaps/0.5.9/datamaps.all.js"></script>

    <script type="text/javascript">
    var series = @json(App\Models\State::all()->transform(function($state) { return ['abbreviation' => $state->abbreviation, 'donations' => $state->donation_count]; }));


    // Datamaps expect data in format:
    // { "USA": { "fillColor": "#42a844", numberOfWhatever: 75},
    //   "FRA": { "fillColor": "#8dc386", numberOfWhatever: 43 } }
    var dataset = {};

    // We need to colorize every country based on "numberOfWhatever"
    // colors should be unique for every value.
    // For this purpose we create palette(using min/max series-value)
    var onlyValues = series.map(function(obj) { return obj.donations; });
    var minValue = Math.min.apply(null, onlyValues),
           maxValue = Math.max.apply(null, onlyValues);

    // create color palette function
    // color can be whatever you wish
    var paletteScale = d3.scale.linear()
           .domain([minValue,maxValue])
           .range(["#EFEFFF","#990000"]); // ursinus colors

    // fill dataset in appropriate format
    series.forEach(function(item){
       // var value = item.donations;
       // dataset[item.abbreviation] = { numberOfThings: value, fillColor: paletteScale(value) };

        var fill = item.donations > 0 ? 'donations' : 'default';
        dataset[item.abbreviation] = { numberOfThings: item.donations, fillKey: fill };
    });

    // render map
    new Datamap({
       element: document.getElementById('container'),
       scope: 'usa',
       // states not listed in dataset will be painted with this color
       fills: { default: '#F5F5F5', donations: "#990000" },
       data: dataset,
       geographyConfig: {
           borderColor: '#FEB334',
           highlightBorderWidth: 2,
           // don't change color on mouse hover
           highlightFillColor: function(geo) {
               return geo['fillColor'] || geo['fillKey'] || '#F5F5F5';
           },
           // only change border
           highlightBorderColor: '#B7B7B7',
           // show desired information in tooltip
           // popupTemplate: function(geo, data) {
           //     // don't show tooltip if state doesn't exist in dataset
           //     if (!data) { return ; }
           //     // tooltip content
           //     return ['<div class="hoverinfo">',
           //         '<strong>', geo.properties.name, '</strong>',
           //         '<br>Donations: <strong>', data.numberOfThings, '</strong>',
           //         '</div>'].join('');
           // }
       }
    });
    </script>
  </body>
</html>
