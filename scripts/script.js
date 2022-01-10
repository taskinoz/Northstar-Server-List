$(document).ready(function() {

  var url = new URL(window.location.href);

  var parameters = ["search", "map", "gamemode"];
  var search = {};

  for (let i = 0; i < parameters.length; i++) {
      if (url.searchParams.get(parameters[i]) != null)
          search[parameters[i]] = url.searchParams.get(parameters[i]);
      else
          search[parameters[i]] = "";

  }

  $("#search").val(search.search)
  $('#mapselect option[value="' + search.map + '"]').attr('selected', 'selected'); console.log("Search: " + search.map);
  $('#gamemodeselect option[value="' + search.gamemode + '"]').attr('selected', 'selected'); console.log("Search: " + search.gamemode);

  function checkInSearch(search, match) {
      if (search != "" && match.includes(search))
          return true;
      else if (search == "")
          return true
      else
          return false
  }

  function getMapName( name ) {
    var maps = {
      "mp_angel_city" : "Angel City",
      "mp_black_water_canal" : "Black Water Canal",
      "mp_grave" : "Boomtown",
      "mp_colony02" : "Colony",
      "mp_complex3" : "Complex",
      "mp_crashsite3" : "Crashsite",
      "mp_drydock" : "DryDock",
      "mp_eden" : "Eden",
      "mp_thaw" : "Exoplanet",
      "mp_forwardbase_kodai" : "Forward Base Kodai",
      "mp_glitch" : "Glitch",
      "mp_homestead" : "Homestead",
      "mp_relic02" : "Relic",
      "mp_rise" : "Rise",
      "mp_wargames" : "Wargames",
      "mp_lobby" : "Lobby",
      "mp_lf_deck" : "Deck",
      "mp_lf_meadow" : "Meadow",
      "mp_lf_stacks" : "Stacks",
      "mp_lf_township" : "Township",
      "mp_lf_traffic" : "Traffic",
      "mp_lf_uma" : "UMA",
      "mp_coliseum" : "The Coliseum",
      "mp_coliseum_column" : "Pillars",
    }
    return maps[name]
  }

  var allPlayers = 0;

  $.getJSON('getdata.php', (data) => {
    if (data.length>0){
      $('#servers').append(
        data.map(function(x){
          if ((checkInSearch(search.search, x['name']) &&
               checkInSearch(search.map, x['map']) &&
               checkInSearch(search.gamemode, x['playlist'])) ||
               search.category == "" && search.location == "" && search.type == ""
          ){
            allPlayers+=x['playerCount'];
            return '<div class="col-12 col-md-6 col-lg-4 server-card">\n'+
            '<div class="background" style="background-image:url(maps/'+x['map']+'.png)">\n'+
            '<div class="info">\n'+
            '<h2>'+x['name']+'</h2>\n'+
            '<p>'+x['description']+'</p>\n'+
            '<p>'+'Players: '+x['playerCount']+'/'+x['maxPlayers']+'</p>\n'+
            '<p>'+getMapName(x['map'])+'</p>\n'+
            '<p>'+'Playlist: '+x['playlist']+'</p>\n'+
            '<\/div>\n'+
            '<\/div>\n'+
            '<\/div>'
          }
        })
      )
      var ServersAvailable = $('#servers .server-card').length
      $('title').text('('+ServersAvailable+') Northstar '+(ServersAvailable>1 || ServersAvailable<1 ?"Servers":"Server"))
      $('#available').append('<div class="col-12"><h2>Servers Available: '+ServersAvailable+'</h2></div>')
      $('#available-players').append('<div class="col-12"><h2>Players: '+allPlayers+'</h2></div>')
    }
    else {
      $('#servers').append('<div class="col-12 noservers">No Servers Found</div>')
    }
    $('.spinner').remove();
  });
})
