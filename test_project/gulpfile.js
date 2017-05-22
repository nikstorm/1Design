'use strict';
// generated on 2015-11-05 using generator-gulp-app 0.1.0
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var serverPort = 8080;
var livereloadPort = 35729;
var defaultTask = ['connectServer', 'broswer', 'liveServer', 'watch'];

gulp.task('connectServer', $.serve({
    root: 'app',
    port: serverPort,
    middleware: require('connect-livereload')({port: livereloadPort})
}));

gulp.task("broswer", ['connectServer'], function(){
    gulp.src("app/index.html")
    .pipe($.open("", {url: "http://localhost:" + serverPort}));
});

gulp.task('liveServer', function() {
    $.livereload.listen(livereloadPort);
});

gulp.task('watch', function() {
    $.watch({glob: ['app/*.html', 'app/css/*.css', 'app/js/*.js', 'app/images/**/*']}, function() {
        $.livereload.changed("file", livereloadPort);
    });
});

gulp.task('default', defaultTask);