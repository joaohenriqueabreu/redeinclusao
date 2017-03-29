	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
            buttonText: {
                today: 'hoje',
                month: 'mês',
                week: 'semana',
                day: 'dia'
            },
            columnFormat: {
                month: 'ddd',
                week: 'ddd D/M',
                day: 'dddd D/M'
            },
            allDayText: 'dia todo',
            axisFormat: 'H:mm',
            timeFormat: 'H(:mm)',
            droppable: true, // this allows things to be dropped onto the calendar !!!
            businessHours : true, //Descata dias uteis da semana
            eventLimit : true, // allow "more" link when too many events
            selectable : true,
            selectHelper : true,
            // Convert the allDay from string to boolean
            eventRender : function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            droppable : true, // Habilitar para drop de caixa
            drop : function() {//DROP
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            eventClick : function(event) {// Remove o evento
                if(event.origem == 'A'){
                    if(event.edita == 1){
                      $('#myModal').modal({
                          "backdrop"  : "static",
                          "keyboard"  : true,
                          "show"      : true,
                          "remote"    : urlBase+'/Agendas/edit/'+event.id
                      });
                    }else{
                      $('#myModal').modal({
                          "backdrop"  : "static",
                          "keyboard"  : true,
                          "show"      : true,
                          "remote"    : urlBase+'/Agendas/view/'+event.id
                      });
                    }
                }else{
                  $('#myLargeModalLabel').modal({
                      "backdrop"  : "static",
                      "keyboard"  : true,
                      "show"      : true,
                      "remote"    : urlBase+'/Tarefas/view/'+event.id
                  });
                }
            },
      		eventDrop: function(event, delta, revertFunc) {
                if(event.origem == 'A'){
        			var startdate = new Date(event.start.format());
        			var startyear = startdate.getFullYear();
        			var startday = startdate.getDate();
        			var startmonth = startdate.getMonth()+1;
        			var starthour = startdate.getHours();
        			var startminute = startdate.getMinutes();
        			var enddate = new Date(event.end.format());
        			var endyear = enddate.getFullYear();
        			var endday = enddate.getDate();
        			var endmonth = enddate.getMonth()+1;
        			var endhour = enddate.getHours();
        			var endminute = enddate.getMinutes();
        			var url = urlBase + "/Agendas/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute;
                  if (confirm("Deseja prosseguir com alteração ?")) {
      			    $.post(url, function(data){

      			    });
                  }else{
                      revertFunc();
                  }
                }
      		},
            eventResize: function(event, delta, revertFunc) {
                if(event.origem == 'A'){
        			var startdate = new Date(event.start.format());
        			var startyear = startdate.getFullYear();
        			var startday = startdate.getDate();
        			var startmonth = startdate.getMonth()+1;
        			var starthour = startdate.getHours();
        			var startminute = startdate.getMinutes();
        			var enddate = new Date(event.end.format());
        			var endyear = enddate.getFullYear();
        			var endday = enddate.getDate();
        			var endmonth = enddate.getMonth()+1;
        			var endhour = enddate.getHours();
        			var endminute = enddate.getMinutes();
        			var url = urlBase + "/Agendas/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00";
                    if (confirm("Deseja prosseguir com alteração ?")) {
        			    $.post(url, function(data){

        			    });
                    }else{
                        revertFunc();
                    }
                }
            },
			events: urlBase+'/Agendas/json/'+$('#origem').val()+'/'+$('#usuario').val()
		});
	});