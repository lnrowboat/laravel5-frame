import { Component, OnInit } from "@angular/core";
import {Injectable, Inject} from '@angular/core';
import { FileService } from './about.service';
@Component({
    templateUrl: './app/about/components/about.html',
    styleUrls: ['./app/about/components/about.css'],
    //providers: [{provide: FileService, useClass: FileService}]
})

export class AboutComponent implements OnInit {
    //private headers = new Headers({ 'Content-Type': 'application/json'});
    private fileService: any;
   /* constructor(
        //public fileService: FileService
    ) {}*/
    ngOnInit() {
        this.fileService = new FileService;
        this.getContent('http://localhost/laravel-frame/public/oauth/clients');
    }
    getContent(path: string): void {
        this.fileService.getFiles(path).then(
            files => {
                console.log(files);
            }
        );
        //this.fileService.getFiles(path);
    }
}
