const gulp = require('gulp');
const less = require('gulp-less');
const notify = require('gulp-notify');
const plumber = require('gulp-plumber');
const cleanCSS = require('gulp-clean-css');

const lessPath = './assets/src/less/';
const cssPath = './assets/dist/css/';
// const reuseCssPath = './assets/src/js/reuse-form/dist/css/';

function noty(message) {
  return notify({
    onLast: true,
    title: 'Gulp',
    subtitle: 'success',
    message,
    sound: 'Pop',
   });
}

// gulp.task('css', () => {
//   return gulp.src([
//     './assets/src/less/reuse-less/reuse-form.less'
//   ])
//     .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
//     .pipe(less())
//     .pipe(gulp.dest(cssPath))
//     .pipe(noty('css compile done'));
// });

gulp.task('production', () => {
  return gulp.src(cssPath + '**/*.css')
    .pipe(cleanCSS({ compatibility: 'ie8' }))
    .pipe(gulp.dest(cssPath));
});

gulp.task('watch', () => {
  gulp.watch( lessPath + '**/*.less', ['css']);
});

gulp.task('default', ['watch', 'css']);
