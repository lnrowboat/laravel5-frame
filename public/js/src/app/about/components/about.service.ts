import { Injectable } from '@angular/core';
import { Headers, Http,RequestOptions,ResponseContentType } from '@angular/http';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import 'rxjs/add/operator/toPromise';

@Injectable()
export class FileService {
  private headers = new Headers({ 'Content-Type': 'application/json'});
  constructor(private http: Http) {}
  getFiles(url: string): Promise<any> {
    return this.http
      .post(url, JSON.stringify({name:'unknown'}), {headers: this.headers})
      .toPromise()
      .then()
      .catch(this.handleError);
  }
  private handleError(error: any): Promise<any> {
  	console.error('An error occurred'); // for demo purposes only
  	return Promise.reject(error.message || error);
  }
}