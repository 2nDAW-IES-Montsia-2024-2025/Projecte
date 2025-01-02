<div id="map" class="relative">
    <!-- Button to open the filter panel -->
    <button id="openMore" class="absolute z-10 bottom-5 right-5 p-2 bg-blue-500 text-white rounded-full" id="openMore">
        <img id="plusIcon" src="/assets/images/More.png" alt="+" class="w-8 h-8 transition-transform duration-300">
    </button>
    <!-- First Panel -->
    <div id="firstPanel" class="absolute z-10 bottom-0 right-20 bg-white shadow-lg sm:w-64 h-1/4 p-5 hidden rounded-xl flex flex-col justify-evenly">
        <button class="absolute text-xl top-3" id="openFilters">
            <span class="text-lg font-semibold">Filters</span>
        </button>
        <button class="absolute text-xl top-1/3" id="openZones">
            <span class="text-lg font-semibold">Add Zones</span>
        </button>
        <button class="absolute text-xl top-2   /3" id="openElements">
            <span class="text-lg font-semibold">Add Elements</span>
        </button>
    </div>

    <!-- Filter Panel -->
    <div id="filterPanel" class="absolute z-10 bottom-0 right-[calc(64px*5.2)] bg-white shadow-lg sm:w-64 h-1/4 p-5 hidden rounded-xl">
        <div class="space-y-2">
            <button class="absolute text-xl top-3" id="openFiltersZones">
                <span class="text-lg font-semibold">Zones</span>
            </button>
            <button class="absolute text-xl top-1/3" id="openFiltersElements">
                <span class="text-lg font-semibold">Elements</span>
            </button>
        </div>
    </div>

    <!-- Zones Panel -->
    <div id="filterPanelZones" class="absolute z-10 bottom-0 right-[calc(64px*9.2)] bg-white shadow-lg sm:w-64 h-1/4 p-5 hidden rounded-xl">
        <div class="space-y-2" id="zonesContainer">
            <!-- Here we will add the zones -->
        </div>
        <button class="absolute z-10 bottom-5 right-5 p-2 bg-blue-500 text-white rounded-full">
            <span class="material-icons">Apply</span>
        </button>
    </div>

    <!-- Elements Panel -->
    <div id="filterPanelElements" class="absolute z-10 bottom-0 right-[calc(64px*9.2)] bg-white shadow-lg sm:w-64 h-1/4 p-5 hidden rounded-xl">
        <div class="space-y-2" id="elementsContainer">
            <!-- Here we will add the elements -->
            <button class="absolute text-xl top-1/3" id="openFiltersElements">
                <span class="text-lg font-semibold">Elements</span>
            </button>
        </div>
        <button class="absolute z-10 bottom-5 right-5 p-2 bg-blue-500 text-white rounded-full">
            <span class="material-icons">Apply</span>
        </button>
    </div>
</div>

