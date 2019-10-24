/*
Template Name: Ubold - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 3.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Calendar init js
*/
!function ($) {
  "use strict";

  var CalendarApp = function CalendarApp() {
    this.$body = $("body");
    this.$modal = $('#event-modal'), this.$event = '#external-events div.external-event', this.$calendar = $('#calendar'), this.$saveCategoryBtn = $('.save-category'), this.$categoryForm = $('#add-category form'), this.$extEvents = $('#external-events'), this.$calendarObj = null;
  };
  /* on drop */


  CalendarApp.prototype.onDrop = function (eventObj, date) {
    var $this = this; // retrieve the dropped element's stored Event Object

    var originalEventObject = eventObj.data('eventObject');
    var $categoryClass = eventObj.attr('data-class'); // we need to copy it, so that multiple events don't have a reference to the same object

    var copiedEventObject = $.extend({}, originalEventObject); // assign it the date that was reported

    copiedEventObject.start = date;
    if ($categoryClass) copiedEventObject['className'] = [$categoryClass]; // render the event on the calendar

    $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true); // is the "remove after drop" checkbox checked?

    if ($('#drop-remove').is(':checked')) {
      // if so, remove the element from the "Draggable Events" list
      eventObj.remove();
    }
  },
  /* Initializing */

  CalendarApp.prototype.init = function () {
    /*  Initialize the calendar  */

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var form = '';
    var today = new Date($.now());
    var defaultEvents = [{
      title: 'Sesi 1',
      start: today,
      end: today,
      className: 'bg-success'
    }, {
      title: 'Sesi 2',
      start: new Date($.now() + 168000000),
      className: 'bg-info'
    }, {
      title: 'Sesi 3',
      start: new Date($.now() + 338000000),
      className: 'bg-primary'
    }];
    var $this = this;
    $this.$calendarObj = $this.$calendar.fullCalendar({
      slotDuration: '01:00:00',

      /* If we want to split day time each 15minutes */
      minTime: '08:00:00',
      maxTime: '19:00:00',
      defaultView: 'month',
      handleWindowResize: true,
      height: $(window).height() - 200,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,list'
      },
      events: defaultEvents
    }); //on new event
  }, //init CalendarApp
  $.CalendarApp = new CalendarApp(), $.CalendarApp.Constructor = CalendarApp;
}(window.jQuery), //initializing CalendarApp
function ($) {
  "use strict";

  $.CalendarApp.init();
}(window.jQuery);