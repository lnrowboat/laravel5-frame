System.register(['@angular/core', '@angular/common', '@angular/forms', './hero.component.3', './hero-detail.component', './hero-list.component', './highlight.directive', './hero-routing.module.3'], function(exports_1, context_1) {
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
    var core_1, common_1, forms_1, hero_component_3_1, hero_detail_component_1, hero_list_component_1, highlight_directive_1, hero_routing_module_3_1;
    var HeroModule;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (common_1_1) {
                common_1 = common_1_1;
            },
            function (forms_1_1) {
                forms_1 = forms_1_1;
            },
            function (hero_component_3_1_1) {
                hero_component_3_1 = hero_component_3_1_1;
            },
            function (hero_detail_component_1_1) {
                hero_detail_component_1 = hero_detail_component_1_1;
            },
            function (hero_list_component_1_1) {
                hero_list_component_1 = hero_list_component_1_1;
            },
            function (highlight_directive_1_1) {
                highlight_directive_1 = highlight_directive_1_1;
            },
            function (hero_routing_module_3_1_1) {
                hero_routing_module_3_1 = hero_routing_module_3_1_1;
            }],
        execute: function() {
            HeroModule = (function () {
                function HeroModule() {
                }
                HeroModule = __decorate([
                    core_1.NgModule({
                        imports: [common_1.CommonModule, forms_1.FormsModule, hero_routing_module_3_1.HeroRoutingModule],
                        declarations: [
                            hero_component_3_1.HeroComponent, hero_detail_component_1.HeroDetailComponent, hero_list_component_1.HeroListComponent,
                            highlight_directive_1.HighlightDirective
                        ]
                    }), 
                    __metadata('design:paramtypes', [])
                ], HeroModule);
                return HeroModule;
            }());
            exports_1("HeroModule", HeroModule);
        }
    }
});

//# sourceMappingURL=hero.module.3.js.map
