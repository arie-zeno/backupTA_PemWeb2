
@extends("layouts.main")
<style>

    span{
        color: #eca457;
    }
    nav{
        transition: 0.2s;
    }

    .container-home{
      background-image: url('/img/SAM_2141.JPG');
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }

    .welcome{
      /* background-color: rgba(0, 0, 0, 0.329); */
      padding: 20px;
    }

    body{
      background-image: url('/img/playstation-pattern.webp');
    }

    #map {
      height: 83vh; 
    }
    .label-kecamatan{
        color: black;
        text-align: center;
        font-weight: bold;
    }
</style>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""/>

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    {{-- Plugin Path --}}
    {{-- <link rel="stylesheet" href="/css/leaflet-measure-path.css">
    <script src="/js/leaflet-measure-path.js"></script> --}}
    {{-- <script src="https://elfalem.github.io/Leaflet.curve/src/leaflet.curve.js"></script> --}}

    {{-- polyline --}}
    {{-- <link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
    <script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script> --}}

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- routing machine --}}
    <link rel="stylesheet" href="/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    {{-- Slide --}}
    <link rel="stylesheet" href="/css/L.Control.SlideMenu.css">
    <script src="/js/L.Control.SlideMenu.js"></script>

    {{-- cluster --}}
    <link rel="stylesheet" href="js/Leaflet.markercluster/dist/MarkerCluster.css" />
	<link rel="stylesheet" href="/js/Leaflet.markercluster/dist/MarkerCluster.Default.css" />
	<script src="/js/Leaflet.markercluster/dist/leaflet.markercluster-src.js"></script>
  <link rel="stylesheet" href="/js/treeLayer/L.Control.Layers.Tree.css">
  <script src="/js/treeLayer/L.Control.Layers.Tree.js"></script>
@section("container")
  <div class="container-fluid px-5">
        <div class="row justify-content-center align-items-center" style="height: 100vh" id="about">
            <div class="col-sm-12">
                <h2 class="fw-bold">Persebaran Alumni</h2>
                <div id="map"></div>
          </div>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
      <script>

        let navbar = document.getElementById("navbar");
        let navbarNav = document.getElementById("navbar-nav");

            navbar.style.backgroundColor = "#ffffff88"
            navbar.style.boxShadow = "2px 2px 2px black"
            navbar.style.transform = "translateY(0)"

            // basemap
            var map = L.map('map').setView([-3.298618801108944,114.58542404981114], 13.46);
            // map.on('contextmenu', () => {
            //     map.off();
            //   })
            // icon marker
            var ulmIcon = L.icon({
            iconUrl: "/img/Logo_ULM.png",
            iconSize:     [50, 50], // size of the icon
            // iconAnchor:   [24, 24], // point of the icon which will correspond to marker's location
            // shadowAnchor: [4, 62],  // the same for the shadow
            // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            var manIcon = L.icon({
            iconUrl: "/img/icon_man.png",
            iconSize:     [50, 50],
            });

            var ceweIcon = L.icon({
            iconUrl: "/img/icon_cewe.png",
            iconSize:     [70, 70],
            });

            var cowoIcon = L.icon({
            iconUrl: "/img/icon_cowo.png",
            iconSize:     [70, 70],
            });

            



        //     L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        // maxZoom: 20,
        // subdomains:['mt0','mt1','mt2','mt3']

        //     }).addTo(map);

            var baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '© OpenStreetMap contributors',
              })
              baseLayer.addTo(map);

            //   var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
            


              var marker = L.marker([-3.298618801108944,114.58542404981114],{icon:ulmIcon}).addTo(map);
              marker.bindPopup('FKIP ULM').openPopup();


            @foreach ($biodatas as $biodata)
            @php
                $koordinats = explode(",", $biodata["koordinat"]);
            @endphp
            var latitude = {{$koordinats[0]}},
                longitude = {{$koordinats[1]}}
                @if ($biodata["jk"] == "Laki-laki")
                    icon = cowoIcon
                @else
                    icon = ceweIcon
                @endif
                L.marker([latitude, longitude ], {icon:icon})
                .addTo(map)
                .on("dblclick", (e) => {
                        // var control = L.Routing.control({
                        //     waypoints: [
                        //         L.latLng(-3.298618801108944,114.58542404981114),
                        //         L.latLng(latitude,longitude)
                        //     ],
                        //     routeWhileDragging: false
                        // })
                        // control.addTo(map);
                })
                .bindPopup(
                    `Nama : {{$biodata["name"]}} <br>
                    NIM : {{$biodata["nim"]}} <br><br>
                    <img src="{{asset('storage/' . $biodata->foto) }}" class="img-thumbnail" alt="{{$biodata["name"]}}"><br>
                    <button class="btn btn-sm  btn-outline-success" onclick = 'return showRute(${latitude}, ${longitude})'> Rute kesini </button>
                    `);
            @endforeach

            var control = L.Routing.control({
                  waypoints: [
                      L.latLng(-3.298618801108944,114.58542404981114)
                  ],
                  routeWhileDragging: false,
                  lineOptions:{
                    styles:[
                        {color: 'red',weight:3}
                    ],
                  },
                  createMarker: function() { return null; }
              })
              control.addTo(map);

              function showRute(lat, lng){
                var latLng = L.latLng(lat, lng);
                control.spliceWaypoints(control.getWaypoints().length -1,1, latLng)
              }

            //   GeoJSON
            var batasKecamatan = L.markerClusterGroup();
            let sub = [];
            let colors = [
              'rgba(255, 26, 104, 0.2)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
            ];
            var listKabupaten = []
            var kabupaten = []
            var provinsi = []
            var baseTree = [
                            {
                                label: 'OpenStreeMap',
                                layer: osm,
                                children: [
                                    {label: 'B&W', layer: osmBw, name: 'OpenStreeMap <b>B&W</b>'}
                                ]
                            }

                        ];
            
            $.getJSON('/geoJSON/batasKecamatanKalsel2.geojson', (json) =>{
                  let html = `
                              <label id="banjar" onclick="showKecamatan(this)"><b> Kabuaten Banjarmasin </b></label> <br>
                      `
                      let i = 0;
                      let j = 1;
                  geoLayer = L.geoJSON(json, {
                      
                      style: (feature) => {
                          return {
                              fillOpacity: 0.8,
                              weight: 5,
                              opacity: 1,
                              color: 'black',
                              borderColor: 'red'
                            };
                        },
                        onEachFeature: (feature, layer)=>{
                            var iconLabel = L.divIcon({
                                className: 'label-kecamatan',
                                html: `${feature.properties.WADMKK}`,

                            });
                        html = html + `
                        <input id="${i}" type="checkbox" class="kec" onclick="showBatas(this, ${i})">  <label for="${i}">${feature.properties.WADMKK} </label> <br>
                        `
                         sub.push(L.markerClusterGroup().addLayer(layer) ) 
                         console.log(feature)
                         
                        if(listKabupaten.length != 0 ){

                            if(feature.properties.WADMKD != listKkabupaten[0]){
                                
                                listKabupaten.push(feature.properties.WADMKD)
                            }
                        }

                         kabupaten.push({label: `${feature.properties.WADMKD}`, layer:layer});      
                         
                         L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(sub[i]);
                         i++;
                         
                            layer.addTo(batasKecamatan);
                            // layer.addTo(i);
                            // batasKecamatan.addLayer(layer);
                        }
                    })
                    
                    L.control.slideMenu(html).addTo(map);

                    var overlaysTree = {
                        label: '<span style="color:black; font-size:12px"> Kota Lainnya </span>',
                        selectAllCheckbox: 'Un/select all',
                        children: [
                            {label: '<div id="onlysel" style="color:black;">-Lihat yang diklik saja-</div>'},
                            {label: 'Kabupaten', children: kabupaten}
                            
                            
                        ]
                    }
                    var lay = L.control.layers.tree(baseTree, overlaysTree,
                        {
                            namedToggle: true,
                            selectorBack: false,
                            closedSymbol: '&#8862; &#x1f5c0;',
                            ospanenedSymbol: '&#8863; &#x1f5c1;',
                            // collapseAll: 'Collapse all',
                            // expandAll: 'Expand all',
                            collapsed: false,
                            position: 'topleft'

                        });

                    lay.addTo(map).collapseTree().expandSelected().collapseTree(true);
                    L.DomEvent.on(L.DomUtil.get('onlysel'), 'click', function() {
                        lay.collapseTree(true).expandSelected(true);
                    });
                })
       
