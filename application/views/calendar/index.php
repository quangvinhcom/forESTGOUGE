<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Calendar Display</title>
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link rel="stylesheet" href="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.css" />
        <script src="<?php echo base_url() ?>scripts/fullcalendar/lib/moment.min.js"></script>
        <script src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url() ?>scripts/fullcalendar/gcal.js"></script>
        <script src="<?php echo base_url() ?>scripts/popper.min.js"></script>
        
    </head>
    <body>

    <div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>VINH, NGUYEN QUANG - 0934 133 281</h1>

    <div id="calendar">

    </div>

    </div>
    </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Status</label>
                <div class="col-md-8 ui-front">
                    <select type="text" class="form-control" name="description" required>
                    <option value="" disabled selected>------------choose status------------</option>
                    <option value="planning">planning</option>
                    <option value="doing">doing</option>
                    <option value="complete">complete</option>
                    </select>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8 ui-front">
                    <input type="date" class="form-control" name="start_date" value="<?php echo date('Y-m-d');?>" required>
                </div>
        </div>
   <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8 ui-front">
                    <input type="date" class="form-control" name="end_date" value="<?php echo date('Y-m-d');?>" required>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="" id="name">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Status</label>
                <div class="col-md-8 ui-front">
                    <select type="text" class="form-control" id="description" name="description" required>
                    <option value="planning">planning</option>
                    <option value="doing">doing</option>
                    <option value="complete">complete</option>
                    </select>
                </div>
        </div>
         <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8 ui-front">
                    <input type="date" class="form-control" name="start_date" id="start_date" required>
                </div>
        </div>
   <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8 ui-front">
                    <input type="date" class="form-control" name="end_date" id="end_date" required>
                </div>
        </div>
        <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                    <div class="col-md-8">
                        <input type="checkbox" name="delete" value="1">
                    </div>
            </div>
            <input type="hidden" name="eventid" id="event_id" value="0" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

    var date_last_clicked = null;

    $('#calendar').fullCalendar({
        eventSources: [
           {
           events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '<?php echo base_url() ?>calendar/get_events',
                    dataType: 'json',
                    data: {
                        // our hypothetical feed requires UNIX timestamps
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                });
              }
            },
        ],
        dayClick: function(date, jsEvent, view) {
            date_last_clicked = $(this);
            $(this).css('background-color', '#bed7f3');
            $('#addModal').modal();
        },
       eventClick: function(event, jsEvent, view) {
          $('#name').val(event.title);
          $('#description').val(event.description);
          $('#start_date').val(moment(event.start).format('YYYY-MM-DD'));
          if(event.end) {
            $('#end_date').val(moment(event.end).format('YYYY-MM-DD'));
          } else {
            $('#end_date').val(moment(event.start).format('YYYY-MM-DD'));
          }
          $('#event_id').val(event.id);
          $('#editModal').modal();
       },
       eventRender: function(event, element) {
    //Check what is the key for description in event and use that one.
    element.find('.fc-title').append(" " + "(" + event.description + ")"); 
}
    });
});
</script>
    </body>
</html>