var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('cssnano'),
    autoprefixer = require('autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    postcss = require('gulp-postcss'),
    mode = require('gulp-mode')();


gulp.task('css', function() {
	return gulp.src('./sass/style.scss')
	.pipe(mode.development(sourcemaps.init()))
	.pipe(sass({
		outputStyle: 'expanded', 
		indentType: 'tab',
		indentWidth: '1'
	}).on('error', sass.logError))
	.pipe(mode.development(postcss([
		autoprefixer('last 2 versions', '> 1%')
    ])))
    .pipe(mode.production(postcss([
        autoprefixer('last 2 versions', '> 1%'),
        cssnano()
	])))
	.pipe(mode.development(sourcemaps.write('./sass/maps')))
	.pipe(gulp.dest('.'));
});



gulp.task('default', ['css']);