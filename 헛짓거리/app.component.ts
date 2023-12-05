export class AppComponent {
	public gantt_ChartData={
	   "date":"2017-02-09",
	   "taskArray":[
		  {
			 "task":"Breakfast",
			 "startTime":"8:30am",
			 "endTime":"11:00am"
		  },
		  {
			 "task":"Badge Pick-up",
			 "startTime":"8:00am",
			 "endTime":"7:00pm"
		  },
		  {
			 "task":"Angular 2",
			 "startTime":"9:00am",
			 "endTime":"8:00pm"
		  },
		  {
			 "task":"Lunch",
			 "startTime":"11:30am",
			 "endTime":"1:30pm"
		  },
		  {
			 "task":"Android Session",
			 "startTime":"8:30am",
			 "endTime":"8:00pm"
		  },
		  {
			 "task":"Codelabs",
			 "startTime":"8:30am",
			 "endTime":"8:00pm"
		  },
		  {
			 "task":"Closing Ceremony",
			 "startTime":"6:00pm",
			 "endTime":"10:00pm"
		  }
	   ]
	}
	public gantt_chart_options={
	  rectColor:"red", //Hex code or color name can be given
	  lineColor:"black",
	  labelColor:"green"
	}
  }