System.register(['@angular/core', './hero.service', '../user.service'], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, hero_service_1, user_service_1;
    var HeroComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (hero_service_1_1) {
                hero_service_1 = hero_service_1_1;
            },
            function (user_service_1_1) {
                user_service_1 = user_service_1_1;
            }],
        execute: function() {
            HeroComponent = (function () {
                function HeroComponent(userService) {
                    this.userName = '';
                    this.userName = userService.userName;
                }
                HeroComponent = __decorate([
                    core_1.Component({
                        template: '<h2>Heroes of {{userName}}</h2><router-outlet></router-outlet>',
                        providers: [hero_service_1.HeroService, user_service_1.UserService]
                    }), 
                    __metadata('design:paramtypes', [user_service_1.UserService])
                ], HeroComponent);
                return HeroComponent;
            }());
            exports_1("HeroComponent", HeroComponent);
        }
    }
});

//# sourceMappingURL=hero.component.3.js.map
