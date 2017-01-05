"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
var core_1 = require('@angular/core');
var http_1 = require('@angular/http');
require('rxjs/add/operator/toPromise');
var Hero = (function () {
    function Hero(id, name) {
        this.id = id;
        this.name = name;
    }
    return Hero;
}());
exports.Hero = Hero;
var HEROES = [
    new Hero(11, 'Mr. Nice'),
    new Hero(12, 'Narco'),
    new Hero(13, 'Bombasto'),
    new Hero(14, 'Celeritas'),
    new Hero(15, 'Magneta'),
    new Hero(16, 'RubberMan')
];
var FETCH_LATENCY = 500;
var HeroService = (function () {
    function HeroService(http) {
        this.http = http;
        this.headers = new http_1.Headers({ 'Content-Type': 'application/json',
            'X-CSRF-TOKEN': 'lT1DptPmy1VwsVbgEypoRa0oD0LcOYZOvlfq1iv2' });
    }
    HeroService.prototype.getHeroes = function () {
        return new Promise(function (resolve) {
            setTimeout(function () { resolve(HEROES); }, FETCH_LATENCY);
        });
    };
    HeroService.prototype.getHero = function (id) {
        return this.getHeroes()
            .then(function (heroes) { return heroes.find(function (hero) { return hero.id === +id; }); });
    };
    HeroService.prototype.getFiles = function (url) {
        var data = {
            name: 'clientname',
            redirect: 'yes'
        };
        return this.http
            .get(url, { headers: this.headers })
            .toPromise()
            .then()
            .catch(this.handleError);
    };
    HeroService.prototype.auth = function (url) {
        var data = {
            name: 'clientname',
            redirect: 'yes'
        };
        return this.http
            .get(url, { headers: this.headers })
            .toPromise()
            .then()
            .catch(this.handleError);
    };
    HeroService.prototype.handleError = function (error) {
        console.error('An error occurred'); // for demo purposes only
        return Promise.reject(error.message || error);
    };
    HeroService = __decorate([
        core_1.Injectable(),
        __param(0, core_1.Inject(http_1.Http))
    ], HeroService);
    return HeroService;
}());
exports.HeroService = HeroService;
