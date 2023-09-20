
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
        /* text-shadow: 1px 1px white; */
        text-align: center;
        font-weight: bold;
    }
</style>

  
@section("container")

  <div class="container-fluid px-5">
        <div class="row justify-content-center align-items-center" style="height: 100vh" id="about">
            <div class="col-sm-12">
                {{-- <h2 class="fw-bold">Persebaran Alumni</h2> --}}
                <div id="map"></div>
          </div>
        </div>
      </div>
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
            
            {{-- cluster --}}
            <link rel="stylesheet" href="js/Leaflet.markercluster/dist/MarkerCluster.css" />
            <link rel="stylesheet" href="/js/Leaflet.markercluster/dist/MarkerCluster.Default.css" />
            <script src="/js/Leaflet.markercluster/dist/leaflet.markercluster-src.js"></script>
            <link rel="stylesheet" href="/js/treeLayer/L.Control.Layers.Tree.css">
            <script src="/js/treeLayer/L.Control.Layers.Tree.js"></script>
            {{-- Slide --}}
            <link rel="stylesheet" href="/css/L.Control.SlideMenu.css">
            <script src="/js/L.Control.SlideMenu.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
              {{-- routing machine --}}
              <link rel="stylesheet" href="/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
              <script src="/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
  
              
          
      
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
            let batasKecamatan = [];
            let sub = [];
            let colors = [
              'rgba(255, 26, 104, 0.2)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
            ];
            var kabupaten = []
            var listKabupaten = []
           var html = ``;

           getShape("kabBanjarmasin", "Banjarmasin");
           getShape("kabTapin", "Tapin");
           getShape("kabBanjarbaru", "Banjarbaru");
           getShape("kabBanjar", "Banjar");
           getShape("kabBaritoKuala", "BaritoKuala");
           getShape("kabHuluSungaiSelatan", "HuluSungaiSelatan");
           getShape("kabHuluSungaiTengah", "HuluSungaiTengah");
           getShape("kabHuluSungaiUtara", "HuluSungaiUtara");
           getShape("kabBalangan", "Balangan");
           getShape("kabTabalong", "Tabalong");
           getShape("kabTanahLaut", "TanahLaut");
           getShape("kabTanahBumbu", "TanahBumbu");
           getShape("kabKotabaru", "Kotabaru");

            function getShape(namaFile, kab){

                $.getJSON('/geoJSON/'+namaFile+'.geojson', (json) =>{
                    html = html + `
                                <label for="${kab}" style="cursor:pointer;" class="fs-6"><b> Kabupaten ${kab} <span id="label${kab}" class="fa fa-chevron-left"></span></b></label>
                                <input id="${kab}" style="transform:scale(0)"  type="checkbox"  onclick="showKecamatan(this, ${batasKecamatan.length})">
                                <br>
                        `;
                        let i = 0;
                        let j = 1;
                    geoLayer = L.geoJSON(json, {
                        
                        style: (feature) => {
                            return {
                                fillOpacity: 0.8,
                                weight: 3,
                                opacity: 1,
                                color: 'purple',
                                fillColor: colors[i]
                                };
                            },
                            onEachFeature: (feature, layer)=>{
                                var iconLabel = L.divIcon({
                                    className: 'label-kecamatan',
                                    html: `${feature.properties.WADMKC}`

                                });
                                console.log(feature.properties.WADMKC)
                            // if(feature.properties.WADMKC){

                                html = html + `
                                <div class="${kab}" style="display:none">
                                <input id="${sub.length}" type="checkbox" class="kec" onclick="showBatas(this, ${sub.length})">  <label class="text-capitalize" for="${sub.length}">${feature.properties.WADMKC}</label> <br>
                            </div>
                            `;
                            
                            // console.log(html)
                            sub.push(L.markerClusterGroup().addLayer(layer) ) ;
                            L.marker(layer.getBounds().getCenter(), {icon:iconLabel}).addTo(sub[batasKecamatan.length]);
                            
                            // batasKecamatan.addLayer(sub[i]);
                            //  sub[i].addTo(batasKecamatan);
                            // batasKecamatan.addLayer(layer);
                            batasKecamatan.push(L.markerClusterGroup().addLayer(sub[batasKecamatan.length]) ) ;
                            i++;
                        // }
                            
                        }
                    })
                    // console.log(batasKecamatan.length)
                    for(let i = 0; i < batasKecamatan.length; i++){
                        kabupaten.push(L.markerClusterGroup().addLayer(batasKecamatan[i]))
                    }
                    control2.setContents(html);
                })
            }
                var control2 = L.control.slideMenu("", {
                    position: "topleft",
                    menuposition: "topleft",

                    }).addTo(map)

                // L.control.slideMenu(html).addTo(map);
          
function showBatas(v, i){
    if(v.checked === true){
        // map.removeLayer(batasKecamatan);
        map.addLayer(sub[i]);
        map.flyTo(sub[i].getBounds().getCenter());
        
    }else{
        map.removeLayer(sub[i]);
       
    }
}

function showKecamatan(v, i){
    let inp = v.parentElement.querySelectorAll("."+v.id),
        span = v.parentElement.querySelector("#label"+v.id);
console.log(span)
    
    
    if(v.checked === true){
        // map.addLayer(batasKecamatan);
        // var class = $(".Balangan");    
            for(let i = 0; i < inp.length; i++){
                inp[i].style.display = "";
            }

            span.className = "fa fa-chevron-down"


        // map.flyTo(batasKecamatan[i].getBounds().getCenter());
        
        
    }else{
        for(let i = 0; i < inp.length; i++){
            inp[i].style.display = "none";
        }
        // map.flyTo(batasKecamatan[i].getBounds().getCenter());
    }
}

      </script>
<!-- After Leaflet script -->
{{-- <script src="https://unpkg.com/leaflet.featuregroup.subgroup@1.0.2/dist/leaflet.featuregroup.subgroup.js"></script> --}}
@endsection