<script>
    // Script for the plus icon rotation
    const plusIcon = document.getElementById('plusIcon');
    let isRotated = false; // Variable para rastrear el estado de rotación
    // Script for the dropdown menu
    const openMoreButton = document.getElementById("openMore");
    const firstPanel = document.getElementById("firstPanel");
    const openFiltersButton = document.getElementById("openFilters");
    const filterPanel = document.getElementById("filterPanel");
    const openZonesButton = document.getElementById("openFiltersZones");
    const filterPanelZones = document.getElementById("filterPanelZones");
    const openElementsButton = document.getElementById("openFiltersElements");
    const filterPanelElements = document.getElementById("filterPanelElements");
    Panels = [firstPanel, filterPanel, filterPanelZones, filterPanelElements];

    // Function to open or close the panels
    function openFilterPanel(panel, isPanelOpen) {
        if (!isPanelOpen) {
            panel.classList.remove("hidden");
            return true;
        } else {
            panel.classList.add("hidden");
            return false;
        }
    }
    // States of panels
    let isFirstPanelOpen = false;
    let isFilterPanelOpen = false;
    let isFilterPanelZonesOpen = false;
    let isFilterPanelElementsOpen = false;

    // Show/Hide the first panel
    openMoreButton.addEventListener("click", () => {
        if (!isRotated) {
            // Rotar 45 grados
            plusIcon.style.transform = 'rotate(45deg)';
        } else {
            // Volver a la posición inicial
            plusIcon.style.transform = 'rotate(0deg)';
        }
        isRotated = !isRotated; // Cambiar el estado
        isFirstPanelOpen = openFilterPanel(firstPanel, isFirstPanelOpen);
        for (let panel of Panels) {
            if (panel !== firstPanel) {
                panel.classList.add("hidden");
            }
        }
    });
    // Show/Hide the filter panel
    openFiltersButton.addEventListener("click", () => {
        isFilterPanelOpen = openFilterPanel(filterPanel, isFilterPanelOpen);
    });
    // Show/Hide the filter panel for zones
    openZonesButton.addEventListener("click", () => {
        isFilterPanelZonesOpen = openFilterPanel(filterPanelZones, isFilterPanelZonesOpen);
        if (isFilterPanelElementsOpen){
            isFilterPanelElementsOpen=openFilterPanel(filterPanelElements, isFilterPanelElementsOpen);
        }
    });
    // Show/Hide the filter panel for elements
    openElementsButton.addEventListener("click", () => {
        isFilterPanelElementsOpen = openFilterPanel(filterPanelElements, isFilterPanelElementsOpen);
        if (isFilterPanelZonesOpen){
            isFilterPanelZonesOpen=openFilterPanel(filterPanelZones, isFilterPanelZonesOpen);
        }
    });
</script>

