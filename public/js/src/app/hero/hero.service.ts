import { Injectable, Inject } from '@angular/core';
import { Headers, Http } from '@angular/http';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import 'rxjs/add/operator/toPromise';

export class Hero {
    constructor(public id: number, public name: string) { }
}

const HEROES: Hero[] = [
    new Hero(11, 'Mr. Nice'),
    new Hero(12, 'Narco'),
    new Hero(13, 'Bombasto'),
    new Hero(14, 'Celeritas'),
    new Hero(15, 'Magneta'),
    new Hero(16, 'RubberMan')
];

const FETCH_LATENCY = 500;

@Injectable()
export class HeroService {
    private headers = new Headers(
        { 'Content-Type': 'application/json',
        'X-CSRF-TOKEN': 'lT1DptPmy1VwsVbgEypoRa0oD0LcOYZOvlfq1iv2' }
    );
    constructor(@Inject(Http) private http: Http) { }
    getHeroes() {
        return new Promise<Hero[]>(resolve => {
            setTimeout(() => { resolve(HEROES); }, FETCH_LATENCY);
        });
    }

    getHero(id: number | string) {
        return this.getHeroes()
            .then(heroes => heroes.find(hero => hero.id === +id));
    }

    getFiles(url: string): Promise<any> {
        let data = {
            name: 'clientname',
            redirect: 'yes'
        };
        return this.http
            .get(url, { headers: this.headers })
            .toPromise()
            .then()
            .catch(this.handleError);
    }
    
    auth(url: string): Promise<any> {
        let data = {
            name: 'clientname',
            redirect: 'yes'
        };
        return this.http
            .get(url, { headers: this.headers })
            .toPromise()
            .then()
            .catch(this.handleError);
    }
    
    private handleError(error: any): Promise<any> {
        console.error('An error occurred'); // for demo purposes only
        return Promise.reject(error.message || error);
    }

}
