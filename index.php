<?php
  $allowJoin = "false";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Northstar Servers</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript">
    var allowJoinButton = <?php echo $allowJoin; ?>;
  </script>
  <script src="scripts/script.js" charset="utf-8"></script>
  <style media="screen">
    h1{
      text-align: center;
      padding: 20px 0;
    }
    h2 {
      word-break: break-all;
    }
    #available h2,
    #available-players h2 {
      color: #333;
    }
    body {
      background: url(images/background.jpg);
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
    }
    .container {
      background: #fff;
      min-height: 100vh;
      box-shadow: 2px 2px 10px 4px rgba(0,0,0,0.3);
    }
    #servers:empty {
      content: "No servers found";
      text-align: center;
      text-transform: capitalize;
    }
    #servers .server-card {
      padding: 0;
    }
    #servers .background {
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      margin: 20px;
      border-radius: 20px;
    }
    #servers .info{
      background: rgba(0,0,0,0.4);
      padding: 20px;
      color: #fff;
      border-radius: 20px;
    }
    .spinner {
      text-align: center;
      width: 100%;
    }
    .spinner img {
      display: inline-block;
      height: 20px;
    }
    .noservers {
      text-align: center;
      font-size: 30px;
      height: 80vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .btn-northstar {
      border-radius: 10px;
      background: rgba(33, 43, 78, 0.9);
      border-color: rgba(33, 43, 78, 0.9);
    }
    .server-card .btn-northstar {
      width: 100%;
    }
  	@media screen and (max-width:545px) {
  	  .noservers {
    		height: 60vh;
  	  }
      /* simple show none on mobile */
      a.btn-northstar {
        display: none;
      }
  	}
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Northstar Servers</h1>
        <?php
          ob_start();
          include("getdata.php");
          ob_end_clean();

          if ( !(strpos($url, 'northstar.tf') !== false)) {
           echo "<p>Masterserver is down<br>Backup: ".$url."</p>";
          }
        ?>
      </div>
    </div>
    <form>
      <div class="row">
        <div class="col-12 col-lg-4">
          <div class="form-group">
            <input type="text" class="form-control" name="search" id="search" placeholder="Select">
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="form-group">
            <select id="mapselect" class="form-control" name="map">
              <option selected value="">All</option>
              <option value="mp_angel_city">Angel City</option>
              <option value="mp_black_water_canal">Black Water Canal</option>
              <option value="mp_grave">Boomtown</option>
              <option value="mp_colony02">Colony</option>
              <option value="mp_complex3">Complex</option>
              <option value="mp_crashsite3">Crashsite</option>
              <option value="mp_drydock">DryDock</option>
              <option value="mp_eden">Eden</option>
              <option value="mp_thaw">Exoplanet</option>
              <option value="mp_forwardbase_kodai">Forward Base Kodai</option>
              <option value="mp_glitch">Glitch</option>
              <option value="mp_homestead">Homestead</option>
              <option value="mp_relic02">Relic</option>
              <option value="mp_rise">Rise</option>
              <option value="mp_wargames">Wargames</option>
              <option value="mp_lobby">Lobby</option>
              <option value="mp_lf_deck">Deck</option>
              <option value="mp_lf_meadow">Meadow</option>
              <option value="mp_lf_stacks">Stacks</option>
              <option value="mp_lf_township">Township</option>
              <option value="mp_lf_traffic">Traffic</option>
              <option value="mp_lf_uma">UMA</option>
              <option value="mp_coliseum">The Coliseum</option>
              <option value="mp_coliseum_column">Pillars</option>
            </select>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="form-group">
            <select id="gamemodeselect" class="form-control" name="gamemode">
              <option selected value="">All</option>
              <!-- NORMAL GAMEMODES -->
              <option value="private_match">Lobby</option>
              <option value="aitdm">Attrition</option>
              <option value="tdm">Skirmish</option>
              <option value="cp">Amped Hardpoint</option>
              <option value="at">Bounty Hunt</option>
              <option value="ctf">Capture the Flag</option>
              <option value="lts">Last Titan Standing</option>
              <option value="ps">Pilots vs. Pilots</option>
              <option value="speedball">Live Fire</option>
              <option value="mfd">Marked For Death</option>
              <option value="ttdm">Titan Brawl</option>
              <option value="fd_easy">Frontier Defense (Easy)</option>
              <option value="fd_normal">Frontier Defense (Normal)</option>
              <option value="fd_hard">Frontier Defense (Hard)</option>
              <option value="fd_master">Frontier Defense (Master)</option>
              <option value="fd_insane">Frontier Defense (Insane)</option>
              <!-- CUSTOM GAMEMODES -->
              <option value="sbox">Sandbox</option>
              <option value="gg">Gun Game</option>
              <option value="tt">Titan Tag</option>
              <option value="chamber">One in the Chamber</option>
              <option value="hidden">The Hidden</option>
              <option value="inf">Infection</option>
              <option value="hs">Hide and Seek</option>
              <option value="fw">Frontier War</option>
              <option value="kr">Amped Killrace</option>
              <option value="fastball">Fastball</option>
            </select>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2">
          <div class="form-group">
            <div class="">
              <button type="submit" class="btn btn-primary btn-northstar">Search</button>
              <a href="./" class="btn btn-primary btn-northstar">Clear</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div id="available" class="row"></div>
    <div id="available-players" class="row"></div>
    <div id="servers" class="row">
      <div class="spinner"><img src="images/spinner.gif" alt="Loading"></div>
    </div>
  </div>
</body>
</html>