console.log(listKabupaten) 
                var center = [40, 0];


var osm = L.tileLayer(
    '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {attribution: '© OpenStreetMap contributors'}
);

var osmBw = L.tileLayer(
    'http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png',
    {attribution: '© OpenStreetMap contributors'}
);

var otopomap = L.tileLayer(
    '//{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
    {attribution: '© OpenStreetMap contributors. OpenTopoMap.org'}
);

var thunderAttr = {attribution: '© OpenStreetMap contributors. Tiles courtesy of Andy Allan'}
var transport = L.tileLayer(
    '//{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png',
    thunderAttr
);

var cycle = L.tileLayer(
    '//{s}.tile.thunderforest.com/cycle/{z}/{x}/{y}.png',
    thunderAttr
);






// var overlaysTree = {
//     label: 'Some cities',
//     selectAllCheckbox: 'Un/select all',
//     children: [
//         {label: '<div id="onlysel">-Show only selected-</div>'},
//         {label: 'Banjarmasin', children: [
//             {label: 'Paris', layer: L.marker(sub[1].getBounds().getCenter() )},
//             {label: 'Toulouse', layer: L.marker([43.629, 1.364])},
//         ]},
//         {label: 'Germany', selectAllCheckbox: true, children: [
//             {label: 'Berlin', layer: L.marker([52.559, 13.287])},
//             {label: 'Cologne', layer: L.marker([50.866, 7.143])},
//             {label: 'Hamburg', layer: L.marker([53.630, 9.988])},
//             {label: 'Munich', layer: L.marker([48.354, 11.786])},
//         ]},
        
//     ]
// }


// var baseLayers = {
//     "base": baseLayer
// };
                
// var overlays = {
//     "Marker": geoJSON
// };

// L.control.layers(baseLayers, overlays).addTo(map);

// html = html + `wkwk`
function showBatas(v, i){
    if(v.checked === true){
        map.removeLayer(batasKecamatan);
        map.addLayer(sub[i]);
        map.flyTo(sub[i].getBounds().getCenter());
        
    }else{
        map.removeLayer(sub[i]);
    }
}

// function showKecamatan(v){
//     if(v.checked === true){
//         map.addLayer(batasKecamatan);
//     }else{
//         map.removeLayer(batasKecamatan);
//         v.checked = false;
//     }
// }

      </script>
<!-- After Leaflet script -->
<script src="https://unpkg.com/leaflet.featuregroup.subgroup@1.0.2/dist/leaflet.featuregroup.subgroup.js"></script>
@endsection