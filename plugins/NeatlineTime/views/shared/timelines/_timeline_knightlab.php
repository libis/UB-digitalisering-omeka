<?php
/**
 * Timeline display partial.
 */

 // Get the timeline
if (empty($timeline)) $timeline = get_current_record('neatline_time_timeline');
?>

<div id="timeline-<?php echo $timeline->id; ?>" style="width: 100%; height: 650px"></div>

<script>
  jQuery(document).ready(function($) {
        var centerDate = <?php echo json_encode($timeline->getProperty('center_date')); ?>;
        // get the location for the json data
        var jsonTimelineUri = '<?php echo neatlinetime_json_uri_for_timeline($timeline); ?>';

        $.getJSON(jsonTimelineUri, function(data) {
          // console.log('data ', data);
          var timelineEvents = new Array();

          for (var i = 0; i < data.events.length; i++) {
            var timelineEntry = '';




            // Assumes YYYY-MM-DD
            var startDate = parseDate(data.events[i].start);

            // If the record has an end date, include it
            if (data.events[i].end) {
              var endDate = parseDate(data.events[i].end);

              //if full month
              if(endDate[2] >= '27' && startDate[2] == '01' && endDate[1] == startDate[1]){
                endDate[2] = '';
                startDate[2]= '';
              }else{
                //if full year
                if(startDate[1] == '01' && startDate[2] == '01'){
                  startDate[1] = '';
                  startDate[2] = '';
                }
                if(endDate[1] == '12' && endDate[2] == '31'){
                  endDate[1] = '';
                  endDate[2] = '';
                }
              }

              timelineEntry["end_date"] = {
                "year": endDate[0],
                "month": endDate[1],
                "day": endDate[2]
              };
            }else{
              //if full year
              if(startDate[1] == '01' && startDate[2] == '01'){
                startDate[1] = '';
                startDate[2] = '';
              }
            }

            timelineEntry = {
              "text": {
                "headline": data.events[i].title
              },
              "start_date": {
                  "year": startDate[0],
                  "month": startDate[1],
                  "day": startDate[2]
              },
              "group": data.events[i].group
            };

            // If the item has a description, include it
            if (data.events[i].description) {
              timelineEntry.text["text"] = "<h2><a href=" + data.events[i].link + ">" + data.events[i].title + "</a></h2>" + data.events[i].description + data.events[i].exhibits;
            }else{
              timelineEntry.text["text"] = "<h2><a href=" + data.events[i].link + ">" + data.events[i].title + "</a></h2>" + data.events[i].exhibits;
            }

            // If the record has a file attachment, include that.
            // Limits based on returned JSON:
            // If multiple images are attached to the record, it only shows the first.
            // If a pdf is attached, it does not show it or indicate it.
            // If an mp3 is attached in Files, it does not appear.
            if (data.events[i].image) {
              timelineEntry["media"] = {
                "caption": data.events[i].caption,
                "url": data.events[i].image
              };
            }

            // Add the slide to the events
            timelineEvents.push(timelineEntry);
          }

          // create the collection of slides
          var slides = {
            "title": {
              "text": {
                "headline": <?php echo json_encode($timeline->title); ?>,
                "text": <?php echo json_encode($timeline->description); ?>
              }
            },
            "events": timelineEvents
          };

          var timelineDivID = 'timeline-<?php echo $timeline->id; ?>';

          var options = {
            hash_bookmark: true,
            slide_padding_lr: 40,
            initial_zoom: 5,
            zoom_sequence: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512]
          };

          // initialize the timeline instance
          window.timeline = new TL.Timeline(timelineDivID, slides,options);

          function parseDate(entryDateString) {
            var entryDate = entryDateString;

            var parsedDate = entryDate.split('-');

            var entryYear = parsedDate[0];
            var entryMonth = parsedDate[1];
            var entryDay = parsedDate[2].slice(0, 2);

            return [entryYear, entryMonth, entryDay];
          };
        });
    });
</script>
