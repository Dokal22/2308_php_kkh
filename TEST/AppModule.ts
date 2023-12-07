import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';

// Import your library
import { GanttChart } from 'angular-gantt-chart';
@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,

    // Specify GanttChart library as an import
    GanttChart
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }