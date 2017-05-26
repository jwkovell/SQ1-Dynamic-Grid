(function ($, Drupal) {
  Drupal.behaviors.sq1DynamicGrid = {
    attach: function (context, settings) {

      function printTiles(tiles) {
        var tileOrder = [];
        $(tiles).each(function(){
          tileOrder.push($(this).attr('data-index'));
        });
        console.log(tileOrder);
      }

      function sortTiles(tiles) {
        
        return $(tiles).sort(function(a, b){

          return ($(b).data('index')) < ($(a).data('index')) ? 1 : -1;

        });
        
      }

      function getColumnCount(grid) {

        var oneColumnActive = $(grid).attr('data-one-column-active');
        var oneColumnMin = $(grid).attr('data-one-column-min');
        var oneColumnMax = $(grid).attr('data-one-column-max');

        var twoColumnActive = $(grid).attr('data-two-column-active');
        var twoColumnMin = $(grid).attr('data-two-column-min');
        var twoColumnMax = $(grid).attr('data-two-column-max');

        var threeColumnActive = $(grid).attr('data-three-column-active');
        var threeColumnMin = $(grid).attr('data-three-column-min');
        var threeColumnMax = $(grid).attr('data-three-column-max');

        var fourColumnActive = $(grid).attr('data-four-column-active');
        var fourColumnMin = $(grid).attr('data-four-column-min');
        var fourColumnMax = $(grid).attr('data-four-column-max');

        var fiveColumnActive = $(grid).attr('data-five-column-active');
        var fiveColumnMin = $(grid).attr('data-five-column-min');
        var fiveColumnMax = $(grid).attr('data-five-column-max');

        var sixColumnActive = $(grid).attr('data-six-column-active');
        var sixColumnMin = $(grid).attr('data-six-column-min');
        var sixColumnMax = $(grid).attr('data-six-column-max');

        var columnCount = $(grid).attr('data-default-column-count');
        var windowWidth = $(window).width();

        if ( (oneColumnActive == 1) && (windowWidth >= oneColumnMin || oneColumnMin == '') && (windowWidth <= oneColumnMax || oneColumnMax == '') ) {
          columnCount = 1;
        }

        if ( (twoColumnActive == 1) && (windowWidth >= twoColumnMin || twoColumnMin == '') && (windowWidth <= twoColumnMax || twoColumnMax == '') ) {
          columnCount = 2;
        }

        if ( (threeColumnActive == 1) && (windowWidth >= threeColumnMin || threeColumnMin == '') && (windowWidth <= threeColumnMax || threeColumnMax == '') ) {
          columnCount = 3;
        }

        if ( (fourColumnActive == 1) && (windowWidth >= fourColumnMin || fourColumnMin == '') && (windowWidth <= fourColumnMax || fourColumnMax == '') ) {
          columnCount = 4;
        }

        if ( (fiveColumnActive == 1) && (windowWidth >= fiveColumnMin || fiveColumnMin == '') && (windowWidth <= fiveColumnMax || fiveColumnMax == '') ) {
          columnCount = 5;
        }

        if ( (sixColumnActive == 1) && (windowWidth >= sixColumnMin || sixColumnMin == '') && (windowWidth <= sixColumnMax || sixColumnMax == '') ) {
          columnCount = 6;
        }

        return columnCount;

      }

      function buildDynamicGrid(grid, tiles) {

        var columnCount = getColumnCount(grid);

        // If the generated grid has a new column count...
        if ( $(grid).find('.sq1-dynamic-grid-column').length !== columnCount ) {

          // Resort tiles by original index.
          tiles = sortTiles(tiles);

          // Remove all columns from the grid.
          $(grid).find('.sq1-dynamic-grid-column').detach();

          // Loop through columns
          for (var columnIndex = 0; columnIndex < columnCount; columnIndex++) {

            // Add columns to the grid.
            $(grid).children('.sq1-dynamic-grid-grid').append('<ul class="sq1-dynamic-grid-column"></ul>')

          }

          // Reset the column counter.
          var currentColumn = 0;

          // Loop through tiles.
          $(tiles).each(function(){

            $(grid).find('.sq1-dynamic-grid-column:eq(' + currentColumn + ')').append($(this));

            if (currentColumn + 1 < columnCount) {
              currentColumn++;
            } else {
              currentColumn = 0;
            }

          });


        }

      }

      // Loop through every dynamic grid.
      $('.sq1-dynamic-grid').each(function(){
        var grid = $(this)
        var tiles = $(this).find('.sq1-dynamic-grid-tile');
        // Build the dynamic grid.
        buildDynamicGrid(grid, tiles);
      });

      // On window resize...
      $( window ).resize(function() {
        // Loop through every dynamic grid.
        $('.sq1-dynamic-grid').each(function(){
          var grid = $(this)
          var tiles = $(this).find('.sq1-dynamic-grid-tile');
          // Rebuild the dynamic grid.
          buildDynamicGrid(grid, tiles);
        });
      });

    }
  };
})(jQuery, Drupal);
