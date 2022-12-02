<style>
    h1 {
        padding: 0;
        margin: 0;
        color: #1a2e83;
    }

    header {
        background-color: #2B4FEB;
    }

    body {
        color: white;
        font-family: 'nunito', sans-serif;
    }

    table, th, td {
        border: 1px solid;
    }

    table {
        border-collapse: collapse;
    }

    h3 {
        padding-bottom: 0;
        margin-bottom: 0;
    }

    #tips {
        width: 100%;
        color: black;
        border: 1px solid unset;

    }

    td, th {
        border: 1px solid rgba(255, 0, 0, 0);
        text-align: left;
        padding: 8px;
    }

    .logo {
        height: 40px;
        max-height: 40px;
        padding: 25px 20px;
    }

    .underTitle {
        font-style: italic;
        font-size: 0.75em;
        padding: 0;
        margin: 0;
    }

    .challenge-container {
        margin-bottom: 20px;
    }

    footer {
        background-color: #1a2e83;
        padding: 30px 10px 30px 30px;
    }

    footer a {
        color: white;
        margin: 0 25px 15px 0;
        border-bottom: 0.15rem solid #1fc396;
        text-decoration: none;
        font-weight: bold;
    }

    input {
        font-size: 2em !important;
    }


    h4 {
        margin: 0 0 15px 0;
        color: #1fc396;
        font-family: 'nunito', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    }

</style>

<!DOCTYPE html>
<html>
<head>
    <title>Accessibility</title>
</head>
<body>
<header>
    <img src="https://www.accessibility.nl/themes/sa/images/logo-social.png" class="logo" alt="Accessibility Logo">
</header>
<div style="padding:25px; background-color:white; color:black;">
    <h1>Rapport -
        <time>{{ \Illuminate\Support\Carbon::now()->isoFormat('D/M/YY')  }}</time>
    </h1>
    <hr>

    <x-rapport-table :challenges="$challenges->whereIn('score', [1,2])->all()" message="Dit vereist nog veel aandacht:"
                     color="red"/>
    <x-rapport-table :challenges="$challenges->whereIn('score', [3])->all()" message="Kijk nog even goed naar:"
                     color="orange"/>
    <x-rapport-table :challenges="$challenges->whereIn('score', [4,5])->all()" message="Goed bezig!" color="green"/>

    <hr>

    @foreach($challenges as $challenge)
        <div class="challenge-container">
            <h3>Opdracht {{$challenge->challenge->id}} - {{$challenge->challenge->name}} ({{$challenge->score}}/5)</h3>
            <span class="underTitle">Voltooid op <time>{{$challenge->completed_at->isoFormat('D/M/YY')}}</time></span><br><br>

            <strong>Tips:</strong> <br>
            <table id="tips">
                @foreach($challenge->challenge->tips as $tip)

                    <tr>
                        <td><input type="checkbox" style="margin:0; padding:0;"/></td>
                        <td style="width:100%;"> {!! Str::markdown($tip->content) !!} </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endforeach

</div>

<footer>
    <h4>Nog meer tips en tricks:</h4>
    <a href="https://www.accessibility.nl/">Accessibility</a>
    <a href="https://www.accessibility.nl/#contact">Maak een afspraak</a>
</footer>
</body>
</html>

