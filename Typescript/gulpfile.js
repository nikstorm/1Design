var gulp = require('gulp'),
	ts = require('gulp-typescript');
	
gulp.task('ts',function(){
	gulp.src('./*.ts')
		.pipe(ts())
		.pipe(gulp.dest('./'));
		
});	
gulp.task('watch',function(){
	gulp.watch('./*.ts', ['ts']);
});