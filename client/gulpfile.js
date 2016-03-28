var gulp = require('gulp');
var watchLess = require('gulp-watch-less');
var less = require('gulp-less');
var connect = require('gulp-connect');

gulp.task('stream', ['connect'], function () {
    return watchLess('less/style.less')
        .pipe(less())
        .pipe(gulp.dest('css/'));
});

gulp.task('connect', function() {
    connect.server({
        port: 9003
    });
});

gulp.task('default', ['stream']);