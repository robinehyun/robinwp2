var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();

gulp.task('sass', function(){
  return gulp.src('scss/**.scss')
    .pipe(sass())
    .pipe(concat('robin.css'))
    .pipe(gulp.dest('.'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('watch', function(){
    watch('scss/**.scss', function(){
      gulp.start('sass');
    })
});

gulp.task('serve', function(){

  browserSync.init({
    server: {
      baseDir: 'localhost/~robinyun/robinwp2/'
    }
  });

  gulp.watch('scss/**.scss', ['sass']);
  // gulp.watch()
})

gulp.task('default', ['watch']);