<script>
    // Initialize the map
    mapboxgl.accessToken = '<?= getenv("MAPBOX_TOKEN") ?>';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12', // Style of the map
        projection: 'globe', // Display the map as a globe, since satellite-v9 defaults to Mercator
        zoom: 12,
        center: [-0.3763, 39.4699]
    });

    map.addControl(new mapboxgl.NavigationControl()); // Zoom in or out with the cursor

    map.on('style.load', () => {
        map.setFog({}); // Set the default atmosphere style
    });

    // Create a blue dot with a vision cone
    function createBlueDot() {
        const el = document.createElement('div');
        el.className = 'blue-dot';
        el.style.width = '12px';
        el.style.height = '12px';
        el.style.backgroundColor = '#007AFF';
        el.style.border = '2px solid white';
        el.style.borderRadius = '50%';
        el.style.boxShadow = '0 0 5px rgba(0, 122, 255, 0.5)';
        return el;
    }

    let blueDotMarker;
    let visionConeLayer;

    navigator.geolocation.watchPosition(
        (position) => {
            const { latitude, longitude } = position.coords;
            const userLocation = [longitude, latitude];
            const userOrientation = 45; // Angle of the vision cone in degrees

            // Create or update the blue dot marker
            if (!blueDotMarker) {
                blueDotMarker = new mapboxgl.Marker({ element: createBlueDot() })
                    .setLngLat(userLocation)
                    .addTo(map);
            } else {
                blueDotMarker.setLngLat(userLocation);
            }

            // Create or update the vision cone
            const radius = 0.1; // Radius of the cone in kilometers
            const coneCoordinates = [];
            for (let i = -30; i <= 30; i++) {
                const angle = (userOrientation + i) * (Math.PI / 180);
                const dx = radius * Math.cos(angle);
                const dy = radius * Math.sin(angle);
                coneCoordinates.push([userLocation[0] + dx / 111, userLocation[1] + dy / 111]);
            }
            coneCoordinates.push(userLocation);

            const visionConeData = {
                type: 'Feature',
                geometry: {
                    type: 'Polygon',
                    coordinates: [coneCoordinates]
                }
            };

            if (!map.getSource('vision-cone')) {
                map.addSource('vision-cone', {
                    type: 'geojson',
                    data: visionConeData
                });

                map.addLayer({
                    id: 'vision-cone-layer',
                    type: 'fill',
                    source: 'vision-cone',
                    paint: {
                        'fill-color': 'rgba(0, 122, 255, 0.3)',
                        'fill-opacity': 0.5
                    }
                });
            } else {
                map.getSource('vision-cone').setData(visionConeData);
            }

            // Center the map on the current location
            map.flyTo({
                center: userLocation,
                zoom: 15,
                essential: true
            });
        },
        (error) => {
            console.error('Error getting location:', error);
        },
        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
        }
    );

    // GeoJSON
    map.on('load', () => {
        // Add source with GeoJSON
        map.addSource('valencia-area', {
            'type': 'geojson',
            'data': {
                'type': 'FeatureCollection',
                'features': [
                    // Zone: Polygon
                    {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            'coordinates': [
                                [
                                    [-0.379946, 39.472606], // Estación del Norte
                                    [-0.377255, 39.470085], // Mercado Central
                                    [-0.374091, 39.470914], // Plaza Redonda
                                    [-0.372027, 39.472846], // Plaza de la Reina
                                    [-0.374709, 39.475012], // Torres de Serranos
                                    [-0.378901, 39.474073], // Plaza del Ayuntamiento
                                    [-0.379946, 39.472606]  // Close the polygon
                                ]
                            ]
                        },
                        'properties': {
                            'name': 'Historic Center of Valencia',
                            'description': 'One of the most emblematic areas of Valencia, including squares, markets, and historic towers.'
                        }
                    },
                    // Point: Plaza del Ayuntamiento
                    {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [-0.3789, 39.4740]
                        },
                        'properties': {
                            'name': 'Plaza del Ayuntamiento',
                            'description': 'The nerve center of Valencia with iconic views and cultural activities.'
                        }
                    },
                    // Point: Mercado Central
                    {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [-0.377255, 39.470085]
                        },
                        'properties': {
                            'name': 'Mercado Central',
                            'description': 'An iconic market full of fresh products and modernist architecture.'
                        }
                    },
                    // Point: Plaza de la Reina
                    {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [-0.372027, 39.472846]
                        },
                        'properties': {
                            'name': 'Plaza de la Reina',
                            'description': 'A historic square surrounded by cafes and the famous Valencia Cathedral.'
                        }
                    }
                ]
            }
        });

        // Add polygon and point layers
        map.addLayer({
            'id': 'valencia-boundary',
            'type': 'fill',
            'source': 'valencia-area',
            'paint': {
                'fill-color': '#0080ff',
                'fill-opacity': 0.3
            },
            'filter': ['==', '$type', 'Polygon']
        });

        map.addLayer({
            'id': 'valencia-points',
            'type': 'circle',
            'source': 'valencia-area',
            'paint': {
                'circle-radius': 6,
                'circle-color': '#ff5733'
            },
            'filter': ['==', '$type', 'Point']
        });

        // Add custom marker icon
        map.loadImage('/assets/images/Cursor-marker.png', (error, image) => {
            if (error) throw error;
            map.addImage('custom-marker', image);

            map.addLayer({
                'id': 'valencia-points',
                'type': 'symbol',
                'source': 'valencia-area',
                'layout': {
                    'icon-image': 'custom-marker',
                    'icon-size': 0.5 // Adjust the icon size as needed
                },
                'filter': ['==', '$type', 'Point']
            });
        });

        // Event for clicking on the polygon
        map.on('click', 'valencia-boundary', (e) => {
            const coordinates = e.lngLat;
            const properties = e.features[0].properties;

            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(`<strong>${properties.name}</strong><p>${properties.description}</p>`)
                .addTo(map);
        });

        // Event for clicking on the points
        map.on('click', 'valencia-points', (e) => {
            const coordinates = e.features[0].geometry.coordinates.slice();
            const properties = e.features[0].properties;

            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(`<strong>${properties.name}</strong><p>${properties.description}</p>`)
                .addTo(map);
        });

        // Change the cursor to "pointer" when hovering over points or the zone
        map.on('mouseenter', 'valencia-boundary', () => {
            map.getCanvas().style.cursor = 'pointer';
        });
        map.on('mouseleave', 'valencia-boundary', () => {
            map.getCanvas().style.cursor = '';
        });
        map.on('mouseenter', 'valencia-points', () => {
            map.getCanvas().style.cursor = 'pointer';
        });
        map.on('mouseleave', 'valencia-points', () => {
            map.getCanvas().style.cursor = '';
        });
    });
</script>

<style>
    .blue-dot {
        width: 12px;
        height: 12px;
        background-color: #007AFF;
        border: 2px solid white;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 122, 255, 0.5);
    }
</style>