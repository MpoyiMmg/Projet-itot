
var daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
var MonthNames = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'October', 'Novembre', 'Decembre'];

function Month(year, month, dates) {
  this.date = new Date(year, month, 0);
  this.numberofdays = this.date.getDate();
  this.numberofmonth = this.date.getMonth();
  this.nameofmonth = MonthNames[this.date.getMonth()];
  this.firstday = 1;
  this.year = this.date.getFullYear();
  this.calendar = generateCalendar(this.numberofdays, year, month - 1, this.firstday, dates);
}

function Date2Day(year, month, day) {
  return new Date(year, month, day).getDay();
}

function generateCalendar(numberofdays, year, month, day, dates) {
  var WEEKDAY = daysOfWeek[Date2Day(year, month, day)];
  if (WEEKDAY in dates) {
    dates[WEEKDAY].push(day);
  } else {
    dates[WEEKDAY] = [day];
  }
  day++;
  return day > numberofdays ? dates : generateCalendar(numberofdays, year, month, day, dates);
}
// to add a zero to the time when this is less than 10
function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}



Date.daysBetween = function (date1, date2) {
  var firstDate = new Date(date1.getFullYear(), date1.getMonth(), date1.getDate());
  var secondDate = new Date(date2.getFullYear(), date2.getMonth(), date2.getDate());
  var diference = (secondDate - firstDate) / 86400000;
  return Math.trunc(diference);
};

