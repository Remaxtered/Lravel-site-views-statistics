<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Statistics</title>
</head>
<body>
    <div class="container my-5">
    <h3>Views by country</h3>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 15%">
                            Country
                        </th>
                        <th style="width: 15%">
                            Day
                        </th>
                        <th style="width: 15%">
                            Week
                        </th>
                        <th style="width: 15%">
                            Month
                        </th>
                        <th style="width: 15%">
                            Year
                        </th>
                        <th style="width: 15%">
                            All time
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>
                                {{ $country->country }}
                            </td>
                            <td>
                                {{ $data[0]['countries'][$country->country]['day'] }}
                            </td>
                            <td>
                                {{ $data[0]['countries'][$country->country]['week'] }}
                            </td>
                            <td>
                                {{ $data[0]['countries'][$country->country]['month'] }}
                            </td>
                            <td>
                                {{ $data[0]['countries'][$country->country]['year'] }}
                            </td>
                            <td>
                                {{ $data[0]['countries'][$country->country]['all_time'] }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                <br><br>
                <h3>Views by region</h3>

                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 15%">
                                    Region
                                </th>
                                <th style="width: 15%">
                                    Day
                                </th>
                                <th style="width: 15%">
                                    Week
                                </th>
                                <th style="width: 15%">
                                    Month
                                </th>
                                <th style="width: 15%">
                                    Year
                                </th>
                                <th style="width: 15%">
                                    All time
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($areas as $area)
                                <tr>
                                    <td>
                                        {{ $area->area }}
                                    </td>
                                    <td>
                                        {{ $data[1]['areas'][$area->area]['day'] }}
                                    </td>
                                    <td>
                                        {{ $data[1]['areas'][$area->area]['week'] }}
                                    </td>
                                    <td>
                                        {{ $data[1]['areas'][$area->area]['month'] }}
                                    </td>
                                    <td>
                                        {{ $data[1]['areas'][$area->area]['year'] }}
                                    </td>
                                    <td>
                                        {{ $data[1]['areas'][$area->area]['all_time'] }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <br><br>

        <h3>Views by city</h3>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 15%">
                            City
                        </th>
                        <th style="width: 15%">
                            Day
                        </th>
                        <th style="width: 15%">
                            Week
                        </th>
                        <th style="width: 15%">
                            Month
                        </th>
                        <th style="width: 15%">
                            Year
                        </th>
                        <th style="width: 15%">
                           All time
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>
                                {{ $city->city }}
                            </td>
                            <td>
                                {{ $data[2]['cities'][$city->city]['day'] }}
                            </td>
                            <td>
                                {{ $data[2]['cities'][$city->city]['week'] }}
                            </td>
                            <td>
                                {{ $data[2]['cities'][$city->city]['month'] }}
                            </td>
                            <td>
                                {{ $data[2]['cities'][$city->city]['year'] }}
                            </td>
                            <td>
                                {{ $data[2]['cities'][$city->city]['all_time'] }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>