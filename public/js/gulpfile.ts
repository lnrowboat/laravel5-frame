"use strict";

const gulp = require("gulp");
const del = require("del");
//const tsc = require("gulp-typescript");
//const sourcemaps = require('gulp-sourcemaps');

//const tslint = require('gulp-tslint');

const $ = require('gulp-load-plugins')({
    pattern: ['gulp-*', 'gulp.*', 'main-bower-files'],
    replaceString: /\bgulp[\-.]/
});
const tsProject = $.typescript.createProject("tsconfig.json");

const buildFolder = 'build';
const sourceFolder = 'src/';
/**
 * Remove build directory.
 */

gulp.task('clean', (cb) => {
    return del([buildFolder], cb);
});

/**
 * Lint all custom TypeScript files.
 */
gulp.task('tslint', () => {
    return gulp.src(sourceFolder + "**/*.ts")
        .pipe($.tslint({
            formatter: 'prose'
        }))
        .pipe($.tslint.report());
});

/**
 * Compile TypeScript sources and create sourcemaps in build directory.
 */
gulp.task("compile", ["tslint"], () => {
    let tsResult = gulp.src(sourceFolder + "**/*.ts")
        .pipe($.sourcemaps.init())
        .pipe($.typescript(tsProject));
    return tsResult.js
        .pipe($.sourcemaps.write(".", { sourceRoot: sourceFolder }))
        .pipe(gulp.dest(buildFolder));
});

/**
 * Copy all resources that are not TypeScript files into build directory.
 */
gulp.task("htmlresources", () => {
    return gulp.src([sourceFolder + "**/*.html"])
        .pipe(gulp.dest(buildFolder));
});

gulp.task("cssresources", () => {
    return gulp.src([sourceFolder + "**/*.scss"])
        .pipe($.sass())
        .pipe($.cssnano())
        .pipe(gulp.dest(buildFolder));
});


/**
 * Copy all required libraries into build directory.
 */
gulp.task("libs", () => {
    return gulp.src([
        'core-js/client/shim.min.js',
        'systemjs/dist/system-polyfills.js',
        'systemjs/dist/system.src.js',
        'reflect-metadata/Reflect.js',
        'rxjs/**/*.js',
        'zone.js/dist/**',
        '@angular/**/bundles/**'
    ], { cwd: "node_modules/**" }) /* Glob required here. */
        .pipe(gulp.dest(buildFolder + "/lib"));
});

/**
 * build css
 */
gulp.task('buildcss', function() {
    log('build css . . . ');
    return gulp.src('app/*.scss')
        .pipe($.sass())
        .pipe($.concat('main.css'))
        .pipe($.cssnano())
        .pipe(gulp.dest('app/css'));
});

gulp.task('sass:watch', function() {
    gulp.watch('app/*.scss', ['buildcss']);
});

/**
 * Watch for changes in TypeScript, HTML and CSS files.
 */

gulp.task('watch', function() {
    gulp.watch(["src/**/*.ts"], function(obj) {
        gulp.src(obj.path, { "base": sourceFolder })
            .pipe($.typescript(
                {}, {}, { voidReporter: true })
            )
            .pipe(gulp.dest(buildFolder));
    });
    gulp.watch(["src/**/*.html"], function(obj) {
        return gulp.src(obj.path, { "base": sourceFolder }).pipe(gulp.dest(buildFolder));
    });
    gulp.watch(["src/**/*.scss"], function(obj) {
        return gulp.src(obj.path, { "base": sourceFolder }).pipe($.sass()).pipe($.cssnano()).pipe(gulp.dest(buildFolder));
    });
});

/**
 * Build the project.
 */
gulp.task("build", ['compile', 'htmlresources', 'cssresources', 'libs'], () => {
    console.log("Building the project ...");
});