var Calendar = React.createClass({ displayName: "Calendar",
  getInitialState: function () {return this.generateCalendar();},
  generateCalendar: function () {
    var today = new Date();
    var present = new Date();
    var month = {};
    var entries = [];
    var defaultColor = { color: "#2980b9" };
    var color1 = { color: "#DB1B1B" };
    var color2 = { color: "#8BB929" };
    var color3 = { color: "#E4F111" };
    var color4 = { color: "#8129B9" };
    var color5 = { color: "#666666" };
    var file = {};
    month = new Month(today.getFullYear(), today.getMonth() + 1, month);
    return { dates: month, today: today, entry: '+', present: present, entries: entries, dColor: defaultColor, color1: color1, color2: color2, color3: color3, color4: color4, color5: color5, file: file };
  },
  update: function (direction) {
    var month = {};
    if (direction == "left") {
      month = new Month(this.state.dates.date.getFullYear(), this.state.dates.date.getMonth(), month);
    } else {
      month = new Month(this.state.dates.date.getFullYear(), this.state.dates.date.getMonth() + 2, month);
    }
    this.state.currDay = "";
    this.state.currMonth = "";
    this.state.currYear = "";
    $(".float").removeClass('rotate');
    return this.setState({ dates: month });
  },
  selectedDay: function (day) {
    this.state.warning = "";
    var selected_day = new Date();
    selected_day.setDate(day);
    var currentMonth = this.state.dates.nameofmonth;
    var currentMonthN = this.state.dates.numberofmonth;
    var currentYear = this.state.dates.date.getFullYear();
    return this.setState({ today: selected_day, currDay: day, currMonth: currentMonth, currYear: currentYear, currMonthN: currentMonthN });
  },
  returnPresent: function () {
    if ($(".float").hasClass('rotate')) {
      $(".float").removeClass('rotate');
      $("#add_entry").addClass('animated slideOutDown');
      window.setTimeout(function () {
        $("#add_entry").css('display', 'none');
      }, 500);
      $("#entry_name").val("");
    }
    var month = {};
    var today = new Date();
    month = new Month(today.getFullYear(), today.getMonth() + 1, month);
    this.state.currDay = "";
    this.state.currMonth = "";
    this.state.currYear = "";
    $(".float").removeClass('rotate');
    return this.setState({ dates: month, today: today });
  },
  addEntry: function (day) {
    if (this.state.currDay) {
      if ($(".float").hasClass('rotate')) {
        $(".float").removeClass('rotate');
        $(".entry").css('background', 'none');
        $("#open_entry").addClass('animated slideOutDown');
        $("#add_entry").addClass('animated slideOutDown');
        window.setTimeout(function () {
          $("#add_entry").css('display', 'none');
          $("#open_entry").css('display', 'none');
        }, 700);
        $("#entry_name").val("");
        $("#all-day").prop('checked', false); // unchecks checkbox
        $("#not-all-day").css('display', 'block');
        $("#enter_hour").val("");
        $("#entry_location").val("");
        $("#entry_note").val("");
        // reset entry colors
        // var resColor = new resetColors();
        // return this.setState(resColor);
      } else {
        $(".float").addClass('rotate');
        $("#add_entry").removeClass('animated slideOutDown');
        $("#add_entry").addClass('animated slideInUp');
        $("#add_entry").css('display', 'block');
        window.setTimeout(function () {
          $("#entry_name").focus();
        }, 700);

      }
    } else {
      return this.setState({ warning: "Selectionnez un jour pour une entré" });
    }
  },
  saveEntry: function (year, month, day) {
    var entryName = $("#entry_name").val();
    if ($.trim(entryName).length > 0) {
      var entryTime = new Date();
      var entryDate = { year, month, day };
      $(".duration").css('background', 'none');
      if ($("#all-day").is(':checked')) {
        const newLocal = "All day";
        var entryDuration = newLocal;
      } else if ($("#enter_hour").val() && $("#enter_hour").val() >= 0 && $("#enter_hour").val() <= 24) {
        var entryDuration = addZero($("#enter_hour").val());
      } else {
        $(".duration").css('background', '#F7E8E8');
        return 0;
      }
      if ($("#entry_location").val()) {
        var entryLocation = $("#entry_location").val();
      } else {var entryLocation = "";}
      if ($("#entry_note").val()) {
        var entryNote = $("#entry_note").val();
      } else {var entryNote = "";}

      var entryImg = this.state.file;
      var entryColor = this.state.dColor;
      var entry = { entryName, entryDate, entryTime, entryDuration, entryLocation, entryNote, entryColor, entryImg };
      this.state.entries.splice(0, 0, entry);

      // clean and close entry page
      $(".float").removeClass('rotate');
      $("#add_entry").addClass('animated slideOutDown');
      window.setTimeout(function () {
        $("#add_entry").css('display', 'none');
      }, 700);
      $("#entry_name").val("");
      $("#all-day").prop('checked', false); // unchecks checkbox
      $("#not-all-day").css('display', 'block');
      $("#enter_hour").val("");
      $("#entry_location").val("");
      $("#entry_note").val("");
      // reset entry colors
      // var resColor = new resetColors();

    return this.setState({ entries: this.state.entries });//, this.setState(resColor);
    }
  },
  deleteEntry: function (e) {
    this.state.entries.splice(e, 1);
    $(".float").removeClass('rotate');
    $("#open_entry").addClass('animated slideOutDown');
    $("#add_entry").addClass('animated slideOutDown');
    window.setTimeout(function () {
      $("#add_entry").css('display', 'none');
      $("#open_entry").css('display', 'none');
    }, 700);
    $(".entry").css('background', 'none');
    $("#entry_name").val("");
    $("#all-day").prop('checked', false); // unchecks checkbox
    $("#not-all-day").css('display', 'block');
    $("#enter_hour").val("");
    $("#entry_location").val("");
    $("#entry_note").val("");
    // var resColor = new resetColors();
    return this.setState({ entries: this.state.entries });
    //, this.setState(resColor);
  },
  openEntry: function (entry, e) {
    if ($(".float").hasClass('rotate')) {
      $(".float").removeClass('rotate');
      $("#open_entry").addClass('animated slideOutDown');
      window.setTimeout(function () {
        $("#open_entry").css('display', 'none');
      }, 700);
      $(".entry").css('background', 'none');
      $("#" + e).css('background', 'none');
    } else {
      window.setTimeout(function () {
        $("#open_entry").removeClass('animated slideOutDown');
        $("#open_entry").addClass('animated slideInUp');
        $("#open_entry").css('display', 'block');
      }, 50);
      $(".float").addClass('rotate');
      $("#" + e).css('background', '#F1F1F1');
      return this.setState({ openEntry: entry });
    }
  },
  
  
 
  render: function () {
    var calendar = [];
    for (var property in this.state.dates.calendar) {
      calendar.push(this.state.dates.calendar[property]);
    }
    var weekdays = Object.keys(this.state.dates.calendar);
    var done = false;
    var count = 0;
    var daysBetween = '';
    if (this.state.openEntry) {
      var selectdDate = new Date(this.state.openEntry.entryDate.year, this.state.openEntry.entryDate.month, this.state.openEntry.entryDate.day);
      if (selectdDate > this.state.present) {
        daysBetween = Date.daysBetween(this.state.present, selectdDate);
        if (daysBetween == 1) {daysBetween = "Demain";} else {daysBetween = "Dans " + daysBetween + " jours";}
      } else if (selectdDate < this.state.present) {
        daysBetween = Date.daysBetween(selectdDate, this.state.present);
        if (daysBetween == 1) {daysBetween = "Hier";} else {daysBetween ="Il y'a " + daysBetween + " jours ";}
      }
      if (this.state.present.getDate() === this.state.openEntry.entryDate.day && this.state.present.getMonth() === this.state.openEntry.entryDate.month && this.state.present.getFullYear() === this.state.openEntry.entryDate.year) {
        daysBetween = "Aujourd'hui";
      }
    }
    return (
      React.createElement("div",{id:"container"}, null,
      React.createElement("div", { id: "calendar" },
    
      React.createElement("div", { id: "header" },
     
      React.createElement("p",{id: "titre"}, null, this.state.dates.nameofmonth, " ", this.state.dates.year),
      React.createElement("div", null,),),

      React.createElement("div", { id: "add_entry" },
      React.createElement("div", { className: "enter_entry" },
      React.createElement("input", { type: "text", placeholder: "Titre", id: "entry_name" }),
      React.createElement("span", { id: "save_entry", onClick: this.saveEntry.bind(null, this.state.currYear, this.state.currMonthN, this.state.currDay) }, "Enregistrer")),

      React.createElement("div", { className: "entry_details" },
      React.createElement("div", null,
      
      React.createElement("div", { className: "entry_info2 first second duration" },
      React.createElement("i", { className: "fa fa-clock-o", "aria-hidden": "true" }),
      React.createElement("input", { className: "toggle", type: "checkbox", name: "all-day", id: "all-day" }),
      React.createElement("p", null, "Tout les jours"),
      React.createElement("div", { id: "not-all-day" },
      React.createElement("p", { id: "select_hour" }, "Choisir l'heure"),
      React.createElement("p", { id: "hour" }, 
      React.createElement("input", { type: "number", id: "enter_hour", min: "0", max: "24" }), " h",),
      )),

      React.createElement("div", { className: "entry_info2" },
      React.createElement("i", { className: "fa fa-pencil", "aria-hidden": "true" }),
      React.createElement("textarea", { id: "entry_note", cols: "35", rows: "5", placeholder: "Ajouter une note" })),
      ))),
      this.state.openEntry ?
      React.createElement("div", { id: "open_entry" },
      React.createElement("div", { className: "entry_img", style: { backgroundColor: this.state.openEntry.entryColor.color } },
      React.createElement("div", { className: "overlay" }, 
      React.createElement("div", null,
      React.createElement("p", null,
      React.createElement("span", { id: "entry_title" }, this.state.openEntry.entryName),
      React.createElement("span", { id: "entry_times" }, daysBetween, " ", this.state.openEntry.entryDuration === "All day" ? "| All day" : "à " + this.state.openEntry.entryDuration + ":00")))),


      React.createElement("img", { src: this.state.openEntry.entryImg.readerResult, width: "100%", height: "300px" })),

    

      React.createElement("div", { className: "entry openedEntry noteDiv" }, 
      React.createElement("div", null,
      React.createElement("i", { className: "fa fa-pencil", "aria-hidden": "true" }), " ", this.state.openEntry.entryNote ? 
      React.createElement("span", { id: "note" }, this.state.openEntry.entryNote) : 
      React.createElement("span", null, "No description")))) :


      null,
      React.createElement("div", { id: "arrows" },
      React.createElement("i", { className: "fa fa-arrow-left", "aria-hidden": "true", onClick: this.update.bind(null, "left") }),
      React.createElement("i", { className: "fa fa-arrow-right", "aria-hidden": "true", onClick: this.update.bind(null, "right") })),

      React.createElement("div", { id: "dates" },
      calendar.map(function (week, i) {
        return (
          React.createElement("div", { key: i },
          React.createElement("p", { className: "weekname" }, weekdays[i].substring(0, 3)),
          React.createElement("ul", null,
          week.map(function (day, k) {
            var existEntry = {};
            {this.state.entries.map(function (entry, e) {
                if (entry.entryDate.day == day && entry.entryDate.month == this.state.dates.numberofmonth && entry.entryDate.year == this.state.dates.year) {
                  existEntry = { borderWidth: "2px", borderStyle: "solid", borderColor: "#FFF" };
                  return;
                }
              }.bind(this));}
            return React.createElement("li", { className: day === this.state.today.getDate() ? "today" : null, key: k, style: existEntry, onClick: this.selectedDay.bind(null, day) }, day);
          }.bind(this)))));



      }.bind(this))),


      this.state.warning ?
      React.createElement("div", { className: "warning" },
      this.state.warning) :

      null,
      React.createElement("div", { id: "ignoreOverflow" }, 
      React.createElement("button", { className: "float", onClick: this.addEntry.bind(null, this.state.today.getDate()) }, this.state.entry))),

      this.state.currDay ?
      React.createElement("div", { id: "entries" },
      React.createElement("div", { className: "contain_entries" },
      React.createElement("div", { id: "entries-header" },
      React.createElement("p", { className: "entryDay" }, this.state.currDay, " ", this.state.currMonth),
      this.state.present.getDate() === this.state.currDay && this.state.present.getMonth() === this.state.currMonthN && this.state.present.getFullYear() === this.state.currYear ? React.createElement("p", { className: "currday" }, "Aujourd'hui") : null),

      this.state.entries != '' ?
      React.createElement("div", null,
      this.state.entries.map(function (entry, e) {
        count++;
        var entryFromThisDate = entry.entryDate.day === this.state.currDay && entry.entryDate.month === this.state.currMonthN && entry.entryDate.year === this.state.currYear ? true : false;
        if (entryFromThisDate) {
          // prevent the "no-entries" div to appear in the next entries that are not from this day
          done = true;
          var style = { borderLeftColor: entry.entryColor.color, borderLeftWidth: "4px", borderLeftStyle: "solid" };
          return (
            React.createElement("div", { className: "entry", id: e, key: e },
            React.createElement("div", { style: style },
            React.createElement("div", { className: "entry_left", onClick: this.openEntry.bind(null, entry, e) },
            React.createElement("p", { className: "entry_event" }, entry.entryName),
            React.createElement("p", { className: "entry_time" }, entry.entryDuration === "All day" ? "All day" : entry.entryDuration + " h", " ", entry.entryLocation ? " | " + entry.entryLocation : null)),

            React.createElement("div", { className: "delete_entry" },
            React.createElement("i", { className: "fa fa-times", "aria-hidden": "true", onClick: this.deleteEntry.bind(null, e) })))));




        }
        if (count === this.state.entries.length) {
          if (!done) {
            done = true;
            return (
              React.createElement("div", { className: "no-entries", key: e },
              React.createElement("i", { className: "fa fa-calendar-check-o", "aria-hidden": "true" }),
              React.createElement("span", null, "Aucun horaire pour aujourd'hui")));


          }
        }
      }.bind(this))) :

      React.createElement("div", { className: "no-entries" },
      React.createElement("i", { className: "fa fa-calendar-check-o", "aria-hidden": "true" }),
      React.createElement("span", null, "Aucun horaire pour cette date")))) :




      null));


  } });

