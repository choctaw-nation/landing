!function(){"use strict";class e{EVENT_DURATION=36e5;event={name:"",start:new Date,end:new Date,description:"",website:"",isAllDay:!1,venue:null};constructor(){try{const e=this.getTheElements();this.setTheProperties(e)}catch(e){console.error(e)}}getTheElements(){const e=this.elSelector("event-name","Name"),t=this.elSelector("add-to-calendar","Add to calendar button"),n=document.getElementById("event-description")?.querySelectorAll("p");if(!n)throw new Error("Event Description not found!");const s=document.getElementById("event-website"),r=this.elSelector("venue-name","Venue name"),i=this.elSelector("venue-address","Venue address"),a=document.getElementById("venue-website"),o={name:e,dateButton:t,eventDescription:n,website:s};return[r,i,a].every((e=>null!==e))&&(o.venue={name:r,address:i,website:a}),o}elSelector(e,t){const n=document.getElementById(e),s=t.includes("Venue");if(!n&&!s)throw new Error(`${t} not found!`);return n}setTheProperties(e){this.event.name=e.name.innerText,this.event.description=this.setTheDescription(e.eventDescription),this.event.website=e.website?.innerText,e.venue?(this.event.venue.name=e.venue.name.innerText,this.event.venue.address=e.venue.address.innerText,this.event.venue.website=e.venue.website?.innerText):this.event.venue=null,this.button=e.dateButton,this.setEventDateTimes(this.button)}setTheDescription(e){let t="";return e.forEach((e=>t+=e.textContent)),t}setEventDateTimes(e){const t=e.dataset.eventStart;if(!t)return void console.warn("Start Date not found!");const n=e.dataset.eventEnd;this.event.isAllDay="true"===e.dataset.isAllDay,this.event.start=new Date(t),this.event.end=n?new Date(n):new Date(this.event.start.getTime()+this.EVENT_DURATION)}}new class extends e{constructor(){super(),this.button.addEventListener("click",this.handleClick.bind(this))}handleClick(e){e.preventDefault();try{this.downloadICSFile()}catch(e){this.showErrorMessage(),console.error(e)}}downloadICSFile(){const e=`${this.event.name}.ics`,t=`BEGIN:VCALENDAR\nVERSION:2.0\nBEGIN:VEVENT\nDTSTART:${this.getiCalDateStrings(this.event.start)}\nDTEND:${this.getiCalDateStrings(this.event.end)}\nSUMMARY:${this.event.name}\nLOCATION:${this.event.venue?.address?this.event.venue.address:""}\nDESCRIPTION:${this.event.description}\nEND:VEVENT\nEND:VCALENDAR`,n=new Blob([t],{type:"text/calendar;charset=utf-8"}),s=document.createElement("a");s.href=URL.createObjectURL(n),s.download=e,document.body.appendChild(s),s.click(),document.body.removeChild(s)}showErrorMessage(){this.button.insertAdjacentHTML("afterend","<div class='alert alert-warning'>Could not generate a calendar event. Refresh the page and try again, or add it to your calendar manually.</div>")}getiCalDateStrings(e){return`${e.getUTCFullYear()}${String(e.getUTCMonth()+1).padStart(2,"0")}${String(e.getUTCDate()).padStart(2,"0")}T${String(e.getUTCHours()).padStart(2,"0")}${String(e.getUTCMinutes()).padStart(2,"0")}${String(e.getUTCSeconds()).padStart(2,"0")}Z`}}}();