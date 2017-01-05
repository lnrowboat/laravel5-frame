import { Directive, ElementRef } from '@angular/core';

// Same directive name and selector as
// HighlightDirective in parent AppRootModule
// It selects for both input boxes and  'highlight' attr
// and it highlights in beige instead of yellow
@Directive({ selector: '[highlight]' })
export class HighlightDirective {
    constructor(el: ElementRef) {
       el.nativeElement.style.backgroundColor = 'beige';
       console.log(`* Hero highlight called for ${el.nativeElement.tagName}`);
    }
}


/*
Copyright 2016 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/