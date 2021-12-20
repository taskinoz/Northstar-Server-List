$(document).ready(function() {

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

  $.getJSON('getdata.php', (data) => {
    if (data.length>0){
     data.map(x => console.log(x['name']));
     $('#servers').append(
       data.map(function(x){
         return '<div class="cold-12 col-4-md server-card" style="background-image:url(maps/'+x['map']+'.png)">\n'+
         '<div class="info">\n'+
         '<h2>'+x['name']+'</h2>\n'+
         '<p>'+x['description']+'</p>\n'+
         '<p>'+'PLayers: '+x['playerCount']+'/'+x['maxPlayers']+'</p>\n'+
         '<p>'+getMapName(x['map'])+'</p>\n'+
         '<p>'+'Playlist: '+x['playlist']+'</p>\n'+
         '<\/div>\n'+
         '<\/div>'
       })
     )
   }
   else {
     $('#servers').append('<div class="col-12 noservers">No Servers Found</div>')
   }
   $('.spinner').remove();
 });
})
