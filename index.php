<?php
    session_start();
    require_once "config.php";
    require_once "app/models/Simulator.php";
    require_once "app/controllers/ControllerSimulator.php";
    
    try{
        if($pdo){
            $sql = new ControllerSimulator($pdo);
            $data = $sql -> findAllPlan();
        }
    }catch(PDOException $e){
        echo "Connection failed: ".$e -> getMessage();
    }
    
?>

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

            <?php if(isset($_SESSION['error'])): ?>
                <div class="warning">
                    <div>
                        <?php
                            echo $_SESSION['error']
                        ?>  
                    </div>

                    <div>
                        <img src="/public/img/exit.png" alt="close" width="20px" id="close">
                    </div>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="header-content">
                    CALL SIMULATOR
                </div>

                <div class="main-content">
                    <form action="app/actions/simulatorAction.php" method="POST" class="validate">
                        <select name="origin" class="select" >
                            <option disabled selected>Origin</option>
                            <option value="11">011</option>
                            <option value="16">016</option>
                            <option value="17">017</option>
                            <option value="18">018</option>
                        </select>

                        <select name="destiny" class="select">
                            <option disabled selected>Destiny</option>
                            <option value="11">011</option>
                            <option value="16">016</option>
                            <option value="17">017</option>
                            <option value="18">018</option>
                        </select>

                        <div>
                            <input type="number" name="minutes" placeholder="Time(minutes)" class="select" min="0" id="time" data-rules="required/min=1">
                        </div>

                        <select name="plan" class="select" >
                            <option disabled selected>Plan</option>
                            <?php foreach($data as $item): ?>
                                <option value="<?php echo $item -> getPlanValue() ?>"><?php echo $item -> getPlan() ?></option>
                            <?php endforeach; ?>
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
                <br><br>
                <?php
                    if(isset($_SESSION['with'])){
                        echo "R$ ".$_SESSION['with'];
                    }else {
                        echo "R$ --/--";
                    }
                ?>
            </div>

            <div class="plan">
                Without speak more
                <br><br>
                <?php
                    if(isset($_SESSION['without'])){
                        echo "R$ ".$_SESSION['without'];
                    }else {
                        echo "R$ --/--";
                    }
                ?>
            </div>
        </div>
    </footer>

    <?php
        session_destroy();
    ?>

    <script type="text/javascript" src="public/javascript/app.js"></script>
</body>
</html>