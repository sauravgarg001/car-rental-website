<script>
    var destinationA = 'Greenwich, England';
    var destinationB = 'Stockholm, Sweden';

    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        destinations: [destinationA, destinationB],
        travelMode: 'DRIVING',
        transitOptions: TransitOptions,
        drivingOptions: DrivingOptions,
        unitSystem: UnitSystem,
        avoidHighways: Boolean,
        avoidTolls: Boolean,
    }, callback);

    function callback(response, status) {
        // See Parsing the Results for
        // the basics of a callback function.
    }
</script>