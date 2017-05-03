var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./css/'))
});

gulp.task('scripts', function() {
  return gulp.src('./js/*.js')
    .pipe(concat('ray.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js/'));
});

//Watch task
gulp.task('default',function() {
    gulp.watch('sass/**/*.scss',['styles']);
    gulp.watch('js/*.js',['scripts']);
});
