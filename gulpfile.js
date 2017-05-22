var gulp = require('gulp'),
	sass = require('gulp-sass'),
	notify = require('gulp-notify')
	connect = require('gulp-connect');

gulp.task('connect',function(){
	connect.server({
		root:'./',
		livereload:true
	});	
});

gulp.task('sass', function(){
	gulp.src('css/sass/*.sass')
		.pipe(sass())
		.pipe(gulp.dest('css/'));
	gulp.src('css/sass/skins/*.sass')
		.pipe(sass())
		.pipe(gulp.dest('css/skins/'));
	// connect.reload();	
});

gulp.task('default', function(){
	gulp.watch('./css/sass/*.sass',['sass']);
	gulp.watch('./css/sass/skins/*.sass',['sass']);
	gulp.watch('./index.html',['sass']);
	//gulp.pipe(notify('ok'));
});