ReactDOM.render(React.createElement(Calendar, null), document.getElementById("app"));

(function ($, undefined) {
  $("#all-day").click(function () {
    if (this.checked) {
      $("#not-all-day").css('display', 'none');
    } else {
      $("#not-all-day").css('display', 'block');
    }
  });

  $("#click-close").click(function () {
    $("#menu-content").removeClass('animated slideInLeft');
    $("#menu-content").addClass('animated slideOutLeft');
    window.setTimeout(function () {
      $("#menu").css('display', 'none');
      $("#menu-content").css('display', 'none');
      $("#menu-content").removeClass('animated slideOutLeft');
    }, 750);
  });

  $("#entry-img").bind('change', function (e) {
    var label = this.nextElementSibling;
    var fileName = '';
    if (this.files) {
      fileName = e.target.value.split('\\').pop();
    } else {
      fileName = '';
    }
    if (fileName != '') {
      label.querySelector('span').innerHTML = fileName;
    } else {
      label.querySelector('span').innerHTML = "Choose an image";
    }
  });

  function hypot(x, y) {return Math.sqrt(x * x + y * y);}

  $("button").each(function (el) {
    var self = $(this),
    html = self.html();

    self.html("").append($('<div class="btn"/>').html(html));
  }).
  append($('<div class="ink-visual-container"/>').append($('<div class="ink-visual-static"/>'))).

  on("mousedown touchstart", function (evt) {
    event.preventDefault();

    var self = $(this),
    container = self.find(".ink-visual-static", true).eq(0);

    if (!container.length) return;

    container.find(".ink-visual").addClass("hide");

    var rect = this.getBoundingClientRect(),
    cRect = container[0].getBoundingClientRect(),
    cx,cy,radius,diam;

    if (event.changedTouches) {
      cx = event.changedTouches[0].clientX;
      cy = event.changedTouches[0].clientY;
    } else
    {
      cx = event.clientX;
      cy = event.clientY;
    }

    if (self.is(".float")) {
      var rx = rect.width / 2,
      ry = rect.height / 2,
      br = (rx + ry) / 2,
      mx = rect.left + rx,
      my = rect.top + ry;

      radius = hypot(cx - mx, cy - my) + br;
    }
    diam = radius * 2;

    var el = $('<div class="ink-visual"/>').width(diam).height(diam).
    css("left", cx - cRect.left - radius).css("top", cy - cRect.top - radius).

    on("animationend webkitAnimationEnd oanimationend MSAnimationEnd", function () {
      var self2 = $(this);

      switch (event.animationName) {
        case "ink-visual-show":
          if (self.is(":active")) self2.addClass("shown");
          break;

        case "ink-visual-hide":
          self2.remove();
          break;}

    }).

    on("touchend", function () {event.preventDefault();});

    container.append(el);
  });

  $(window).on("mouseup touchend", function (evt) {
    $(".ink-visual-static").children(".ink-visual").addClass("hide");
  }).
  on("select selectstart", function (evt) {event.preventDefault();return false;});
})(jQuery);