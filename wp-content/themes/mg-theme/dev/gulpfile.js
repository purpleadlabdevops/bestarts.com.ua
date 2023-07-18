'use strict';

var
  gulp = require('gulp'),
  sass = require('gulp-sass')(require('sass')),
  imagemin = require('gulp-imagemin'),
  pngquant = require('imagemin-pngquant'),
  rigger = require('gulp-rigger'),
  browserSync = require('browser-sync').create(),
  deporder      = require('gulp-deporder'),
  concat        = require('gulp-concat'),
  stripdebug    = require('gulp-strip-debug'),
  uglify        = require('gulp-uglify');


sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src('src/scss/**/*.scss')
    .pipe(sass.sync({outputStyle: 'compressed'})
    .on('error', sass.logError))
    .pipe(gulp.dest('../css'))
    .pipe(browserSync.stream());
});

gulp.task('js', function(){
  return gulp.src('src/js/**/*.js')
    .pipe(rigger())
    .pipe(gulp.dest('../js'))
    .pipe(browserSync.stream());
});

// const js = {
//   src         : 'src/js/**/*.js',
//   build       : '../js/',
//   filename    : 'scripts.js'
// };
// // JavaScript processing
// gulp.task('js', () => {

//   return gulp.src(js.src)
//     .pipe(deporder())
//     .pipe(concat(js.filename))
//     .pipe(stripdebug())
//     .pipe(uglify())
//     .pipe(gulp.dest(js.build))
//     .pipe(browserSync.stream());
// });

gulp.task('images', function () {
  return gulp.src('src/img/**')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()],
      interlaced: true
    }))
    .pipe(gulp.dest('../img'))
});

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: "localhost:8888/bestarts",
    watch: true,
    open: false,
    notify: false,
    ghostMode: false,
    ui: false,
    files: [
      '../css/*.css',
      '../js/*.js',
      '../**/*.php',
      {
        match: ['src/scss/**/*.scss'],
        fn: gulp.series('sass'),
      },
      {
        match: ['src/img/**'],
        fn: gulp.series('images'),
      },
      {
        match: ['src/js/**/*.js'],
        fn: gulp.series('js'),
      }
    ]
  });
});

gulp.task('default', gulp.parallel('browser-sync', 'sass', 'images', 'js'));
