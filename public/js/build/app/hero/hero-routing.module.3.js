System.register(['@angular/core', '@angular/router', './hero.component.3', './hero-list.component', './hero-detail.component'], function(exports_1, context_1) {
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
    var core_1, router_1, hero_component_3_1, hero_list_component_1, hero_detail_component_1;
    var routes, HeroRoutingModule;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (hero_component_3_1_1) {
                hero_component_3_1 = hero_component_3_1_1;
            },
            function (hero_list_component_1_1) {
                hero_list_component_1 = hero_list_component_1_1;
            },
            function (hero_detail_component_1_1) {
                hero_detail_component_1 = hero_detail_component_1_1;
            }],
        execute: function() {
            routes = [
                { path: '',
                    component: hero_component_3_1.HeroComponent,
                    children: [
                        { path: '', component: hero_list_component_1.HeroListComponent },
                        { path: ':id', component: hero_detail_component_1.HeroDetailComponent }
                    ]
                }
            ];
            HeroRoutingModule = (function () {
                function HeroRoutingModule() {
                }
                HeroRoutingModule = __decorate([
                    core_1.NgModule({
                        imports: [router_1.RouterModule.forChild(routes)],
                        exports: [router_1.RouterModule]
                    }), 
                    __metadata('design:paramtypes', [])
                ], HeroRoutingModule);
                return HeroRoutingModule;
            }());
            exports_1("HeroRoutingModule", HeroRoutingModule);
        }
    }
});

//# sourceMappingURL=hero-routing.module.3.js.map
