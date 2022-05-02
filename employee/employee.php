<?php 
session_start();

if(!isset($_SESSION['session_data']['0']) || $_SESSION['session_data']['5'] != 'Pracownik')
{
    header("Location: ../index.php");
    exit();
}

  

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel pracownika</title>
    <meta name="description" content="Panel pracownika" />
    <meta name="keywords" content="Panel, pracownika" />
    <link rel="stylesheet" href="fontello-2881fecc/css/tw.css">
    <link rel="stylesheet" href="../status.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="daterangepicker-master/daterangepicker.css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script type="text/javascript" src="daterangepicker-master/daterangepicker.js"></script>
</head>

<body>
    <main class="main">
        <div id="container">
            <div id="nav">
                <div id="logo"><img src="img/logo.png" alt="logo"></div>
                <div id="welcome">Witaj ${firstName}</div>
                <form action="../logout.php" method="post">
                <a href="../index.php"><button class="btn1">Wyloguj</button></a>
                </form>
            </div>
        </div>
        <div id="box">
            <div class="info">Panel Pracownika</div>
            <div id="dashboard">
                <div class="panelBox" ><i class="icon-user"></i>
                <span id="panel-name">${firstName} ${lastName}</span>
                </div>
                <div class="panelBox"><i class="icon-user"></i>
                <span id="panel-position">${position}</span>
                </div>
                <div class="panelBox"><i class="icon-bat2"></i>
                <span id="vacation-left">${vacationDaysLeft}</span>
                </div>
                <div class="panelBox"><i class="icon-help"></i>
                <span id="vacation-used">${vacationsTotal}</span>
                </div>
            </div>
        </div>
        <div id="box">
            <div class="info">Moje wnioski: </div>
            <div>
                <div id="application">                  
                        <div class="hist">Historia wniosków:</div>
                        <div><button id="modal-btn" class="btn2">Złóż nowy wniosek</button></div>
                    </div>
                    <div id="tab">
                        <table id="reftable">
                            <thead>
                            <tr>
                                <th>ID wniosku</th>
                                <th>Typ urlopu</th>
                                <th>Okres</th> 
                                <th>Zastępuje</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody id="datas">

                            </tbody>
                        </table>
                    </div>
                </div> 
            </div> 
            <!-- dodany -->
        </div>
        <!-- <div id="box">         
                <div class="info">Wnioski pracownika: </div>
                <div>
                    <div id="application">                  
                        <div>Historia wniosków:</div>
                        <button id="modal-btn2" class="btn2"><img src="img/to-do-list.png" alt="list">Lista obecności</button>
                    </div>
                    <div id="tab">
                        <table>
                            <tr><th>Typ urlopu</th> <th>Okres</th>  <th>Zastępuje</th>  <th>Status</th><th>Szczegóły</th></tr>
                            <tr><td>${vacationType}	</td> <td>${vacationPeriod}	</td>  <td>${substitiute}	</td>  <td>${status}</td><td><a href="#">otwórz</a></td></tr>
                            <tr><td>${vacationType}	</td> <td>${vacationPeriod}	</td>  <td>${substitiute}	</td>  <td>${status}</td><td><a href="#">otwórz</a></td></tr>
                        </table>
                    </div>
                </div>                      
            </div> -->
        <!--okno-->
        <div class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1>Nowy wniosek urlopowy</h1>
                        </div>
                        <!-- FORM-->
                        <form class="request-form" action="../holiday-request-worker.php" method="post">
                        <div class="inputs">
                            <label>Typ urlopu:</label>
                            <select name="vacation" id="vacation">
                                <option value="zwykly">Zwykły</option>
                                <option value="zadanie">Na żądanie</option>
                                <option value="l4">L4</option>
                                <option value="bezplatny">Bezpłatny</option>
                                <option value="inny">Inny</option>
                            </select>
                            <label for="">Wybierz datę:</label><input type="text" id="daterangepicker" name="date-picker" class="form-control">
                            <label>Zastępstwo:</label>
                            <select name="deputy" id="deputy">
                              
                            </select>
                            <label for="">Ewentualny komentarz:</label><textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                        <input type="button" id="submit-request" class="submit-btn1" value="Wyślij wniosek"></input>
                            <div class="alert hidden" id="alert">
					            <label id="error">....</label>
				            </div>
                        </div>
                        </form>
                        <button  id="close" class="close-btn">Zamknij</button>
                    </div>
        <div class="modal2">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Lista osob pracujacych</h1>
                </div>
                <ol>
                    <li>Janusz</li>
                    <li>Janusz</li>
                    <li>Janusz</li>
                    <li>Janusz</li>
                    <li>Janusz</li>
                </ol>
                <div class="modal-footer">
                    <button id="close1" class="close-btn">Zamknij</button>
                </div>
            </div>
        </div>
        </div>
        <footer class="footer">
            <div class="containerFooter">
                <p>Aplikacja Urlopowa</p>
                <div class="person">
                    <p>Mateusz Hanak</p>
                    <img id="#" src="img/linkedin.png" alt="linkedin">
                    <img id="#" src="img/github.png" alt="github">
                </div>
                <div class="person">
                    <p>Robert Śliwiński</p>
                    <img id="#" src="img/linkedin.png" alt="linkedin">
                    <img id="#" src="img/github.png" alt="github">
                </div>
                <div class="person">
                    <p>Łukasz Juchniewicz</p>
                    <img id="#" src="img/linkedin.png" alt="linkedin">
                    <img id="#" src="img/github.png" alt="github">
                </div>
            </div>
        </footer>
        <a id="button"></a>
    </main>
    <script src="scrolUp.js"></script>
    <script src="window.js"></script>

    <?php

        $id = $_SESSION['session_data']['0'];
        $worker_depart = $_SESSION['session_data']['6'];
      

        $connection = mysqli_connect('localhost','root','','application');

        $sel_vac_history = mysqli_query($connection, "SELECT application_id,type,start_date,end_date,replacement,status FROM `vacation_log` WHERE id='$id' ORDER BY application_id DESC") or exit(mysqli_error($connection));

        $vac_history = mysqli_fetch_all($sel_vac_history, MYSQLI_ASSOC);

        $sel_collegues = mysqli_query($connection, "SELECT first_name FROM `vacation_data` WHERE departament like '$worker_depart' AND NOT id like $id") or exit(mysqli_error($connection));

        $name_collegues  = mysqli_fetch_all($sel_collegues, MYSQLI_NUM);

        $collegues_join = array_merge(...$name_collegues); 

        //workers identity selector 

        $sel_vac_workers = mysqli_query($connection, "SELECT id FROM `vacation_data` WHERE departament like '$worker_depart' AND NOT id like '$id'") or exit(mysqli_error($connection));

        $vac_workers = mysqli_fetch_all($sel_vac_workers,  MYSQLI_NUM);

        $workers_join = array_merge(...$vac_workers); 

        $arr = implode(",", $workers_join);
    
    ?>

    <script type="text/javascript">
        var workerData = <?php echo json_encode($_SESSION['session_data']);?>;
        var table = <?php echo json_encode($vac_history);?>;
        var collegues = <?php echo json_encode($collegues_join);?>;
    </script>
      <script type="text/javascript" src="../jquery.js"></script>
      <script type="text/javascript" src="holidayrq.js"></script>
      <script type="text/javascript" src="employee.js"></script>
     

</body>

</html>