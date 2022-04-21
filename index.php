<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/style/app.css" rel="stylesheet">
    <title>Simulator</title>
</head>
<body>
    
    <div class="container">

        <div class="main-container">

            <div class="warning">
                CALL SIMULATOR
            </div>

            <div class="content">
                <div class="header-content">
                    CALL SIMULATOR
                </div>

                <div class="main-content">
                    <form action="app/controllers" method="POST" class="validate">
                        <select name="" class="select" required>
                            <option disabled selected>Origin</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>

                        <select name="" class="select" required>
                            <option disabled selected>Destiny</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>

                        <div>
                            <input type="number" placeholder="Time(minutes)" class="select" min="0" id="time" data-rules="required/min=1">
                        </div>

                        <select name="" class="select" required>
                            <option disabled selected>Plan</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>

                        <div style="display: flex; justify-content: center;">
                            <button type="submit" class="submit">Simulate</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <footer class="result">
        <div style="text-align: center; font-size: 19px; font-weight: bold;">
            Result
            <hr>
        </div>

        <div class="show-result">
            <div class="plan">
                With speak more
                <br>
                00:00
            </div>

            <div class="plan">
                Without speak more
                <br>
                00:00
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="public/javascript/app.js"></script>
</body>
</html>